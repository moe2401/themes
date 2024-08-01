<?php get_header(); ?>

<main>
  <section class="mv layout-mv">
    <div class="mv__inner">
      <div class="mv__swiper js-mv-swiper swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(max-width: 768px)" srcset="/assets/images/common/mv_1.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv_1-pc.jpg" alt="海亀が泳いでいる様子" />
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(max-width: 768px)" srcset="/assets/images/common/mv_2.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv_2-pc.jpg" alt="海の中の海亀の様子" />
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(max-width: 768px)" srcset="/assets/images/common/mv_3.jpg" />
              <img src="/assets/images/common/mv_3-pc.jpg" alt="海と船が止まっている様子" />
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(max-width: 768px)" srcset="/assets/images/common/mv_4.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv_4-pc.jpg" alt="綺麗な海岸の様子" />
            </picture>
          </div>
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
            <li class="campaign__slide swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_1.jpg" alt="海の中を色鮮やかなたくさんの魚が泳いでいる様子" />
                </div>
                <div class="campaign-card__item-body">
                  <div class="campaign-card__meta">
                    <span class="campaign-card__tag">ライセンス講習</span>
                    <p class="campaign-card__category">ライセンス取得</p>
                  </div>
                  <div class="campaign-card__contents">
                    <p class="campaign-card__title">
                      全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price-body">
                      <span class="campaign-card__price">¥56,000</span>
                      <span class="campaign-card__price-discount">¥46,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li class="campaign__slide swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_2.jpg" alt="透明感のある海と停まっている船の様子" />
                </div>
                <div class="campaign-card__item-body">
                  <div class="campaign-card__meta">
                    <span class="campaign-card__tag">体験ダイビング</span>
                    <p class="campaign-card__category">
                      貸切体験ダイビング
                    </p>
                  </div>
                  <div class="campaign-card__contents">
                    <p class="campaign-card__title">
                      全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price-body">
                      <span class="campaign-card__price">¥24,000</span>
                      <span class="campaign-card__price-discount">¥18,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li class="campaign__slide swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_3.jpg" alt="夜の海をたくさんのクラゲが泳いでいる様子" />
                </div>
                <div class="campaign-card__item-body">
                  <div class="campaign-card__meta">
                    <span class="campaign-card__tag">体験ダイビング</span>
                    <p class="campaign-card__category">ナイトダイビング</p>
                  </div>
                  <div class="campaign-card__contents">
                    <p class="campaign-card__title">
                      全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price-body">
                      <span class="campaign-card__price">¥10,000</span>
                      <span class="campaign-card__price-discount">¥8,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li class="campaign__slide swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_4.jpg" alt="ダイビングをしている4人の人が海面に顔を出し話している様子" />
                </div>
                <div class="campaign-card__item-body">
                  <div class="campaign-card__meta">
                    <span class="campaign-card__tag">ファンダイビング</span>
                    <p class="campaign-card__category">
                      貸切ファンダイビング
                    </p>
                  </div>
                  <div class="campaign-card__contents">
                    <p class="campaign-card__title">
                      全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price-body">
                      <span class="campaign-card__price">¥20,000</span>
                      <span class="campaign-card__price-discount">¥16,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="campaign__button">
        <a href="./campaign.html" class="button">
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
              <source media="(max-width: 768px)" srcset="/assets/images/common/about-us_1.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-pc_1.jpg" alt="赤い屋根の上にいる赤いシーサー" />
            </picture>
          </div>

          <div class="about-us__img-right">
            <picture>
              <source media="(max-width: 768px)" srcset="/assets/images/common/about-us_2.jpg" />
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-pc_2.jpg" alt="2匹の黄色の魚が泳いでいる様子" />
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
              <a href="./about-us.html" class="button">
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
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information.jpg" alt="3匹の黄色の魚が海の中を泳いでいる様子" />
        </div>

        <div class="information__body">
          <div class="information__contents">
            <span class="information__title">ライセンス講習</span>
            <p class="information__text">
              当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
              正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
            </p>
            <div class="information__button">
              <a href="./information.html" class="button">
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
        <li class="blog-cards__item">
          <a href="#" class="blog-card">
            <div class="blog-card__img">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_1.jpg" alt="ピンクのサンゴ礁の写真" />
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time class="blog-card__time" datetime="2023-11-17">2023.11/17</time>
                <p class="blog-card__category">ライセンス取得</p>
              </div>
              <p class="blog-card__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </li>
        <li class="blog-cards__item">
          <a href="#" class="blog-card">
            <div class="blog-card__img">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_2.jpg" alt="海の中を泳ぐウミガメの写真" />
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time class="blog-card__time" datetime="2023-11-17">2023.11/17</time>
                <p class="blog-card__category">ウミガメと泳ぐ</p>
              </div>
              <p class="blog-card__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </li>
        <li class="blog-cards__item">
          <a href="#" class="blog-card">
            <div class="blog-card__img">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_3.jpg" alt="珊瑚礁の中にいるカクレクマノミの写真" />
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time class="blog-card__time" datetime="2023-11-17">2023.11/17</time>
                <p class="blog-card__category">カクレクマノミ</p>
              </div>
              <p class="blog-card__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </li>
      </ul>
      <div class="blog__button">
        <a href="./blog.html" class="button">
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
        <li class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__body">
              <div class="voice-card__wrap">
                <div class="voice-card__contents">
                  <div class="voice-card__meta">
                    <span class="voice-card__age">20代(女性)</span>
                    <p class="voice-card__tag">ライセンス講習</p>
                  </div>
                  <div class="voice-card__title">
                    ここにタイトルが入ります。ここにタイトル
                  </div>
                </div>

                <div class="voice-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-card_1.jpg" alt="帽子に手を添えて笑っている女性のお客様の写真" />
                </div>
              </div>

              <p class="voice-card__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>
          </div>
        </li>
        <li class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__body">
              <div class="voice-card__wrap">
                <div class="voice-card__contents">
                  <div class="voice-card__meta">
                    <span class="voice-card__age">20代(男性)</span>
                    <p class="voice-card__tag">ファンダイビング</p>
                  </div>

                  <div class="voice-card__title">
                    ここにタイトルが入ります。ここにタイトル
                  </div>
                </div>

                <div class="voice-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-card_2.jpg" alt="親指を立てるハンドサインをしている男性のお客様の写真" />
                </div>
              </div>

              <p class="voice-card__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>
          </div>
        </li>
      </ul>
      <div class="voice__button">
        <a href="./voice.html" class="button">
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
          <source media="(max-width: 767px)" srcset="/assets/images/common/price-sp.jpg" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg" alt="たくさんの赤い小魚が海の中を泳いでいる様子" />
        </picture>

        <div class="price__contents">
          <div class="price__lists">
            <p class="price__title">ライセンス講習</p>
            <dl class="price__menu">
              <div class="price__list">
                <dt class="price__name">
                  オープンウォーターダイバーコース
                </dt>
                <dd class="price__cost">¥50,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">
                  アドバンスドオープンウォーターコース
                </dt>
                <dd class="price__cost">¥60,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">レスキュー＋EFRコース</dt>
                <dd class="price__cost">¥70,000</dd>
              </div>
            </dl>
          </div>
          <div class="price__lists">
            <p class="price__title">体験ダイビング</p>
            <dl class="price__menu">
              <div class="price__list">
                <dt class="price__name">ビーチ体験ダイビング(半日)</dt>
                <dd class="price__cost">¥7,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">ビーチ体験ダイビング(1日)</dt>
                <dd class="price__cost">¥14,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">ボート体験ダイビング(半日)</dt>
                <dd class="price__cost">¥10,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">ボート体験ダイビング(1日)</dt>
                <dd class="price__cost">¥18,000</dd>
              </div>
            </dl>
          </div>
          <div class="price__lists">
            <p class="price__title">ファンダイビング</p>
            <dl class="price__menu">
              <div class="price__list">
                <dt class="price__name">ビーチダイビング(2ダイブ)</dt>
                <dd class="price__cost">¥14,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">ボートダイビング(2ダイブ)</dt>
                <dd class="price__cost">¥18,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">スペシャルダイビング(2ダイブ)</dt>
                <dd class="price__cost">¥24,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">ナイトダイビング(1ダイブ)</dt>
                <dd class="price__cost">¥10,000</dd>
              </div>
            </dl>
          </div>
          <div class="price__lists">
            <p class="price__title">スペシャルダイビング</p>
            <dl class="price__menu">
              <div class="price__list">
                <dt class="price__name">貸切ダイビング(2ダイブ)</dt>
                <dd class="price__cost">¥24,000</dd>
              </div>
              <div class="price__list">
                <dt class="price__name">1日ダイビング(3ダイブ)</dt>
                <dd class="price__cost">¥32,000</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
      <div class="price__button">
        <a href="./price.html" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>

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
            <a href="./contact.html" class="button">
              <span>Contact us</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>