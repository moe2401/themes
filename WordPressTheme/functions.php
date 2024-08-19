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



//--------------thanksページへ遷移---------------------
$contact = 'contact';
$thanks = 'thanks';

add_action('wp_footer', 'redirect_thanks_page');
function redirect_thanks_page()
{
  global $contact;
  global $thanks;

?>
  <script>
    document.addEventListener('wpcf7mailsent', function(event) {
      location = '<?php echo home_url('/' . $contact . '/' . $thanks); ?>';
    }, false);
  </script>
<?php
}


// pre_get_postsアクションフックにカスタム関数を追加
add_action('pre_get_posts', 'modify_campaign_query');


// -----------Contact Form 7で自動挿入されるPタグ、brタグを削除-------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

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

// initアクションフックに追加
add_action('init', 'unregister_taxonomy_for_post_type');


// ----------------------管理画面------------------------
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

// ------------「メディア」の名前変更------------------
function change_menu_label()
{
  global $menu, $submenu;
  $menu[10][0] = '画像・ファイル';
  $submenu['upload.php'][5][0] = '画像・ファイル一覧';
  $submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action('admin_menu', 'change_menu_label');

// ------------ダッシュボードにオリジナルウィジェットを追加する--------------
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets()
{
  wp_add_dashboard_widget('my_theme_options_widget', 'ショートカットリンク', 'my_dashboard_widget_function');
}

function my_dashboard_widget_function()
{
  echo '<ul class="custom_widget">
            <li>
              <a href="post-new.php">
                <p>ブログ</p>
                <div class="dashicons dashicons-edit"></div>
              </a>
            </li>
            <li>
              <a href="post-new.php?post_type=campaign">
                <p>キャンペーン</p>
                <div class="dashicons dashicons-megaphone"></div>
              </a>
            </li>
            <li>
              <a href="edit.php?post_type=voice">
                <p>お客様の声</p>
                <div class="dashicons dashicons-admin-users"></div>
              </a>
            </li>
            <li>
              <a href="post.php?post=127&action=edit">
                <p>料金の変更</p>
                <div class="dashicons dashicons-money"></div>
              </a>
            </li>
            <li>
              <a href="post.php?post=153&action=edit">
                <p>よくある質問</p>
                <div class="dashicons dashicons-lightbulb"></div>
              </a>
            </li>
            <li>
              <a href="post.php?post=10&action=edit">
                <p>ギャラリー</p>
                <div class="dashicons dashicons-format-gallery"></div>
              </a>
            </li>
          </ul>';
}

function custom_admin_enqueue()
{
  wp_enqueue_style('custom-dashboard-style', get_stylesheet_directory_uri() . '/assets/css/custom-dashboard-style.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue');


// -------------------------投稿ページ--------------------------
//---------------サムネイルカラム追加----------------
function customize_manage_posts_columns($columns)
{
  $columns['thumbnail'] = __('Thumbnail');
  return $columns;
}
add_filter('manage_posts_columns', 'customize_manage_posts_columns');

//サムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id)
{
  if ('thumbnail' == $column_name) {
    $thum = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'));
  }
  if (isset($thum) && $thum) {
    echo $thum;
  } else {
    echo __('None');
  }
}
add_action('manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2);

// ------------------ログイン画面のカスタマイズ-------------------------
function custom_login_style()
{ ?>
  <style>
    /* ①ログイン画面の背景  */
    body.login {
      background-color: #ddf0f1;
    }

    /* ②ログイン画面のロゴ */
    body.login h1 a {
      width: 100%;
      background-repeat: no-repeat;
      background-size: contain;
      background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/logo.svg'); ?>')
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_style');
