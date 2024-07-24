<?php get_header(); ?>

    <!-- パンクズ -->
      <div class="breadcrumb breadcrumb--white layout-breadcrumb decoration">
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

        <div class="error layout-error">
          <div class="error__inner inner">
            <div class="error__content">
              <h1 class="error__title">404</h1>
              <div class="error__text-wrap">
                <p class="error__text">申し訳ありません。</p>
                <p class="error__text">お探しのページが見つかりません。</p>
              </div>
              <div class="error__button">
                <a href="./index.html" class="button button--white">
                  <span>Page TOP</span>
                </a>
              </div>
            </div>
          </div>
        </div>

<?php get_footer(); ?>