<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-blog-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-blog-pc-img.jpg" alt="海の中を色鮮やかなたくさんの魚が泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <div class="sub-page-title__main">Blog</div>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-blog layout-sub-blog">
    <div class="sub-blog__inner inner">
      <div class="sub-blog__content">
        <div class="sub-blog__main">
          <ul class="sub-blog__items blog-cards blog-cards--subPage">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="blog-cards__item">
                  <a href="<?php the_permalink(); ?>" class="blog-card">
                    <div class="blog-card__img blog-card__img--animation">
                      <?php if (get_the_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>" />
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                      <?php endif; ?>
                    </div>
                    <div class="blog-card__body">
                      <div class="blog-card__meta">
                        <time class="blog-card__time" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
                        <?php $cat = get_the_category();
                        $cat = $cat[0]->cat_name; ?>
                        <p class="blog-card__category"><?php the_title(); ?></p>
                      </div>
                      <p class="blog-card__text">
                        <?php
                        $content = mb_substr(strip_tags(get_the_content()), 0, 86);
                        echo $content;
                        ?>
                      </p>
                    </div>
                  </a>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>

          <div class="sub-blog__pagenavi pagenavi">
            <div class="pagenavi__inner">
              <div class="wp-pagenavi" role="navigation">
                <?php wp_pagenavi(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>