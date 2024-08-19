<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-voice-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-voice-pc-img.jpg" alt="5人のダイバーが泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Voice</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-voice layout-sub-voice">
    <div class="sub-voice__inner inner">
      <div class="sub-voice__tab tab">
        <ul class="tab__menu">
          <li class="tab__menu-item <?php echo is_post_type_archive('voice') ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/voice/')); ?>">ALL</a>
          </li>
          <?php
          $taxonomy_terms = get_terms(array(
            'taxonomy' => 'voice_genre',
            'hide_empty' => false,
          ));
          ?>
          <?php if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) : ?>
            <?php foreach ($taxonomy_terms as $term) : ?>
              <?php $active_class = is_tax('voice_genre', $term->slug) ? 'is-active' : ''; ?>
              <li class="tab__menu-item <?php echo $active_class; ?>">
                <a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>

      <div class="sub-voice__content">
        <?php if (have_posts()) : ?>
          <ul class="voice-cards">
            <?php while (have_posts()) : the_post(); ?>
              <li class="voice-cards__item">
                <div class="voice-card">
                  <div class="voice-card__body">
                    <div class="voice-card__wrap">
                      <div class="voice-card__contents">
                        <div class="voice-card__meta">
                          <?php
                          // グループフィールドを取得
                          $voice_info = get_field('voice_info');

                          // voice_age の取得（選択フィールドの場合）
                          $age_value = '';
                          if (is_array($voice_info) && isset($voice_info['voice_age'])) {
                            $age_value = esc_html($voice_info['voice_age']); // 単一の値を取得
                          }

                          // voice_gender の取得（選択フィールドの場合）
                          $gender_value = '';
                          if (is_array($voice_info) && isset($voice_info['voice_gender'])) {
                            $gender_value = esc_html($voice_info['voice_gender']); // 単一の値を取得
                          }
                          ?>

                          <span class="voice-card__age">
                            <?php echo $age_value . ($gender_value ? " ($gender_value)" : ''); ?>
                          </span>

                          <!-- カテゴリー -->
                          <?php if ($taxonomy_terms = get_the_terms(get_the_ID(), 'voice_genre')) : ?>
                            <?php foreach ($taxonomy_terms as $taxonomy_term) : ?>
                              <p class="voice-card__tag"><?php echo esc_html($taxonomy_term->name); ?></p>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>


                        <div class="voice-card__title">
                          <?php the_title(); ?>
                        </div>
                      </div>

                      <div class="voice-card__img">
                        <?php if (has_post_thumbnail()) :
                          $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
                          $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // 代替テキストを取得
                        ?>
                          <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt_text); ?>"> <!-- 代替テキストをalt属性に設定 -->
                        <?php else : ?>
                          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                        <?php endif; ?>
                      </div>
                    </div>
                    <p class="voice-card__text">
                      <?php the_content(); ?>
                    </p>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
      </div>

      <div class="sub-campaign__pagenavi pagenavi">
        <div class="pagenavi__inner">
          <div class="wp-pagenavi" role="navigation">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>