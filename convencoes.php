<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$convencoes = get_annual_documents_by_type('convencao');
$emolumentos = get_annual_documents_by_type('emolumentos');

render_header('Sindi Amostra | Convencoes', $home);
?>

<main class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <h2>Convencoes e Tabela de Emolumentos</h2>
                <p>Selecione o ano desejado e baixe o PDF correspondente.</p>
            </div>
        </div>

        <div class="grid-two">
            <section class="panel">
                <h3>Convencoes</h3>
                <div class="document-year-list">
                    <?php foreach ($convencoes as $item): ?>
                        <article class="document-year-card">
                            <div>
                                <strong><?= h($item['year_label']); ?></strong>
                                <p><?= h($item['title']); ?></p>
                            </div>
                            <?php if ((string) $item['file_path'] !== ''): ?>
                                <a class="button button-primary button-small" href="<?= h(asset_url((string) $item['file_path'])); ?>" target="_blank" rel="noreferrer">Baixar PDF</a>
                            <?php else: ?>
                                <span class="badge">PDF pendente</span>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="panel">
                <h3>Tabela de Emolumentos</h3>
                <div class="document-year-list">
                    <?php foreach ($emolumentos as $item): ?>
                        <article class="document-year-card">
                            <div>
                                <strong><?= h($item['year_label']); ?></strong>
                                <p><?= h($item['title']); ?></p>
                            </div>
                            <?php if ((string) $item['file_path'] !== ''): ?>
                                <a class="button button-primary button-small" href="<?= h(asset_url((string) $item['file_path'])); ?>" target="_blank" rel="noreferrer">Baixar PDF</a>
                            <?php else: ?>
                                <span class="badge">PDF pendente</span>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</main>

<?php render_footer(); ?>
