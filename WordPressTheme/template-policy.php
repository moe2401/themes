<?php
/*
Template Name: Policy Pages
*/

get_header(); // ヘッダーの読み込み

// 現在の固定ページのスラッグを取得
$page_slug = get_post_field('post_name', get_post());

if ($page_slug == 'privacy-policy') {
    // プライバシーポリシーページの内容
?>
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__img">
                <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-sp-img.jpg" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-pc-img.jpg" alt="たくさんの小魚が海の中を泳いでいる様子" />
            </picture>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
            <h1 class="sub-page-title__main">Privacy Policy</h1>
        </div>
    </section>

    <div class="breadcrumb layout-breadcrumb decoration">
        <div class="breadcrumb__inner inner">
            <span><a href="<?php echo home_url(); ?>"><span>TOP</span></a></span>&nbsp;&gt;&nbsp;
            <span><span class="breadcrumb__current-item">プライバシーポリシー</span></span>
        </div>
    </div>
    <div class="privacy-policy layout-privacy-policy">
        <div class="privacy-policy__inner inner">
            <div class="privacy-policy__content">
                <h2 class="privacy-policy__title"><?php the_title(); ?></h2>
                <div class="privacy-policy__wrap">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    else :
                        echo '<p>コンテンツが見つかりませんでした。</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif ($page_slug == 'terms-of-service') {
    // 利用規約ページの内容
?>
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__img">
                <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-sp-img.jpg" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/site-map-pc-img.jpg" alt="たくさんの小魚が海の中を泳いでいる様子" />
            </picture>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
            <h1 class="sub-page-title__main">Terms of Service</h1>
        </div>
    </section>

    <div class="breadcrumb layout-breadcrumb decoration">
        <div class="breadcrumb__inner inner">
            <span><a href="<?php echo home_url(); ?>"><span>TOP</span></a></span>&nbsp;&gt;&nbsp;
            <span><span class="breadcrumb__current-item">利用規約</span></span>
        </div>
    </div>
    <div class="terms-of-service layout-terms-of-service">
        <div class="terms-of-service__inner inner">
            <div class="terms-of-service__content">
                <h2 class="terms-of-service__title"><?php the_title(); ?></h2>
                <div class="terms-of-service__wrap">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    else :
                        echo '<p>コンテンツが見つかりませんでした。</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

get_footer(); // フッターの読み込み
?>