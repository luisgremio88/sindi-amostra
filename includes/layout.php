<?php

declare(strict_types=1);

function render_header(string $pageTitle, array $homeData): void
{
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= h($pageTitle); ?></title>
        <link rel="stylesheet" href="<?= h(asset_url('assets/css/site.css')); ?>">
    </head>
    <body>
    <div class="site-shell">
        <header class="site-header">
            <div class="container header-row">
                <a class="brand" href="<?= h(asset_url('index.php')); ?>">
                    <strong><?= h($homeData['site_name'] ?? 'SINDI AMOSTRA'); ?></strong>
                    <span><?= h($homeData['subtitle'] ?? 'Modelo institucional'); ?></span>
                </a>

                <div class="header-nav-wrap">
                    <nav class="main-nav">
                        <a href="<?= h(asset_url('index.php')); ?>">Inicio</a>
                        <a href="<?= h(asset_url('institucional.php')); ?>">Institucional</a>
                        <a href="<?= h(asset_url('contato.php')); ?>">Contato</a>
                        <a href="<?= h(asset_url('convencoes.php')); ?>">Convencoes</a>
                        <a href="<?= h(asset_url('informativo.php')); ?>">Informativo</a>
                    </nav>

                    <div class="header-actions-nav">
                        <a class="button button-primary button-nav" href="<?= h(asset_url('associe-se.php')); ?>">
                            <?= h($homeData['cta_label'] ?? 'Associe-se'); ?>
                        </a>
                        <a class="button button-secondary dark button-nav" href="<?= h(asset_url('area-restrita.php')); ?>">
                            Area Restrita
                        </a>
                    </div>
                </div>
            </div>
        </header>
    <?php
}

function render_footer(): void
{
    ?>
        <footer class="site-footer">
            <div class="container footer-row">
                <div class="footer-brand">
                    <strong>Sindi Amostra</strong>
                    <p>Projeto criado por Luis para estudo e demonstracao.</p>
                </div>

                <div class="footer-contact">
                    <div class="footer-contact-item">
                        <span class="footer-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5Z" fill="currentColor"/></svg>
                        </span>
                        <div>
                            <strong>Endereco</strong>
                            <p>Av. Borges de Medeiros, Praia de Belas | Porto Alegre | RS | Brasil, 90110-150</p>
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <span class="footer-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M6.62 10.79a15.46 15.46 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.11.37 2.3.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.3 21 3 13.7 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.28.19 2.47.56 3.58a1 1 0 0 1-.24 1.01l-2.2 2.2Z" fill="currentColor"/></svg>
                        </span>
                        <div>
                            <strong>Telefone</strong>
                            <p>(51) xxxx-xxxx</p>
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <span class="footer-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5-8-5V6l8 5 8-5v2Z" fill="currentColor"/></svg>
                        </span>
                        <div>
                            <strong>E-mail</strong>
                            <p>contato@sindi-amostra.local</p>
                        </div>
                    </div>

                    <div class="footer-social">
                        <a class="footer-social-link" href="#" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.87.24-1.46 1.49-1.46H17V5a28.9 28.9 0 0 0-2.4-.12c-2.38 0-4.1 1.45-4.1 4.12V11H8v3h2.5v8h3Z" fill="currentColor"/></svg>
                        </a>
                        <a class="footer-social-link" href="#" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2.2A2.8 2.8 0 0 0 4.2 7v10A2.8 2.8 0 0 0 7 19.8h10a2.8 2.8 0 0 0 2.8-2.8V7A2.8 2.8 0 0 0 17 4.2H7Zm10.25 1.65a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.2a2.8 2.8 0 1 0 0 5.6 2.8 2.8 0 0 0 0-5.6Z" fill="currentColor"/></svg>
                        </a>
                        <a class="footer-social-link" href="#" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M18.9 2H22l-6.77 7.74L23 22h-6.1l-4.78-6.95L6.04 22H2.93l7.24-8.28L1 2h6.26l4.32 6.29L18.9 2Zm-1.07 18h1.69L6.34 3.9H4.52L17.83 20Z" fill="currentColor"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </body>
    </html>
    <?php
}
