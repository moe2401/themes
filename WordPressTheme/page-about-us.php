<?php get_header(); ?>
<main>
      <section class="sub-mv">
        <div class="sub-mv__inner">
          <picture class="sub-mv__img">
            <source
              media="(max-width: 768px)"
              srcset="<?php echo get_theme_file_uri(); ?>/images/sub/sub-aboutus-sp-img.jpg"
            />
            <img src="<?php echo get_theme_file_uri(); ?>/images/sub/sub-aboutus-pc-img.jpg" alt="2匹の黄色い魚が泳いでいる様子"
            />
          </picture>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
          <h1 class="sub-page-title__main">About us</h1>
        </div>
      </section>

      <!-- パンクズ -->
      <div class="breadcrumb layout-breadcrumb decoration">
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
      
      <section class="sub-about-us layout-sub-about-us">
        <div class="sub-about-us__inner inner">
          <div class="sub-about-us__wrapper">
            <div class="about-us__img-wrap about-us">
              <div class="about-us__img-left about-us__img-left--noShow">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo get_theme_file_uri(); ?>/images/common/about-us_1.jpg"
                  />
                  <img src="<?php echo get_theme_file_uri(); ?>/images/common/about-us-pc_1.jpg" alt="赤い屋根の上にいる赤いシーサー"
                  />
                </picture>
              </div>

              <div class="about-us__img-right about-us__img-right--subPage">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo get_theme_file_uri(); ?>/images/common/about-us_2.jpg"
                  />
                  <img src="<?php echo get_theme_file_uri(); ?>/images/common/about-us-pc_2.jpg" alt="2匹の黄色の魚が泳いでいる様子"
                  />
                </picture>
              </div>
            </div>

            <div class="about-us__contents about-us__contents--sub">
              <h3 class="about-us__title about-us__title--white">
                Dive into<br />
                the Ocean
              </h3>
              <div class="about-us__text-wrap about-us__text-wrap--margin">
                <div class="about-us__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                </div>
              </div>
            </div>
          </div>

          <div class="sub-about-us__gallery gallery">
            <div class="gallery__inner">
              <div class="gallery__header section-header">
                <h3 class="section-header__title">Gallery</h3>
                <h2 class="section-header__sub">フォト</h2>
              </div>

              <div class="gallery__modal js-modal">
              <?php
                $gallery_group = SCF::get('gallery');
                if ($gallery_group && is_array($gallery_group)) :
                ?>
                  <ul class="gallery__list gallery-list">
                    <?php foreach ($gallery_group as $gallery_item) : ?>
                      <?php 
                      $image = $gallery_item['gallery_img'];
                      if (!empty($image)) :
                      ?>
                        <li class="gallery-list__item js-modal-open">
                          <img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true); ?>" />
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                <div class="modal">
                  <div class="bigimg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php get_footer(); ?>