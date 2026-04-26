<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

require_associate();

$data = load_site_data();
$home = $data['home'];
$associate = get_associate_by_id(current_associate_id() ?? 0);
$invoices = $associate ? get_associate_open_invoices((int) $associate['id'], (string) $associate['cpf']) : [];

render_header('Sindi Amostra | Painel do Associado', $home);
?>

<main class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <h2>Area restrita do associado</h2>
                <p>Espaco inicial para consultar os dados liberados pelo administrador.</p>
            </div>
            <div class="inline-actions">
                <a class="button button-secondary dark" href="<?= h(asset_url('associado/logout.php')); ?>">Sair</a>
            </div>
        </div>

        <?php if ($associate !== null): ?>
            <div class="admin-grid">
                <section class="panel">
                    <h3>Dados de acesso</h3>
                    <p><strong>Nome:</strong> <?= h($associate['nome']); ?></p>
                    <p><strong>CPF:</strong> <?= h(format_cpf((string) $associate['cpf'])); ?></p>
                    <p><strong>E-mail:</strong> <?= h($associate['email']); ?></p>
                    <p><strong>Status:</strong> <?= h($associate['status']); ?></p>
                </section>

                <section class="panel table-panel">
                    <h3>Boletos em aberto</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Referencia</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($invoices as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= h($item['reference_label']); ?></strong><br>
                                    <small><?= h($item['barcode']); ?></small>
                                </td>
                                <td><?= h($item['due_date']); ?></td>
                                <td><?= h(format_currency_br((float) $item['amount'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if ($invoices === []): ?>
                            <tr>
                                <td colspan="3">Nenhum boleto em aberto encontrado.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php render_footer(); ?>
