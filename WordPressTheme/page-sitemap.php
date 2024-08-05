<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-pc-img.jpg" alt="たくさんの小魚が海の中を泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Site MAP</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-site-map layout-site-map">
    <div class="sub-site-map__inner inner">
      <div class="sub-site-map__content">
        <div class="sub-site-map__nav nav-contents">
          <nav class="nav-contents__wrap nav-contents__wrap--gap">
            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/campaign/')); ?>">キャンペーン</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_0', 'campaign_genre');
                      ?>
                      <a href="<?= $license_term && !is_wp_error($license_term) ? esc_url(get_term_link($license_term)) : '#' ?>">
                        ライセンス取得
                      </a>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_1', 'campaign_genre');
                      ?>
                      <a href="<?= $license_term && !is_wp_error($license_term) ? esc_url(get_term_link($license_term)) : '#' ?>">
                        貸切体験ダイビング
                      </a>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_2', 'campaign_genre');
                      ?>
                      <a href="<?= $license_term && !is_wp_error($license_term) ? esc_url(get_term_link($license_term)) : '#' ?>">
                        ナイトダイビング
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>">私たちについて</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/price/')); ?>">料金一覧</a>
                </div>
                <ul class="nav-contents__items">
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/price/')); ?>">ライセンス講習</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/price/')); ?>">体験ダイビング</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/price/')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/information/')); ?>">ダイビング情報</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab01">ライセンス講習</a>
                    </li>
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab03">体験ダイビング</a>
                    </li>
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab02">ファンダイビング</a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/faq/')); ?>">よくある質問</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">利用規約</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問合せ</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>