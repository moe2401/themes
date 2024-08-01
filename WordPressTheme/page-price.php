<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-price-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-price-pc-img.jpg" alt="海面にダイバーの頭が見えている様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Price</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <div class="breadcrumb layout-breadcrumb decoration">
    <div class="breadcrumb__inner inner">
      <!-- Breadcrumb NavXTで出力される部分 ここから -->
      <?php if (function_exists('bcn_display')) { ?>
        <div class="about__breadcrumb">
          <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>


  <div class="sub-price layout-sub-price">
    <div class="sub-price__inner inner">
      <div class="sub-price__table price-lists">

        <!-- 一つの表 ここから-->
        <?php
        $menu = SCF::get('menu');
        if (is_array($menu) && !empty($menu)) {
          $grouped_items = [];
          foreach ($menu as $item) {
            $category = $item['add_category'];
            if (!isset($grouped_items[$category])) {
              $grouped_items[$category] = [];
            }
            $grouped_items[$category][] = $item;
          }

          foreach ($grouped_items as $category => $items) {
        ?>
            <div class="price-lists__items price-list">
              <p class="price-list__title">
                <span></span>
                <?php echo esc_html($category); ?>
              </p>
              <dl class="price-list__content">
                <?php
                foreach ($items as $item) {

                ?>
                  <div class="price-list__wrap">
                    <dt class="price-list__data">
                      <?php echo esc_html($item['add_title']); ?>
                    </dt>
                    <dd class="price-list__data">
                      <?php echo nl2br(esc_html($item['add_price'])); ?>
                    </dd>
                  </div>
                <?php
                }
                ?>
              </dl>
            </div>
        <?php
          }
        }
        ?>
        <!-- 一つの表ここまで -->
      </div>
    </div>
  </div>

  <?php get_footer(); ?>