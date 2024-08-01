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

  <div class="sub-thanks layout-sub-thanks">
    <div class="sub-thanks__inner inner">
      <div class="sub-thanks__content">
        <p class="sub-thanks__success">
          お問い合わせ内容を送信完了しました。
        </p>
        <p class="sub-thanks__text">
          このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。<br />
          お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />
          また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。<br />
        </p>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>