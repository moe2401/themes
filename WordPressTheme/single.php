<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
      <?php get_template_part('inc/breadcrumb'); ?>

      <section class="sub-blog layout-sub-blog">
        <div class="sub-blog__inner inner">
          <div class="sub-blog__content">
            <div class="sub-blog__main">
              <div>
                <time class="blog-card__time" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
                <?php
                $cat = get_the_category();
                if (!empty($cat)) {
                  $cat_name = $cat[0]->cat_name; // カテゴリが存在する場合のみ取得
                } else {
                  $cat_name = '未分類'; // カテゴリがない場合のデフォルト名
                }
                ?>
                <h1 class="sub-blog__category"><?php echo esc_html($cat_name); ?></h1>
                <div class="sub-blog__img">
                  <?php if (get_the_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" />
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                  <?php endif; ?>
                </div>
              </div>

              <div class="sub-blog__bottom">
                <?php the_content(); ?>
              </div>

              <div class="sub-blog__pagenavi pagenavi">
                <div class="pagenavi__inner">
                  <div class="wp-pagenavi wp-pagenavi--detail" role="navigation">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <?php if ($prev_post) : ?>
                      <a class="previouspostslink" rel="prev" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                        <span></span>
                      </a>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                      <a class="nextpostslink nextpostslink--detail" rel="next" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                        <span></span>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php get_sidebar(); ?>
          </div>
        </div>
      </section>
  <?php endwhile;
  endif; ?>

  <?php get_footer(); ?>
</main>