<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-contact-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-contact-pc-img.jpg" alt="海岸に波が押し寄せている様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Contact</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <div class="breadcrumb layout-breadcrumb decoration">
    <div class="breadcrumb__inner inner">
      <?php if (function_exists('bcn_display')) { ?>
        <div class="about__breadcrumb">
          <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="sub-contact layout-sub-contact">
    <div class="sub-contact__inner inner">
      <div class="sub-contact__form">
        <div class="sub-contact__inner" novalidate="novalidate">
          <?php echo do_shortcode('[contact-form-7 id="4bf53d5"]'); ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>