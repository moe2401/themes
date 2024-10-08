<?php get_header(); ?>

<main>
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__img">
                <source media="(max-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-campaign-sp-img.jpg" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-campaign-pc-img.jpg" alt="2匹の黄色い魚が泳いでいる様子" />
            </picture>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
            <h1 class="sub-page-title__main">Campaign</h1>
        </div>
    </section>

    <!-- パンクズ -->
    <?php get_template_part('inc/breadcrumb'); ?>

    <div class="sub-campaign layout-sub-campaign">
        <div class="sub-campaign__inner inner">
            <ul class="tab__menu">
                <li class="tab__menu-item <?php echo is_post_type_archive('campaign') ? 'is-active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/campaign/')); ?>">ALL</a>
                </li>

                <?php
                $taxonomy_terms = get_terms(array(
                    'taxonomy' => 'campaign_genre',
                    'hide_empty' => false
                ));
                ?>

                <?php if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) : ?>
                    <?php foreach ($taxonomy_terms as $term) : ?>
                        <?php $active_class = is_tax('campaign_genre', $term->slug) ? 'is-active' : ''; ?>
                        <li class="tab__menu-item <?php echo $active_class; ?>">
                            <a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <div class="sub-campaign__content">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = [
                    "post_type" => "campaign",
                    "posts_per_page" => 4,
                    "paged" => $paged
                ];

                if (is_tax('campaign_genre')) {
                    $term = get_queried_object();
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'campaign_genre',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ],
                    ];
                }

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                ?>
                    <ul class="sub-campaign__cards">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <li class="sub-campaign__item">
                                <div class="campaign-card campaign-card--large">
                                    <div class="campaign-card__img">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                                        <?php endif; ?>
                                    </div>

                                    <div class="campaign-card__item-body">
                                        <div class="campaign-card__meta">
                                            <span class="campaign-card__tag">
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'campaign_genre');
                                                if ($terms && !is_wp_error($terms)) {
                                                    echo esc_html($terms[0]->name);
                                                }
                                                ?>
                                            </span>
                                            <p class="campaign-card__category campaign-card__category--large">
                                                <?php the_title(); ?>
                                            </p>
                                        </div>
                                        <?php
                                        // campaign_price グループフィールドを取得
                                        $campaign_info = get_field('campaign_info');
                                        ?>
                                        <div class="campaign-card__contents">
                                            <p class="campaign-card__title">
                                                <?= $campaign_info && isset($campaign_info['plan_title'])
                                                    ? esc_html($campaign_info['plan_title'])
                                                    : '情報がありません'; ?>
                                            </p>

                                            <div class="campaign-card__price-body">
                                                <!-- price_info グループを取得 -->
                                                <?php
                                                $price_info = isset($campaign_info['price_info']) ? $campaign_info['price_info'] : null;
                                                ?>
                                                <span class="campaign-card__price">
                                                    <?php
                                                    // price を取得
                                                    $price = $price_info && isset($price_info['price']) ? $price_info['price'] : null;
                                                    $formatted_price = $price !== null ? '￥' . number_format($price) : '価格情報がありません';
                                                    echo esc_html($formatted_price);
                                                    ?>
                                                </span>

                                                <span class="campaign-card__price-discount">
                                                    <?php
                                                    // 割引価格を取得
                                                    $price_discount = $price_info && isset($price_info['price_discount']) ? $price_info['price_discount'] : null;
                                                    $formatted_discount = $price_discount !== null ? '￥' . number_format($price_discount) : '価格情報がありません';
                                                    echo esc_html($formatted_discount);
                                                    ?>
                                                </span>
                                            </div>

                                            <div class="campaign-card__text-box u-desktop">
                                                <p class="campaign-card__text">
                                                    <?php the_content(); ?>
                                                </p>

                                                <div class="campaign-card__wrap">
                                                    <span class="campaign-card__date">
                                                        <?php
                                                        // campaign_info グループフィールドを取得
                                                        $campaign_info = get_field('campaign_info');

                                                        // period_info グループを取得
                                                        $period_info = isset($campaign_info['period_info']) ? $campaign_info['period_info'] : null;

                                                        // period_start と period_end を取得
                                                        $date_start = $period_info && isset($period_info['period_start']) ? esc_html($period_info['period_start']) : '期間情報がありません';
                                                        $date_end = $period_info && isset($period_info['period_end']) ? esc_html($period_info['period_end']) : '';

                                                        // date_end が設定されていない場合は、date_start のみを表示
                                                        echo $date_start . ($date_end ? ' - ' . $date_end : '');
                                                        ?>
                                                    </span>
                                                    <p class="contact__button-text">
                                                        ご予約・お問い合わせはコチラ
                                                    </p>
                                                    <div class="contact__button contact__button--margin">
                                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="button">
                                                            <span>Contact us</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p>記事が投稿されていません</p>
                    <?php endif; ?>
                    </ul>
            </div>

            <div class="sub-campaign__pagenavi pagenavi">
                <div class="pagenavi__inner">
                    <div class="wp-pagenavi" role="navigation">
                        <?php wp_pagenavi(array('query' => $the_query)); // WP_Queryを指定 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</main>