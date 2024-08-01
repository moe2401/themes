<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-blog-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-blog-pc-img.jpg" alt="2匹の黄色い魚が泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <div class="sub-page-title__main">Blog</div>
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

  <div class="sub-blog layout-sub-blog">
    <div class="sub-blog__inner inner">
      <div class="sub-blog__content">
        <div class="sub-blog__main">
          <ul class="sub-blog__items blog-cards blog-cards--subPage">

            <?php
            // 日付に基づいて投稿を取得
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $year = get_query_var('year');
            $month = get_query_var('monthnum');
            $day = get_query_var('day');

            // 日付が有効な場合のみdate_queryを設定
            $date_query = array();
            if ($year && $month) {
              $date_query[] = array(
                'year'  => $year,
                'month' => $month,
              );

              // dayが有効な場合のみ追加
              if ($day) {
                $date_query[0]['day'] = $day;
              }
            }

            $args = array(
              'date_query' => $date_query,
              'posts_per_page' => 6, // 1ページに表示する投稿数
              'paged' => $paged,
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="blog-cards__item">
                  <a href="<?php the_permalink(); ?>" class="blog-card">
                    <div class="blog-card__img blog-card__img--animation">
                      <?php if (get_the_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url("full"); ?>" alt="ピンクのサンゴ礁の写真" />
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                      <?php endif; ?>
                    </div>
                    <div class="blog-card__body">
                      <div class="blog-card__meta">
                        <time class="blog-card__time" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
                        <?php $cat = get_the_category();
                        $cat = $cat[0]->cat_name; ?>
                        <p class="blog-card__category"><?php echo esc_html($cat); ?></p>
                      </div>
                      <p class="blog-card__text">
                        <?php
                        $content = get_the_content();
                        $content = strip_tags($content); // HTMLタグを削除
                        $content = str_replace(array("\r", "\n"), '', $content); // 改行を削除
                        $limit = 85; // 約5行分の文字数（調整が必要な場合があります）
                        echo mb_substr($content, 0, $limit);
                        ?>
                      </p>
                    </div>
                  </a>
                </li>

              <?php endwhile; ?>
          </ul>

          <div class="sub-blog__pagenavi pagenavi">
            <div class="pagenavi__inner">
              <div class="wp-pagenavi" role="navigation">
                <?php wp_pagenavi(); ?>
              </div>
            </div>
          </div>

        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        </div>
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
  </div>

  <?php get_footer(); ?>
</main>