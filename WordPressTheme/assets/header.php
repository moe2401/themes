<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>
  <?php if (is_404()) : ?>
    <meta http-equiv="refresh" content=" 3; url=<?php echo esc_url(home_url("")); ?>">
  <?php endif; ?>
</head>

<body>
  <!-- loading animation -->
  <!-- <section class="loading js-loading">
      <div class="loading__title-wrap title">
        <h2 class="title__main title__main--green">DIVING</h2>
        <p class="title__sub title__sub--green">into the ocean</p>
      </div>

      <div class="loading__img-wrap">
        <div class="loading__slideIn-left">
          <img
            src="<?php echo get_theme_file_uri(); ?>/images/common/loading-img-left.jpg"
            alt="海亀が泳いでいる様子の左側"
          />
        </div>
        <div class="loading__slideIn-right">
          <img src="<?php echo get_theme_file_uri(); ?>/images/common/loading-img-right.jpg"
            alt="海亀が泳いでいる様子の右側"
          />
        </div>
      </div>

      <div class="loading__title-wrap title textFocus">
        <h2 class="title__main">DIVING</h2>
        <p class="title__sub">into the ocean</p>
      </div>
    </section> -->

  <!-- ページトップボタン -->
  <div class="page-top-button js-page-top">
    <img src="<?php echo get_theme_file_uri(); ?>/images/common/page-top-button.png" alt="トップへ戻るボタン" />
  </div>

  <header class="header js-header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo home_url('/'); ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/images/common/codeups.svg" alt="CodeUpsのロゴ" />
        </a>
      </h1>


      <nav class="header__nav">
        <ul class="header__nav-items">
          <li class="header__nav-item">
            <a href="<?php echo get_post_type_archive_link('campaign'); ?>">Campaign<span>キャンペーン</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_page_by_path('about-us')); ?>">About us<span>私たちについて</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_page_by_path('information')); ?>">Information<span>ダイビング情報</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog<span>ブログ</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_post_type_archive_link('voice'); ?>">Voice<span>お客様の声</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_page_by_path('price')); ?>">Price<span>料金一覧</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_page_by_path('faq')); ?>">FAQ<span>よくある質問</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact<span>お問合せ</span></a>
          </li>
        </ul>
      </nav>

      <button class="header__hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <div class="header__drawer js-drawer">
        <div class="header__drawer-nav nav-contents">
          <nav class="nav-contents__wrap">
            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo get_post_type_archive_link('campaign'); ?>">キャンペーン</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_0', 'campaign_genre');
                      if ($license_term && !is_wp_error($license_term)) {
                        $link = get_term_link($license_term);
                        echo '<a href="' . esc_url($link) . '">ライセンス取得</a>';
                      } else {
                        echo '<a href="#">ライセンス取得</a>';
                      }
                      ?>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_1', 'campaign_genre');
                      if ($license_term && !is_wp_error($license_term)) {
                        $link = get_term_link($license_term);
                        echo '<a href="' . esc_url($link) . '">貸切体験ダイビング</a>';
                      } else {
                        echo '<a href="#">貸切体験ダイビング</a>';
                      }
                      ?>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $license_term = get_term_by('slug', 'campaign_cat_2', 'campaign_genre');
                      if ($license_term && !is_wp_error($license_term)) {
                        $link = get_term_link($license_term);
                        echo '<a href="' . esc_url($link) . '">ナイトダイビング</a>';
                      } else {
                        echo '<a href="#">ナイトダイビング</a>';
                      }
                      ?>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('about-us')); ?>">私たちについて</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo get_post_type_archive_link('voice'); ?>">お客様の声</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('price')); ?>">料金一覧</a>
                </div>
                <ul class="nav-contents__items">
                  <li class="nav-contents__item">
                    <a href="<?php echo get_permalink(get_page_by_path('price')); ?>">ライセンス講習</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo get_permalink(get_page_by_path('price')); ?>">体験ダイビング</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo get_permalink(get_page_by_path('price')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('information')); ?>">ダイビング情報</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(get_permalink(get_page_by_path('information'))); ?>?id=tab01">ライセンス講習</a>
                    </li>

                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(get_permalink(get_page_by_path('information'))); ?>?id=tab03">体験ダイビング</a>
                    </li>

                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(get_permalink(get_page_by_path('information'))); ?>?id=tab02">ファンダイビング</a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ブログ</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('faq')); ?>">よくある質問</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('sitemap')); ?>">サイトマップ</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('terms-of-service')); ?>">利用規約</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">お問い合わせ</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>