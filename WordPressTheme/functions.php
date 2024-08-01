<?php
function enqueue_custom_scripts_and_styles()
{
  // Google Fontsの設定
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap', array(), null);

  // preconnectの追加
  add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
  }, 1);

  // Swiper CSSの読み込み
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.0');

  // メインのスタイルシートの読み込み
  wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');

  // jQueryの読み込み（WordPressのバージョンに注意）
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.js', array(), '3.7.1', true);

  // Swiper JSの読み込み
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), '8.0', true);

  // jQuery inviewの読み込み
  wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array('jquery'), '1.0', true);

  // メインのJavaScriptファイルの読み込み
  wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles');

function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support(
    'html5',
    array( /* HTML5のタグで出力 */
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');

// --------------人気記事投稿-------------------------
function getPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return '0 Views'; // 最初のreturnだけ残します
  }
  return $count . ' Views'; // 'PV' を 'Views' に統一
}

function setPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

// Prevents WordPress from printing previous and next post links in the head
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* ---------- 「投稿」の表記変更 ---------- */
function Change_menulabel()
{
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新規' . $name . '投稿';
}
function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'ブログ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');


// -----------Contact Form 7で自動挿入されるPタグ、brタグを削除-------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}


//--------------thanksページへ遷移---------------------
add_action('wp_footer', 'add_thanks_wcf7');

function add_thanks_wcf7()
{
  echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
location = 'http://localhost:10033/thanks/';
}, false );
</script>
EOD;
}

//-----------campaign,voiceページの投稿数-----------------
function modify_campaign_query($query)
{
  // 管理画面ではなく、メインクエリの場合
  if (!is_admin() && $query->is_main_query()) {
    // 「campaign」投稿タイプのアーカイブページの場合
    if (is_post_type_archive('campaign')) {
      $query->set('posts_per_page', 4);
    }
    // 「voice」投稿タイプのアーカイブページの場合
    if (is_post_type_archive('voice')) {
      $query->set('posts_per_page', 6);
    }
  }
}

// pre_get_postsアクションフックにカスタム関数を追加
add_action('pre_get_posts', 'modify_campaign_query');



// ----------Contact Form 7 セレクトボックスのカスタマイズ------------
function filter_wpcf7_form_tag($scanned_tag, $replace)
{

  if (!empty($scanned_tag)) {

    // nameで判別
    if ($scanned_tag['name'] == 'menu-257') {

      // `campaign` カスタム投稿タイプの取得
      global $post;
      $args = array(
        'post_type' => 'campaign',
        'posts_per_page' => -1,
        'order' => 'DESC',
      );
      $custom_posts = get_posts($args);
      if (!empty($custom_posts)) {
        foreach ($custom_posts as $post) {
          setup_postdata($post);

          $title = get_the_title();
          $value = sanitize_title($title);
          // $scanned_tagに情報を追加
          $scanned_tag['values'][] = $title;
          $scanned_tag['labels'][] = $title;
        }
        wp_reset_postdata();
      }
    }
  }

  return $scanned_tag;
}

add_filter('wpcf7_form_tag', 'filter_wpcf7_form_tag', 11, 2);

// -----------campaignの誤タクソノミー削除------------------
function unregister_taxonomy_for_post_type()
{
  // 既に登録されているタクソノミーを解除する
  unregister_taxonomy_for_object_type('voice_genre', 'campaign');
}

// initアクションフックに追加
add_action('init', 'unregister_taxonomy_for_post_type');
