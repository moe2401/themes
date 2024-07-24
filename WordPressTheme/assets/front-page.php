<?php get_header(); ?>


<main>
  <section class="mv layout-mv">
    <div class="mv__inner">
      <div class="mv__swiper js-mv-swiper swiper">
        <div class="swiper-wrapper">
          <?php
          $mv_images = SCF::get('mv-images');
          if ($mv_images && is_array($mv_images)) :
            foreach ($mv_images as $image) :
              if (!empty($image['mv-img']) && !empty($image['mv-sp-img'])) :
                $image_pc = wp_get_attachment_image_url($image['mv-img'], 'full');
                $image_sp = wp_get_attachment_image_url($image['mv-sp-img'], 'full');
                $alt_text = !empty($image['mv-alt']) ? esc_attr($image['mv-alt']) : get_post_meta($image['mv-img'], '_wp_attachment_image_alt', true);
          ?>
                <div class="swiper-slide">
                  <picture class="mv__img">
                    <source media="(max-width: 768px)" srcset="<?php echo esc_url($image_sp); ?>" />
                    <source media="(min-width: 769px)" srcset="<?php echo esc_url($image_pc); ?>" />
                    <img src="<?php echo esc_url($image_pc); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
                  </picture>
                </div>
          <?php
              endif;
            endforeach;
          endif;
          ?>
        </div>

      </div>
      <div class="mv__title-wrap title">
        <h2 class="title__main">DIVING</h2>
        <p class="title__sub">into the ocean</p>
      </div>
    </div>
  </section>


  <section class="campaign layout-campaign">
    <div class="campaign__inner inner">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="campaign__header section-header">
        <p class="section-header__title">Campaign</p>
        <h2 class="section-header__sub">キャンペーン</h2>
      </div>
      <div class="campaign__swiper-wrap">
        <div class="js-campaign-swiper swiper">
          <ul class="campaign__swiper-wrapper swiper-wrapper">
            <?php
            // カスタム投稿タイプ 'campaign' の投稿を取得
            $args = array(
              'post_type' => 'campaign', // カスタム投稿タイプ名
              'posts_per_page' => -1, // すべての投稿を取得
            );
            $campaign_query = new WP_Query($args);

            if ($campaign_query->have_posts()) :
              while ($campaign_query->have_posts()) : $campaign_query->the_post();
                $campaign_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // アイキャッチ画像を取得

                // タグを取得
                $terms = get_the_terms(get_the_ID(), 'campaign_genre'); // 'genre' はタクソノミー名
                $campaign_tag = !empty($terms) && !is_wp_error($terms) ? esc_html($terms[0]->name) : ''; // タグ名を取得

                // カテゴリを取得
                $category_terms = get_the_terms(get_the_ID(), 'campaign_category'); // 'campaign_category' タクソノミーから取得
                if ($category_terms && !is_wp_error($category_terms)) {
                  $campaign_category = esc_html($category_terms[0]->name); // カテゴリ名を取得
                } else {
                  $campaign_category = 'カテゴリが設定されていません'; // デフォルトメッセージ
                }

                $campaign_title = get_the_title(); // 投稿タイトル

                // campaign_subtitleを取得
                $subtitle_terms = get_the_terms(get_the_ID(), 'campaign_subtitle'); // 'campaign_subtitle' タクソノミーから取得
                $campaign_subtitle = !empty($subtitle_terms) && !is_wp_error($subtitle_terms) ? esc_html($subtitle_terms[0]->name) : ''; // サブタイトルを取得

                // 価格を取得
                $regular_price = get_the_terms(get_the_ID(), 'price');
                $campaign_price = !empty($regular_price) && !is_wp_error($regular_price) ? esc_html('¥' . number_format((int)$regular_price[0]->name)) : '価格未設定';

                // 割引価格を取得
                $price_discount = get_the_terms(get_the_ID(), 'price-discount');
                $campaign_discount_price = !empty($price_discount) && !is_wp_error($price_discount) ? esc_html('¥' . number_format((int)$price_discount[0]->name)) : '割引価格未設定';
            ?>
                <li class="campaign__slide swiper-slide">
                  <div class="campaign-card">
                    <div class="campaign-card__img">
                      <img src="<?php echo esc_url($campaign_image); ?>" alt="<?php echo esc_attr($campaign_title); ?>" />
                    </div>
                    <div class="campaign-card__item-body">
                      <div class="campaign-card__meta">
                        <span class="campaign-card__tag"><?php echo $campaign_tag; ?></span>
                        <p class="campaign-card__category">
                          <?php the_title(); ?>
                        </p> <!-- カテゴリを表示 -->
                      </div>
                      <div class="campaign-card__contents">
                        <p class="campaign-card__title">
                          <?php echo $campaign_subtitle; // campaign_subtitleを表示 
                          ?>
                        </p>
                        <div class="campaign-card__price-body">
                          <span class="campaign-card__price"><?php echo $campaign_price; ?></span>
                          <span class="campaign-card__price-discount"><?php echo $campaign_discount_price; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
            <?php
              endwhile;
              wp_reset_postdata(); // クエリをリセット
            else :
              echo '<li>No campaigns found.</li>'; // 投稿が見つからない場合
            endif;
            ?>
          </ul>
        </div>
      </div>
      <div class="campaign__button">
        <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>

  <section class="about-us layout-about-us">
    <div class="about-us__inner inner">
      <div class="about-us__header section-header">
        <p class="section-header__title">About us</p>
        <h2 class="section-header__sub">私たちについて</h2>
      </div>

      <div class="about-us__wrapper">
        <div class="about-us__img-wrap">
          <div class="about-us__img-left">
            <picture>
              <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/images/common/about-us_1.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/images/common/about-us-pc_1.jpg" alt="赤い屋根の上にいる赤いシーサー" />
            </picture>
          </div>

          <div class="about-us__img-right">
            <picture>
              <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/images/common/about-us_2.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/images/common/about-us-pc_2.jpg" alt="2匹の黄色の魚が泳いでいる様子" />
            </picture>
          </div>
        </div>

        <div class="about-us__contents">
          <h3 class="about-us__title">
            Dive into<br />
            the Ocean
          </h3>
          <div class="about-us__text-wrap">
            <div class="about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </div>
            <div class="about-us__button">
              <a href="<?php echo get_permalink(get_page_by_path('about-us')); ?>" class="button">
                <span>View more</span>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="information layout-information">
    <div class="information__inner inner">
      <div class="information__header section-header">
        <p class="section-header__title">Information</p>
        <h2 class="section-header__sub">ダイビング情報</h2>
      </div>

      <div class="information__wrap">
        <div class="information__img">
          <img src="<?php echo get_theme_file_uri(); ?>/images/common/information.jpg" alt="3匹の黄色の魚が海の中を泳いでいる様子" />
        </div>

        <div class="information__body">
          <div class="information__contents">
            <span class="information__title">ライセンス講習</span>
            <p class="information__text">
              当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
              正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
            </p>
            <div class="information__button">
              <a href="<?php echo get_permalink(get_page_by_path('information')); ?>" class="button">
                <span>View more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog layout-blog">
    <div class="blog__inner inner">
      <div class="blog__header section-header">
        <p class="section-header__title section-header__title--white">
          Blog
        </p>
        <h2 class="section-header__sub section-header__sub--white">
          ブログ
        </h2>
      </div>

      <ul class="blog__items blog-cards">
        <?php
        // 変更: home.phpのデータを取得して表示
        $args = array(
          'post_type' => 'post', // 通常の投稿タイプ
          'posts_per_page' => 3, // 表示する投稿数
        );
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
            <li class="blog-cards__item">
              <a href="<?php the_permalink(); ?>" class="blog-card">
                <div class="blog-card__img">
                  <?php if (get_the_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/images/common/no-image.jpg" alt="no-image" />
                  <?php endif; ?>
                </div>
                <div class="blog-card__body">
                  <div class="blog-card__meta">
                    <time class="blog-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
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
        <?php
          endwhile;
          wp_reset_postdata(); // クエリをリセット
        else :
          echo '<li>No blog posts found.</li>'; // 投稿が見つからない場合
        endif;
        ?>
      </ul>
      <div class="blog__button">
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button">
          <span>View more</span>
        </a>
      </div>

    </div>
  </section>

  <section class="voice layout-voice">
    <div class="voice__inner inner">
      <div class="voice__header section-header">
        <p class="section-header__title">Voice</p>
        <h2 class="section-header__sub">お客様の声</h2>
      </div>

      <ul class="voice__items voice-cards">
        <?php
        // 変更: archive-voice.phpのデータを取得して表示
        $args = array(
          'post_type' => 'voice', // カスタム投稿タイプ
          'posts_per_page' => 2, // 表示する投稿数
        );
        $voice_query = new WP_Query($args);

        if ($voice_query->have_posts()) :
          while ($voice_query->have_posts()) : $voice_query->the_post();
        ?>
            <li class="voice-cards__item">
              <div class="voice-card">
                <div class="voice-card__body">
                  <div class="voice-card__wrap">
                    <div class="voice-card__contents">
                      <div class="voice-card__meta">
                        <span class="voice-card__age">
                          <?php
                          $age_terms = get_the_terms(get_the_ID(), 'age');
                          $gender_terms = get_the_terms(get_the_ID(), 'gender');
                          $age = $age_terms ? $age_terms[0]->name : '';
                          $gender = $gender_terms ? $gender_terms[0]->name : '';
                          if ($age && $gender) {
                            echo esc_html($age . '(' . $gender . ')');
                          } elseif ($age) {
                            echo esc_html($age);
                          } elseif ($gender) {
                            echo esc_html('(' . $gender . ')');
                          }
                          ?>
                        </span>
                        <!-- カテゴリー -->
                        <?php
                        $taxonomy_terms = get_the_terms(get_the_ID(), 'voice_genre');
                        if (!empty($taxonomy_terms)) {
                          foreach ($taxonomy_terms as $taxonomy_term) {
                            echo '<p class="voice-card__tag">' . esc_html($taxonomy_term->name) . '</p>';
                          }
                        }
                        ?>
                      </div>
                      <div class="voice-card__title">
                        <?php the_title(); ?>
                      </div>
                    </div>

                    <div class="voice-card__img">
                      <?php if (has_post_thumbnail()) :
                        $thumbnail_id = get_post_thumbnail_id();
                        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // 代替テキストを取得
                      ?>
                        <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/images/common/no-image.jpg" alt="no-image" />
                      <?php endif; ?>
                    </div>
                  </div>

                  <p class="voice-card__text">
                    <?php the_content(); ?>
                  </p>
                </div>
              </div>
            </li>
        <?php
          endwhile;
          wp_reset_postdata(); // クエリをリセット
        else :
          echo '<li>No voices found.</li>'; // 投稿が見つからない場合
        endif;
        ?>
      </ul>
      <div class="voice__button">
        <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>

  <section class="price layout-price">
    <div class="price__inner inner">
      <div class="price__header section-header">
        <p class="section-header__title">Price</p>
        <h2 class="section-header__sub">料金一覧</h2>
      </div>

      <div class="price__wrap">
        <picture class="price__img">
          <source media="(max-width: 767px)" srcset="<?php echo get_theme_file_uri(); ?>/images/common/price-sp.jpg" />
          <img src="<?php echo get_theme_file_uri(); ?>/images/common/price-pc.jpg" alt="たくさんの赤い小魚が海の中を泳いでいる様子" />
        </picture>


        <div class="price__contents">
          <?php
          // 固定ページIDを指定してSCFからメニューを取得
          $menu = SCF::get('menu', 127); // ID 127のページからメニューを取得
          if (is_array($menu) && !empty($menu)) {
            $grouped_items = [];
            foreach ($menu as $item) {
              $category = $item['add_category']; // カテゴリー名を取得
              if (!isset($grouped_items[$category])) {
                $grouped_items[$category] = [];
              }
              $grouped_items[$category][] = $item;
            }

            // 各カテゴリーのデータを出力
            foreach ($grouped_items as $category => $items) {
          ?>
              <div class="price__lists">
                <p class="price__title"><?php echo esc_html($category); ?></p> <!-- カテゴリー名を表示 -->
                <dl class="price__menu">
                  <?php
                  foreach ($items as $item) {
                  ?>
                    <div class="price__list">
                      <dt class="price__name"><?php echo esc_html($item['add_title']); ?></dt> <!-- サブフィールドからタイトルを表示 -->
                      <dd class="price__cost"><?php echo esc_html($item['add_price']); ?></dd> <!-- サブフィールドから価格を表示 -->
                    </div>
                  <?php
                  }
                  ?>
                </dl>
              </div>
          <?php
            }
          } else
            echo '<p>料金情報がありません。</p>'; // デフォルトメッセージ
          ?>

        </div>
      </div>
      <div class="price__button">
        <a href="<?php echo get_permalink(get_page_by_path('price')); ?>" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>