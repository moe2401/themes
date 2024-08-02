<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-info-sp-img.jpg" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-info-pc-img.jpg" alt="2匹の黄色い魚が泳いでいる様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Information</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>


  <section class="sub-information layout-sub-information">
    <div class="sub-information__inner inner">
      <div class="sub-information__contents">
        <div class="sub-information__tab tab-info">
          <ul class="tab-info__menu">
            <li class="tab-info__menu-item js-tab-info-menu current" data-number="tab01">
              <span>ライセンス<br class="u-mobile" />講習</span>
            </li>

            <li class="tab-info__menu-item js-tab-info-menu" data-number="tab02">
              <span>ファン<br class="u-mobile" />ダイビング</span>
            </li>

            <li class="tab-info__menu-item js-tab-info-menu" data-number="tab03">
              <div class="tab-info__img u-desktop"></div>
              <span>体験<br class="u-mobile" />ダイビング</span>
            </li>
          </ul>

          <ul class="tab-info__content">
            <li id="tab01" class="tab-info__content-item js-tab-info-content current">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">ライセンス講習</p>
                    </div>
                    <p class="info-card__text">
                      泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/license.jpg" alt="5人おダイバーが海に浮かんでいる様子" />
                  </div>
                </div>
              </a>
            </li>

            <li id="tab02" class="tab-info__content-item js-tab-info-content">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">ファンダイビング</p>
                    </div>
                    <p class="info-card__text">
                      ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/fundiving.jpg" alt="5人のダイバーが海に浮かんでいる様子" />
                  </div>
                </div>
              </a>
            </li>

            <li id="tab03" class="tab-info__content-item js-tab-info-content">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">体験ダイビング</p>
                    </div>
                    <p class="info-card__text">
                      ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-aboutus_3.jpg" alt="5人おダイバーが海に浮かんでいる様子" />
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>