<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$informativos = get_annual_documents_by_type('informativo');

render_header('Sindi Amostra | Informativo', $home);
?>

<main class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <h2>Informativo</h2>
                <p>Baixe aqui o informativo do ano desejado.</p>
            </div>
        </div>

        <section class="panel">
            <div class="document-year-list">
                <?php foreach ($informativos as $item): ?>
                    <article class="document-year-card">
                        <div>
                            <strong>Baixe aqui o informativo de <?= h($item['year_label']); ?></strong>
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
</main>

<?php render_footer(); ?>
