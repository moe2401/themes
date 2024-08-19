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
  <?php get_template_part('inc/breadcrumb'); ?>


  <div class="sub-price layout-sub-price">
    <div class="sub-price__inner inner">
      <div class="sub-price__table price-lists">

        <!-- 一つの表 ここから-->
        <?php
        $menu = SCF::get('menu');
        if (is_array($menu) && !empty($menu)) :
          $grouped_items = [];
          foreach ($menu as $item) :
            $category = $item['add_category']; // チェックボックスの値が配列である場合
            if (is_array($category)) :
              foreach ($category as $cat) :
                if (!isset($grouped_items[$cat])) :
                  $grouped_items[$cat] = [];
                endif;
                $grouped_items[$cat][] = $item;
              endforeach;
            else :
              if (!isset($grouped_items[$category])) :
                $grouped_items[$category] = [];
              endif;
              $grouped_items[$category][] = $item;
            endif;
          endforeach;
          foreach ($grouped_items as $category => $items) :

        ?>
            <div class="price-lists__items price-list">
              <p class="price-list__title">
                <span></span>
                <?php echo esc_html($category); ?>
              </p>
              <dl class="price-list__content">
                <?php
                foreach ($items as $item) :
                ?>
                  <div class="price-list__wrap">
                    <dt class="price-list__data">
                      <?php echo esc_html($item['add_title']); ?>
                    </dt>
                    <dd class="price-list__data">
                      <?php
                      // add_price が存在し、数値であることを確認
                      $add_price = isset($item['add_price']) && is_numeric($item['add_price']) ? $item['add_price'] : 0;
                      $formatted_price = '￥' . number_format($add_price);
                      echo esc_html($formatted_price);
                      ?>
                    </dd>
                  </div>
                <?php
                endforeach;
                ?>
              </dl>
            </div>
        <?php
          endforeach;
        endif;
        ?>
        <!-- 一つの表ここまで -->
      </div>
    </div>
  </div>

  <?php get_footer(); ?>