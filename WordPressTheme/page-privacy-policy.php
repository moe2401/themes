<?php get_header(); ?>

<section class="sub-mv">
    <div class="sub-mv__inner">
        <picture class="sub-mv__img">
            <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-sp-img.jpg" />
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-pc-img.jpg" alt="たくさんの小魚が海の中を泳いでいる様子" />
        </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
        <h1 class="sub-page-title__main">Privacy Policy</h1>
    </div>
</section>

<!-- パンクズ -->
<?php get_template_part('inc/breadcrumb'); ?>

<div class="privacy-policy layout-privacy-policy">
    <div class="privacy-policy__inner inner">
        <div class="privacy-policy__content">
            <h2 class="privacy-policy__title"><?php the_title(); ?></h2>
            <div class="privacy-policy__wrap">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>