<?php if (!is_page('contact') && !is_404()) : ?>
  <section class="contact layout-contact">
    <div class="contact__inner inner">
      <div class="contact__wrap">
        <div class="contact__info">
          <div class="contact__logo">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-logo.svg" alt="CodeUpsのロゴ" />
          </div>
          <div class="contact__detail">
            <div class="contact__lists-wrap">
              <ul class="contact__lists">
                <li class="contact__list">沖縄県那覇市1-1</li>
                <li class="contact__list">TEL:0120-000-0000</li>
                <li class="contact__list">営業時間:8:30-19:00</li>
                <li class="contact__list">定休日:毎週火曜日</li>
              </ul>
            </div>

            <div class="contact__map-wrap">
              <div class="contact__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d57269.05009306561!2d127.63670374973589!3d26.218932030701666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e3!4m5!1s0x34e5698332101cf9%3A0xa001fb75096d7c18!2z44CSOTAwLTAwMzIg5rKW57iE55yM6YKj6KaH5biC5p2-5bGx77yR5LiB55uu!3m2!1d26.2188609!2d127.6779035!4m0!5e0!3m2!1sja!2sjp!4v1712753897717!5m2!1sja!2sjp" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="contact__contents">
          <div class="contact__header section-header">
            <p class="section-header__title section-header__title--contact">
              Contact
            </p>
            <h2 class="section-header__sub section-header__sub--contact">
              お問い合わせ
            </h2>
          </div>
          <p class="contact__button-text">ご予約・お問い合わせはコチラ</p>
          <div class="contact__button">
            <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="button">
              <span>Contact us</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
</main>

<footer class="footer layout-footer<?php if (is_404()) : ?> layout-footer--404<?php endif; ?>">
  <div class="footer__inner inner">
    <div class="footer__inner inner">
      <div class="footer__wrap">
        <div class="footer__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/codeups.svg" alt="CodeUpsのロゴ" />
        </div>
        <div class="footer__sns">
          <a href="https://www.facebook.com" target=”_blank” class="footer__sns-icon"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sns-icon_1.png" alt="facebookのアイコン" /></a>
          <a href="https://www.instagram.com" target=”_blank” class="footer__sns-icon"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sns-icon_2.png" alt="インスタグラムのアイコン" /></a>
        </div>
      </div>

      <div class="footer__nav nav-contents">
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
    <div class="footer__copyright">
      <small>Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>