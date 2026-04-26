<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

require_admin();

$data = load_site_data();
$home = $data['home'];
$editingAdminId = isset($_GET['edit_admin']) ? (int) $_GET['edit_admin'] : 0;
$editingAdmin = $editingAdminId > 0 ? get_admin_by_id($editingAdminId) : null;
$editingAssociateId = isset($_GET['edit_associate']) ? (int) $_GET['edit_associate'] : 0;
$editingAssociate = $editingAssociateId > 0 ? get_associate_by_id($editingAssociateId) : null;
$flash = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'update_home') {
            save_site_home([
                'site_name' => $_POST['site_name'] ?? '',
                'subtitle' => $_POST['subtitle'] ?? '',
                'cta_label' => $_POST['cta_label'] ?? '',
            ]);
            $flash = 'Textos principais atualizados.';
        }

        if ($action === 'add_home_banner') {
            add_home_banner($_POST, $_FILES['banner_image'] ?? []);
            $flash = 'Banner cadastrado na Home.';
        }

        if ($action === 'delete_home_banner') {
            delete_home_banner((int) ($_POST['id'] ?? 0));
            $flash = 'Banner removido.';
        }

        if ($action === 'add_featured_image') {
            add_featured_image($_POST, $_FILES['featured_image'] ?? []);
            $flash = 'Imagem de destaque cadastrada.';
        }

        if ($action === 'delete_featured_image') {
            delete_featured_image((int) ($_POST['id'] ?? 0));
            $flash = 'Imagem de destaque removida.';
        }

        if ($action === 'add_gallery_image') {
            add_gallery_image($_POST, $_FILES['gallery_image'] ?? []);
            $flash = 'Imagem da galeria cadastrada.';
        }

        if ($action === 'delete_gallery_image') {
            delete_gallery_image((int) ($_POST['id'] ?? 0));
            $flash = 'Imagem da galeria removida.';
        }

        if ($action === 'save_institutional_page') {
            save_institutional_page($_POST);
            $flash = 'Conteudo institucional atualizado.';
        }

        if ($action === 'add_representative') {
            add_representative($_POST);
            $flash = 'Representante cadastrado.';
        }

        if ($action === 'delete_representative') {
            delete_representative((int) ($_POST['id'] ?? 0));
            $flash = 'Representante removido.';
        }

        if ($action === 'add_annual_document') {
            add_annual_document($_POST, $_FILES['document_file'] ?? []);
            $flash = 'Documento anual cadastrado.';
        }

        if ($action === 'delete_annual_document') {
            delete_annual_document((int) ($_POST['id'] ?? 0));
            $flash = 'Documento removido.';
        }

        if ($action === 'add_news') {
            add_news($_POST);
            $flash = 'Noticia cadastrada.';
        }

        if ($action === 'delete_news') {
            delete_news((int) ($_POST['id'] ?? 0));
            $flash = 'Noticia removida.';
        }

        if ($action === 'add_invoice') {
            add_invoice($_POST);
            $flash = 'Boleto cadastrado.';
        }

        if ($action === 'delete_invoice') {
            delete_invoice((int) ($_POST['id'] ?? 0));
            $flash = 'Boleto removido.';
        }

        if ($action === 'reset_data') {
            reset_site_data();
            $flash = 'Dados restaurados para o exemplo inicial.';
        }

        if ($action === 'approve_request') {
            $senhaAssociado = trim((string) ($_POST['associate_password'] ?? ''));
            if ($senhaAssociado === '') {
                throw new RuntimeException('Define uma senha para liberar o associado.');
            }
            approve_association_request((int) ($_POST['request_id'] ?? 0), $senhaAssociado, current_admin_id() ?? 0);
            $flash = 'Associado liberado com sucesso.';
        }

        if ($action === 'reject_request') {
            reject_association_request((int) ($_POST['request_id'] ?? 0));
            $flash = 'Ficha marcada como rejeitada.';
        }

        if ($action === 'add_admin') {
            create_admin($_POST);
            $flash = 'Administrador cadastrado.';
        }

        if ($action === 'update_admin') {
            update_admin($_POST);
            $editingAdminId = 0;
            $editingAdmin = null;
            $flash = 'Administrador atualizado.';
        }

        if ($action === 'delete_admin') {
            delete_admin((int) ($_POST['id'] ?? 0), current_admin_id() ?? 0);
            if ($editingAdminId === (int) ($_POST['id'] ?? 0)) {
                $editingAdminId = 0;
                $editingAdmin = null;
            }
            $flash = 'Administrador excluido.';
        }

        if ($action === 'add_associate') {
            create_associate($_POST);
            $flash = 'Associado cadastrado e liberado para a area restrita.';
        }

        if ($action === 'update_associate') {
            update_associate($_POST);
            $editingAssociateId = 0;
            $editingAssociate = null;
            $flash = 'Associado atualizado.';
        }

        if ($action === 'delete_associate') {
            delete_associate((int) ($_POST['id'] ?? 0));
            if ($editingAssociateId === (int) ($_POST['id'] ?? 0)) {
                $editingAssociateId = 0;
                $editingAssociate = null;
            }
            $flash = 'Associado excluido.';
        }
    } catch (Throwable $exception) {
        $error = $exception->getMessage();
    }

    $data = load_site_data();
    $home = $data['home'];
}

