<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$pagesMap = get_institutional_pages_map();
$representatives = get_representatives_grouped();

render_header('Sindi Amostra | Institucional', $home);
?>

<main class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <h2>Institucional</h2>
                <p>Apresentacao da entidade e dos representantes responsaveis pela conducao institucional.</p>
            </div>
        </div>

        <div class="subnav-tabs">
            <a href="#quem-somos">Quem Somos</a>
            <a href="#diretoria">Diretoria</a>
            <a href="#conselho-fiscal">Conselho Fiscal</a>
        </div>

        <section class="panel institutional-section" id="quem-somos">
            <h3><?= h($pagesMap['quem-somos']['title'] ?? 'Quem Somos'); ?></h3>
            <p><?= nl2br(h($pagesMap['quem-somos']['content'] ?? '')); ?></p>
        </section>

        <section class="panel institutional-section" id="diretoria">
            <h3><?= h($pagesMap['diretoria']['title'] ?? 'Diretoria'); ?></h3>
            <p><?= nl2br(h($pagesMap['diretoria']['content'] ?? '')); ?></p>

            <div class="representative-grid">
                <?php foreach ($representatives['diretoria'] ?? [] as $item): ?>
                    <article class="representative-card">
                        <h4><?= h($item['name']); ?></h4>
                        <strong><?= h($item['role']); ?></strong>
                        <p><?= h((string) $item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="panel institutional-section" id="conselho-fiscal">
            <h3><?= h($pagesMap['conselho-fiscal']['title'] ?? 'Conselho Fiscal'); ?></h3>
            <p><?= nl2br(h($pagesMap['conselho-fiscal']['content'] ?? '')); ?></p>

            <div class="representative-grid">
                <?php foreach ($representatives['conselho-fiscal'] ?? [] as $item): ?>
                    <article class="representative-card">
                        <h4><?= h($item['name']); ?></h4>
                        <strong><?= h($item['role']); ?></strong>
                        <p><?= h((string) $item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</main>

<?php render_footer(); ?>
