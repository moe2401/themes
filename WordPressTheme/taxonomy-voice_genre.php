<?php get_header(); ?>

<main>
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__img">
                <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/images/sub/sub-voice-sp-img.jpg" />
                <img src="<?php echo get_theme_file_uri(); ?>/images/sub/sub-voice-pc-img.jpg" alt="5人のダイバーが泳いでいる様子" />
            </picture>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
            <h1 class="sub-page-title__main"><?php single_term_title(); ?></h1>
        </div>
    </section>

    <div class="breadcrumb layout-breadcrumb decoration">
        <div class="breadcrumb__inner inner">
            <!-- Breadcrumb NavXTで出力される部分 ここから -->
            <span>
                <a href="./index.html">
                    <span>TOP</span>
                </a>
            </span>
            &nbsp;&gt;&nbsp;
            <span>
                <span class="breadcrumb__current-item">お客さまの声</span>
            </span>
            <!-- Breadcrumb NavXTで出力される部分 ここまで -->
        </div>
    </div>

    <div class="sub-voice layout-sub-voice">
        <div class="sub-voice__inner inner">
            <div class="sub-voice__tab tab">
                <ul class="tab__menu">
                    <li class="tab__menu-item <?php echo is_post_type_archive('voice') ? 'is-active' : ''; ?>">
                        <a href="<?php echo get_post_type_archive_link('voice'); ?>">ALL</a>
                    </li>
                    <?php
                    $taxonomy_terms = get_terms(array(
                        'taxonomy' => 'voice_genre',
                        'hide_empty' => false,
                    ));
                    if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) {
                        foreach ($taxonomy_terms as $term) {
                            $active_class = is_tax('voice_genre', $term->slug) ? 'is-active' : '';
                            echo '<li class="tab__menu-item ' . $active_class . '">';
                            echo '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>';
                            echo '</li>';
                        }
                    }
                    ?>
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
                                                            echo '<span class="voice-card__tag">' . esc_html($taxonomy_term->name) . '</span>';
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
                                                    $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
                                                    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // 代替テキストを取得
                                                ?>
                                                    <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt_text); ?>"> <!-- 代替テキストをalt属性に設定 -->
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
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p>記事が投稿されていません</p>
                <?php endif; ?>
            </div>

            <div class="sub-campaign__pagenavi pagenavi">
                <div class="pagenavi__inner">
                    <div class="wp-pagenavi" role="navigation">
                        <!-- <a class="previouspostslink" rel="prev" href="#"
                      ><span></span
                    ></a> -->
                        <?php wp_pagenavi(); ?>
                    </div>
                    <!-- WP-PageNaviで出力される部分 ここまで -->
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>