$admins = get_admins();
$associates = get_associates();
$requests = get_association_requests();
$homeBanners = get_home_banners();
$featuredImages = get_featured_images();
$galleryImages = get_gallery_images();
$institutionalPages = get_institutional_pages_map();
$representativesGrouped = get_representatives_grouped();
$convencoes = get_annual_documents_by_type('convencao');
$emolumentos = get_annual_documents_by_type('emolumentos');
$informativos = get_annual_documents_by_type('informativo');

render_header('Sindi Amostra | Dashboard', $home);
?>

<main class="section">
    <div class="container admin-shell">
        <div class="section-heading">
            <div>
                <h2>Painel do administrador</h2>
                <p>Organizado por areas para facilitar a manutencao da Home, acessos, documentos e conteudo do portal.</p>
            </div>
            <div class="inline-actions">
                <a class="button button-secondary dark" href="<?= h(asset_url('index.php')); ?>">Ver Home</a>
                <a class="button button-secondary dark" href="<?= h(asset_url('area-restrita.php')); ?>">Area Restrita</a>
                <a class="button button-secondary dark" href="<?= h(asset_url('admin/logout.php')); ?>">Sair</a>
            </div>
        </div>

        <nav class="admin-nav">
            <a href="#admin-home">Home</a>
            <a href="#admin-acessos">Acessos</a>
            <a href="#admin-institucional">Institucional</a>
            <a href="#admin-documentos">Documentos</a>
            <a href="#admin-conteudo">Conteudo</a>
            <a href="#admin-manutencao">Manutencao</a>
        </nav>

        <div class="admin-overview">
            <article class="admin-stat">
                <strong><?= count($homeBanners); ?></strong>
                <span>Banners da Home</span>
            </article>
            <article class="admin-stat">
                <strong><?= count($requests); ?></strong>
                <span>Fichas de associacao</span>
            </article>
            <article class="admin-stat">
                <strong><?= count($associates); ?></strong>
                <span>Associados liberados</span>
            </article>
            <article class="admin-stat">
                <strong><?= count($admins); ?></strong>
                <span>Administradores</span>
            </article>
        </div>

        <?php if ($flash !== ''): ?>
            <div class="flash-success"><?= h($flash); ?></div>
        <?php endif; ?>

        <?php if ($error !== ''): ?>
            <div class="flash-error"><?= h($error); ?></div>
        <?php endif; ?>

        <section class="admin-section" id="admin-home">
            <div class="admin-section-heading">
                <div>
                    <h3>Home</h3>
                    <p>Configuracoes principais da pagina inicial, banners e imagens dos blocos em destaque.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3>Textos principais da Home</h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="update_home">

                        <div class="field">
                            <label for="site_name">Nome do site</label>
                            <input id="site_name" name="site_name" type="text" value="<?= h($home['site_name']); ?>">
                        </div>

                        <div class="field">
                            <label for="subtitle">Subtitulo</label>
                            <input id="subtitle" name="subtitle" type="text" value="<?= h($home['subtitle']); ?>">
                        </div>

                        <div class="field">
                            <label for="cta_label">Texto do botao</label>
                            <input id="cta_label" name="cta_label" type="text" value="<?= h($home['cta_label']); ?>">
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar textos</button>
                        </div>
                    </form>
                </section>

                <section class="panel">
                    <h3>Banners da Home</h3>
                    <p class="hint">A Home aceita ate 3 banners e troca automaticamente a cada 5 segundos.</p>
                    <form method="post" class="form-grid" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_home_banner">

                        <div class="field">
                            <label for="banner_title">Titulo do banner</label>
                            <input id="banner_title" name="title" type="text">
                        </div>

                        <div class="field">
                            <label for="banner_subtitle">Texto do banner</label>
                            <textarea id="banner_subtitle" name="subtitle"></textarea>
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="banner_sort_order">Ordem</label>
                                <input id="banner_sort_order" name="sort_order" type="number" min="1" max="3" value="<?= count($homeBanners) + 1; ?>">
                            </div>

                            <div class="field">
                                <label for="banner_image">Imagem</label>
                                <input id="banner_image" name="banner_image" type="file" accept="image/png,image/jpeg,image/webp">
                            </div>
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar banner</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel">
                    <h3>Noticias em destaque</h3>
                    <p class="hint">Esse bloco menor da Home aceita ate 4 imagens e tambem troca automaticamente.</p>
                    <form method="post" class="form-grid" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_featured_image">

                        <div class="field">
                            <label for="featured_title">Titulo</label>
                            <input id="featured_title" name="title" type="text">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="featured_sort_order">Ordem</label>
                                <input id="featured_sort_order" name="sort_order" type="number" min="1" max="4" value="<?= count($featuredImages) + 1; ?>">
                            </div>

                            <div class="field">
                                <label for="featured_image">Imagem</label>
                                <input id="featured_image" name="featured_image" type="file" accept="image/png,image/jpeg,image/webp">
                            </div>
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar destaque</button>
                        </div>
                    </form>
                </section>

                <section class="panel">
                    <h3>Galeria de fotos</h3>
                    <p class="hint">A galeria da Home mostra ate 3 imagens lado a lado.</p>
                    <form method="post" class="form-grid" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_gallery_image">

                        <div class="field">
                            <label for="gallery_title">Titulo</label>
                            <input id="gallery_title" name="title" type="text">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="gallery_sort_order">Ordem</label>
                                <input id="gallery_sort_order" name="sort_order" type="number" min="1" max="3" value="<?= count($galleryImages) + 1; ?>">
                            </div>

                            <div class="field">
                                <label for="gallery_image">Imagem</label>
                                <input id="gallery_image" name="gallery_image" type="file" accept="image/png,image/jpeg,image/webp">
                            </div>
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar foto</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel">
                    <h3>Banners cadastrados</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Banner</th>
                            <th>Ordem</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($homeBanners as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['title']); ?></strong><br>
                                    <?= h($item['subtitle']); ?><br>
                                    <a href="<?= h((string) $item['image_path']); ?>" target="_blank" rel="noreferrer">Ver imagem</a>
                                </td>
                                <td><?= (int) $item['sort_order']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_home_banner">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <section class="panel table-panel">
                    <h3>Imagens de destaque</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Ordem</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($featuredImages as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['title']); ?></strong><br>
                                    <a href="<?= h((string) $item['image_path']); ?>" target="_blank" rel="noreferrer">Ver imagem</a>
                                </td>
                                <td><?= (int) $item['sort_order']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_featured_image">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel admin-grid-full">
                    <h3>Fotos da galeria</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Ordem</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($galleryImages as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['title']); ?></strong><br>
                                    <a href="<?= h((string) $item['image_path']); ?>" target="_blank" rel="noreferrer">Ver imagem</a>
                                </td>
                                <td><?= (int) $item['sort_order']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_gallery_image">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <section class="admin-section" id="admin-acessos">
            <div class="admin-section-heading">
                <div>
                    <h3>Acessos</h3>
                    <p>Administradores, associados e fichas de associacao para liberar a area restrita.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3><?= $editingAdmin !== null ? 'Editar administrador' : 'Cadastrar administrador'; ?></h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="<?= $editingAdmin !== null ? 'update_admin' : 'add_admin'; ?>">
                        <?php if ($editingAdmin !== null): ?>
                            <input type="hidden" name="admin_id" value="<?= (int) $editingAdmin['id']; ?>">
                        <?php endif; ?>

                        <div class="field">
                            <label for="admin_nome">Nome</label>
                            <input id="admin_nome" name="nome" type="text" value="<?= h((string) ($editingAdmin['nome'] ?? '')); ?>">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="admin_usuario">Usuario</label>
                                <input id="admin_usuario" name="usuario" type="text" value="<?= h((string) ($editingAdmin['usuario'] ?? '')); ?>">
                            </div>

                            <div class="field">
                                <label for="admin_email">E-mail</label>
                                <input id="admin_email" name="email" type="email" value="<?= h((string) ($editingAdmin['email'] ?? '')); ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label for="admin_senha"><?= $editingAdmin !== null ? 'Nova senha' : 'Senha'; ?></label>
                            <input id="admin_senha" name="senha" type="password">
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit"><?= $editingAdmin !== null ? 'Salvar alteracoes' : 'Salvar administrador'; ?></button>
                            <?php if ($editingAdmin !== null): ?>
                                <a class="button button-secondary" href="<?= h(asset_url('admin/dashboard.php')); ?>">Cancelar</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </section>

                <section class="panel">
                    <h3><?= $editingAssociate !== null ? 'Editar associado' : 'Cadastrar associado'; ?></h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="<?= $editingAssociate !== null ? 'update_associate' : 'add_associate'; ?>">
                        <?php if ($editingAssociate !== null): ?>
                            <input type="hidden" name="associate_id" value="<?= (int) $editingAssociate['id']; ?>">
                        <?php endif; ?>

                        <div class="field">
                            <label for="associate_nome">Nome</label>
                            <input id="associate_nome" name="nome" type="text" value="<?= h((string) ($editingAssociate['nome'] ?? '')); ?>">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="associate_cpf">CPF</label>
                                <input id="associate_cpf" name="cpf" type="text" value="<?= h(format_cpf((string) ($editingAssociate['cpf'] ?? ''))); ?>">
                            </div>

                            <div class="field">
                                <label for="associate_email">E-mail</label>
                                <input id="associate_email" name="email" type="email" value="<?= h((string) ($editingAssociate['email'] ?? '')); ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label for="associate_senha"><?= $editingAssociate !== null ? 'Nova senha' : 'Senha inicial'; ?></label>
                            <input id="associate_senha" name="senha" type="password">
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit"><?= $editingAssociate !== null ? 'Salvar alteracoes' : 'Salvar associado'; ?></button>
                            <?php if ($editingAssociate !== null): ?>
                                <a class="button button-secondary" href="<?= h(asset_url('admin/dashboard.php')); ?>">Cancelar</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel">
                    <h3>Fichas de associacao</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Associado</th>
                            <th>Status</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($requests as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['nome']); ?></strong><br>
                                    CPF: <?= h(format_cpf((string) $item['cpf'])); ?><br>
                                    E-mail: <?= h($item['email']); ?>
                                </td>
                                <td>
                                    <span class="badge"><?= h($item['status']); ?></span>
                                    <?php if (!empty($item['admin_nome'])): ?>
                                        <br><small>Liberado por <?= h($item['admin_nome']); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (($item['status'] ?? '') === 'pendente'): ?>
                                        <form method="post" class="form-grid compact-form">
                                            <input type="hidden" name="action" value="approve_request">
                                            <input type="hidden" name="request_id" value="<?= (int) $item['id']; ?>">
                                            <input name="associate_password" type="text" placeholder="Senha inicial">
                                            <button class="button button-primary button-small" type="submit">Liberar acesso</button>
                                        </form>
                                        <form method="post" class="top-gap-sm">
                                            <input type="hidden" name="action" value="reject_request">
                                            <input type="hidden" name="request_id" value="<?= (int) $item['id']; ?>">
                                            <button class="link-danger" type="submit">Rejeitar</button>
                                        </form>
                                    <?php else: ?>
                                        <span>Sem acao pendente</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <section class="panel table-panel">
                    <h3>Associados liberados</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Associado</th>
                            <th>Acesso</th>
                            <th>Status</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($associates as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['nome']); ?></strong><br>
                                    CPF: <?= h(format_cpf((string) $item['cpf'])); ?>
                                </td>
                                <td><?= h($item['email']); ?></td>
                                <td><span class="badge"><?= (int) $item['liberado_area_restrita'] === 1 ? 'liberado' : 'bloqueado'; ?></span></td>
                                <td>
                                    <div class="icon-actions">
                                        <a class="icon-button" href="<?= h(asset_url('admin/dashboard.php')); ?>?edit_associate=<?= (int) $item['id']; ?>#associate_nome" aria-label="Editar associado">
                                            <svg viewBox="0 0 24 24" focusable="false"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25Zm17.71-10.04a1.003 1.003 0 0 0 0-1.42l-2.5-2.5a1.003 1.003 0 0 0-1.42 0l-1.96 1.96 3.75 3.75 2.13-2.79Z" fill="currentColor"/></svg>
                                        </a>
                                        <form method="post">
                                            <input type="hidden" name="action" value="delete_associate">
                                            <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                            <button class="icon-button danger" type="submit" aria-label="Excluir associado">
                                                <svg viewBox="0 0 24 24" focusable="false"><path d="M6 7h12l-1 14H7L6 7Zm3-3h6l1 2h4v2H4V6h4l1-2Z" fill="currentColor"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel admin-grid-full">
                    <h3>Administradores</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($admins as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['nome']); ?></strong><br>
                                    @<?= h($item['usuario']); ?>
                                </td>
                                <td><?= h((string) $item['email']); ?></td>
                                <td><span class="badge"><?= (int) $item['ativo'] === 1 ? 'ativo' : 'inativo'; ?></span></td>
                                <td>
                                    <div class="icon-actions">
                                        <a class="icon-button" href="<?= h(asset_url('admin/dashboard.php')); ?>?edit_admin=<?= (int) $item['id']; ?>#admin_nome" aria-label="Editar administrador">
                                            <svg viewBox="0 0 24 24" focusable="false"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25Zm17.71-10.04a1.003 1.003 0 0 0 0-1.42l-2.5-2.5a1.003 1.003 0 0 0-1.42 0l-1.96 1.96 3.75 3.75 2.13-2.79Z" fill="currentColor"/></svg>
                                        </a>
                                        <form method="post">
                                            <input type="hidden" name="action" value="delete_admin">
                                            <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                            <button class="icon-button danger" type="submit" aria-label="Excluir administrador">
                                                <svg viewBox="0 0 24 24" focusable="false"><path d="M6 7h12l-1 14H7L6 7Zm3-3h6l1 2h4v2H4V6h4l1-2Z" fill="currentColor"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <section class="admin-section" id="admin-institucional">
            <div class="admin-section-heading">
                <div>
                    <h3>Institucional</h3>
                    <p>Textos das paginas institucionais e representacao da diretoria e conselho fiscal.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3>Conteudo institucional</h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="save_institutional_page">
                        <input type="hidden" name="slug" value="quem-somos">
                        <div class="field">
                            <label for="quem_somos_title">Titulo - Quem Somos</label>
                            <input id="quem_somos_title" name="title" type="text" value="<?= h($institutionalPages['quem-somos']['title'] ?? ''); ?>">
                        </div>
                        <div class="field">
                            <label for="quem_somos_content">Texto - Quem Somos</label>
                            <textarea id="quem_somos_content" name="content"><?= h($institutionalPages['quem-somos']['content'] ?? ''); ?></textarea>
                        </div>
                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar Quem Somos</button>
                        </div>
                    </form>

                    <form method="post" class="form-grid top-gap">
                        <input type="hidden" name="action" value="save_institutional_page">
                        <input type="hidden" name="slug" value="diretoria">
                        <div class="field">
                            <label for="diretoria_title">Titulo - Diretoria</label>
                            <input id="diretoria_title" name="title" type="text" value="<?= h($institutionalPages['diretoria']['title'] ?? ''); ?>">
                        </div>
                        <div class="field">
                            <label for="diretoria_content">Texto - Diretoria</label>
                            <textarea id="diretoria_content" name="content"><?= h($institutionalPages['diretoria']['content'] ?? ''); ?></textarea>
                        </div>
                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar Diretoria</button>
                        </div>
                    </form>

                    <form method="post" class="form-grid top-gap">
                        <input type="hidden" name="action" value="save_institutional_page">
                        <input type="hidden" name="slug" value="conselho-fiscal">
                        <div class="field">
                            <label for="conselho_title">Titulo - Conselho Fiscal</label>
                            <input id="conselho_title" name="title" type="text" value="<?= h($institutionalPages['conselho-fiscal']['title'] ?? ''); ?>">
                        </div>
                        <div class="field">
                            <label for="conselho_content">Texto - Conselho Fiscal</label>
                            <textarea id="conselho_content" name="content"><?= h($institutionalPages['conselho-fiscal']['content'] ?? ''); ?></textarea>
                        </div>
                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar Conselho Fiscal</button>
                        </div>
                    </form>
                </section>

                <section class="panel">
                    <h3>Cadastrar representante</h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="add_representative">

                        <div class="field">
                            <label for="section_slug">Secao</label>
                            <select id="section_slug" name="section_slug">
                                <option value="diretoria">Diretoria</option>
                                <option value="conselho-fiscal">Conselho Fiscal</option>
                            </select>
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="rep_name">Nome</label>
                                <input id="rep_name" name="name" type="text">
                            </div>
                            <div class="field">
                                <label for="rep_role">Cargo</label>
                                <input id="rep_role" name="role" type="text">
                            </div>
                        </div>

                        <div class="field">
                            <label for="rep_description">Descricao</label>
                            <textarea id="rep_description" name="description"></textarea>
                        </div>

                        <div class="field">
                            <label for="sort_order">Ordem</label>
                            <input id="sort_order" name="sort_order" type="number" value="1">
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar representante</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel admin-grid-full">
                    <h3>Representantes</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Secao</th>
                            <th>Nome</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($representativesGrouped as $sectionSlug => $items): ?>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?= h($sectionSlug); ?></td>
                                    <td>
                                        <strong><?= h($item['name']); ?></strong><br>
                                        <?= h($item['role']); ?>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="action" value="delete_representative">
                                            <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                            <button class="link-danger" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <section class="admin-section" id="admin-documentos">
            <div class="admin-section-heading">
                <div>
                    <h3>Documentos</h3>
                    <p>Publicacao de convencoes, emolumentos e informativos anuais.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3>Subir PDF anual</h3>
                    <form method="post" class="form-grid" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_annual_document">

                        <div class="field">
                            <label for="document_type">Tipo</label>
                            <select id="document_type" name="document_type">
                                <option value="convencao">Convencao</option>
                                <option value="emolumentos">Tabela de Emolumentos</option>
                                <option value="informativo">Informativo</option>
                            </select>
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="year_label">Ano</label>
                                <input id="year_label" name="year_label" type="text" placeholder="2026">
                            </div>
                            <div class="field">
                                <label for="title">Titulo</label>
                                <input id="title" name="title" type="text" placeholder="Convencao Coletiva 2026">
                            </div>
                        </div>

                        <div class="field">
                            <label for="document_file">Arquivo PDF</label>
                            <input id="document_file" name="document_file" type="file" accept="application/pdf">
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar documento</button>
                        </div>
                    </form>
                </section>

                <section class="panel table-panel">
                    <h3>Documentos anuais</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Ano</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (array_merge($convencoes, $emolumentos, $informativos) as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['title']); ?></strong><br>
                                    <?= h($item['document_type']); ?>
                                </td>
                                <td><?= h($item['year_label']); ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_annual_document">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <section class="admin-section" id="admin-conteudo">
            <div class="admin-section-heading">
                <div>
                    <h3>Conteudo</h3>
                    <p>Noticias da Home e boletos publicados para os associados.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3>Cadastrar noticia</h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="add_news">

                        <div class="field">
                            <label for="news_title">Titulo</label>
                            <input id="news_title" name="title" type="text">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="news_category">Categoria</label>
                                <input id="news_category" name="category" type="text">
                            </div>

                            <div class="field">
                                <label for="news_date">Data</label>
                                <input id="news_date" name="date" type="date">
                            </div>
                        </div>

                        <div class="field">
                            <label for="news_excerpt">Resumo</label>
                            <textarea id="news_excerpt" name="excerpt"></textarea>
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar noticia</button>
                        </div>
                    </form>
                </section>

                <section class="panel">
                    <h3>Cadastrar boleto</h3>
                    <form method="post" class="form-grid">
                        <input type="hidden" name="action" value="add_invoice">

                        <div class="field">
                            <label for="associate_name">Nome do associado</label>
                            <input id="associate_name" name="associate_name" type="text">
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="cpf">CPF</label>
                                <input id="cpf" name="cpf" type="text">
                            </div>

                            <div class="field">
                                <label for="due_date">Vencimento</label>
                                <input id="due_date" name="due_date" type="date">
                            </div>
                        </div>

                        <div class="grid-two">
                            <div class="field">
                                <label for="reference">Referencia</label>
                                <input id="reference" name="reference" type="text">
                            </div>

                            <div class="field">
                                <label for="amount">Valor</label>
                                <input id="amount" name="amount" type="number" step="0.01">
                            </div>
                        </div>

                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="aberto">Aberto</option>
                                <option value="pago">Pago</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="barcode">Codigo de barras</label>
                            <textarea id="barcode" name="barcode"></textarea>
                        </div>

                        <div class="actions">
                            <button class="button button-primary" type="submit">Salvar boleto</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="admin-grid top-gap">
                <section class="panel table-panel">
                    <h3>Noticias cadastradas</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['news'] as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['title']); ?></strong><br>
                                    <span class="badge"><?= h($item['category']); ?></span>
                                </td>
                                <td><?= h($item['date']); ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_news">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <section class="panel table-panel">
                    <h3>Boletos cadastrados</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Associado</th>
                            <th>Status</th>
                            <th>Acao</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['invoices'] as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['associate_name']); ?></strong><br>
                                    CPF: <?= h(format_cpf((string) $item['cpf'])); ?><br>
                                    Ref.: <?= h($item['reference']); ?>
                                </td>
                                <td><span class="badge"><?= h($item['status']); ?></span></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_invoice">
                                        <input type="hidden" name="id" value="<?= (int) $item['id']; ?>">
                                        <button class="link-danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <section class="admin-section" id="admin-manutencao">
            <div class="admin-section-heading">
                <div>
                    <h3>Manutencao</h3>
                    <p>Ferramentas gerais para reorganizar o ambiente de exemplo quando tu estiver testando.</p>
                </div>
            </div>

            <div class="admin-grid">
                <section class="panel">
                    <h3>Restaurar dados de exemplo</h3>
                    <p class="hint">Usa essa acao somente quando quiser voltar o portal para o estado inicial de demonstracao.</p>
                    <form method="post" class="actions top-gap-sm">
                        <input type="hidden" name="action" value="reset_data">
                        <button class="button button-secondary dark" type="submit">Restaurar dados</button>
                    </form>
                </section>
            </div>
        </section>
    </div>
</main>

<?php render_footer(); ?>
