<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/faq-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/faq-pc-img.jpg" alt="5人のダイバーが泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">FAQ</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-faq layout-sub-faq">
    <div class="sub-faq__inner inner">
      <div class="sub-faq__content faq">
        <div class="faq__inner">
          <ul class="faq__list faq-list">
            <?php
            $faq_items = SCF::get('faq');
            if (!empty($faq_items)) {
              foreach ($faq_items as $faq_item) {
                $question = esc_html($faq_item['question']);
                $answer = wp_kses_post($faq_item['answer']);
            ?>
                <li class="faq-list__item">
                  <p class="faq-list__item-question js-faq-question"><?php echo $question; ?></p>
                  <p class="faq-list__item-answer"><?php echo $answer; ?></p>
                </li>
            <?php
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <?php get_footer(); ?>