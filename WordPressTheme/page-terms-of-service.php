<?php get_header(); ?>

<section class="sub-mv">
    <div class="sub-mv__inner">
        <picture class="sub-mv__img">
            <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-sp-img.jpg" />
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-pc-img.jpg" alt="たくさんの小魚が海の中を泳いでいる様子" />
        </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
        <h1 class="sub-page-title__main">Terms of Service</h1>
    </div>
</section>

<!-- パンクズ -->
<?php get_template_part('inc/breadcrumb'); ?>

<div class="terms-of-service layout-terms-of-service">
    <div class="terms-of-service__inner inner">
        <div class="terms-of-service__content">
            <h2 class="terms-of-service__title"><?php the_title(); ?></h2>
            <div class="terms-of-service__wrap">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>