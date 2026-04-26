<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$banners = $data['banners'];
$featuredImages = $data['featured_images'];
$galleryImages = $data['gallery_images'];
$news = $data['news'];
$latestNews = array_slice($news, 0, 5);

render_header('Sindi Amostra | Home', $home);
?>

<main>
    <section class="hero" id="inicio">
        <div class="container">
            <div class="banner-slider" data-banner-slider>
                <?php foreach ($banners as $index => $banner): ?>
                    <?php
                    $imagePath = (string) ($banner['image_path'] ?? '');
                    $imageUrl = string_starts_with($imagePath, 'http') ? $imagePath : asset_url($imagePath);
                    ?>
                    <article class="banner-slide<?= $index === 0 ? ' is-active' : ''; ?>" data-banner-slide style="background-image: linear-gradient(90deg, rgba(9, 48, 54, 0.86), rgba(9, 48, 54, 0.26)), url('<?= h($imageUrl); ?>');">
                        <div class="banner-content">
                            <span class="eyebrow">Destaque institucional</span>
                            <h1><?= h((string) ($banner['title'] ?? '')); ?></h1>
                            <p><?= h((string) ($banner['subtitle'] ?? '')); ?></p>
                            <div class="hero-actions">
                                <a class="button button-primary" href="<?= h(asset_url('associe-se.php')); ?>">
                                    <?= h($home['cta_label']); ?>
                                </a>
                                <a class="button button-secondary" href="<?= h(asset_url('area-restrita.php')); ?>">
                                    Entrar na area restrita
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php if (count($banners) > 1): ?>
                    <div class="banner-dots" aria-label="Troca de banners">
                        <?php foreach ($banners as $index => $banner): ?>
                            <button class="banner-dot<?= $index === 0 ? ' is-active' : ''; ?>" type="button" data-banner-dot aria-label="Banner <?= $index + 1; ?>"></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section" id="noticias-home">
        <div class="container">
            <div class="home-columns">
                <section class="panel column-panel">
                    <h3>NOTICIAS EM DESTAQUE</h3>
                    <div class="mini-slider" data-mini-slider>
                        <?php foreach ($featuredImages as $index => $image): ?>
                            <?php
                            $featuredPath = (string) ($image['image_path'] ?? '');
                            $featuredUrl = string_starts_with($featuredPath, 'http') ? $featuredPath : asset_url($featuredPath);
                            ?>
                            <figure class="mini-slide<?= $index === 0 ? ' is-active' : ''; ?>" data-mini-slide>
                                <img src="<?= h($featuredUrl); ?>" alt="<?= h((string) ($image['title'] ?? 'Imagem em destaque')); ?>">
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="panel column-panel">
                    <h3>Ultimas noticias</h3>
                    <div class="latest-news-list">
                        <?php foreach ($latestNews as $item): ?>
                            <article class="latest-news-item">
                                <div class="meta-row">
                                    <span><?= h($item['category']); ?></span>
                                    <span><?= h($item['date']); ?></span>
                                </div>
                                <h4><?= h($item['title']); ?></h4>
                                <p><?= h($item['excerpt']); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="panel column-panel">
                    <h3>Galeria de fotos</h3>
                    <div class="gallery-grid">
                        <?php foreach ($galleryImages as $image): ?>
                            <?php
                            $galleryPath = (string) ($image['image_path'] ?? '');
                            $galleryUrl = string_starts_with($galleryPath, 'http') ? $galleryPath : asset_url($galleryPath);
                            ?>
                            <figure class="gallery-card">
                                <img src="<?= h($galleryUrl); ?>" alt="<?= h((string) ($image['title'] ?? 'Foto da galeria')); ?>">
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>

</main>

<?php if (count($banners) > 1): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('[data-banner-slider]');
    if (!slider) {
        return;
    }

    const slides = Array.from(slider.querySelectorAll('[data-banner-slide]'));
    const dots = Array.from(slider.querySelectorAll('[data-banner-dot]'));
    let currentIndex = 0;

    const activateSlide = function (index) {
        slides.forEach(function (slide, slideIndex) {
            slide.classList.toggle('is-active', slideIndex === index);
        });

        dots.forEach(function (dot, dotIndex) {
            dot.classList.toggle('is-active', dotIndex === index);
        });

        currentIndex = index;
    };

    dots.forEach(function (dot, dotIndex) {
        dot.addEventListener('click', function () {
            activateSlide(dotIndex);
        });
    });

    window.setInterval(function () {
        activateSlide((currentIndex + 1) % slides.length);
    }, 5000);
});
</script>
<?php endif; ?>

<?php if (count($featuredImages) > 1): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('[data-mini-slider]');
    if (!slider) {
        return;
    }

    const slides = Array.from(slider.querySelectorAll('[data-mini-slide]'));
    let currentIndex = 0;

    const activateSlide = function (index) {
        slides.forEach(function (slide, slideIndex) {
            slide.classList.toggle('is-active', slideIndex === index);
        });

        currentIndex = index;
    };

    window.setInterval(function () {
        activateSlide((currentIndex + 1) % slides.length);
    }, 5000);
});
</script>
<?php endif; ?>

<?php render_footer(); ?>
