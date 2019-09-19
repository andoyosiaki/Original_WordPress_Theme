<?php
// サムネイル表示
add_theme_support('post-thumbnails');
add_image_size( 'single-thumbnail', 400, 200,false );

//グローバルナビ表示
add_theme_support('menus');

// サムネイルサイズ
set_post_thumbnail_size( 1000, 9999 );
set_post_thumbnail_size( 400, 200,false );

// 抜粋文字数変更
function custom_excerpt($length){
  return 50;
}
add_filter('excerpt_length','custom_excerpt');

// 抜粋末尾変更
function custom_excerpt_end($end){
  return '...';
}
add_filter('excerpt_more','custom_excerpt_end');

//sidebar表示
register_sidebar([
  'before_title'  => '<h3 class="widget-title">',
  'after_title'   => '</h3>',
]);

//category-label
function categories_label() {
    $cats = get_the_category();
    foreach($cats as $cat){
        echo '<li><a href="'.get_category_link($cat->term_id).'" ';
        echo 'class="'.esc_attr($cat->slug).'">';
        echo esc_html($cat->name);
        echo '</a></li>';
    }
}

register_nav_menus(
  [
    'headnav' => 'ヘッダーナビゲーション',
    'sidebarnav' => 'サイドナビゲーション',
    'bottomnav' => 'ボトムナビゲーション',
    'footernav' => 'フッターナビゲーション左',
    'footernav2' => 'フッターナビゲーション右'
  ]
);


// カスタムヘッダー
$custom_header = [
'random-default' => false,
'width' => 800,
'height' => 300,
'flex-height' => true,
'flex-width' => true,
'default-text-color' => '',
'header-text' => false,
'uploads' => true,
'default-image' => get_stylesheet_directory_uri() . '/img/default_img.png',
];
add_theme_support( 'custom-header', $custom_header );


// script読み込み
function add_scripts() {
  wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',true);
  wp_enqueue_script('my_js',get_template_directory_uri().'/js/main.js',true);
  wp_enqueue_script('drawer',get_template_directory_uri().'/drawer/drawer.min.js',true);
  wp_enqueue_script('drawer2',get_template_directory_uri().'/drawer/drawer.min.js',true);
  wp_enqueue_script('drawer3',get_template_directory_uri().'/drawer/iscroll.js',true);

}
add_action('wp_print_scripts', 'add_scripts');

//stylesheet読み込み
function add_styles() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  wp_enqueue_style( 'drawer', get_template_directory_uri().'/drawer/drawer.min.css' );
  wp_enqueue_style( 'animate', get_template_directory_uri().'/animate/animate.min.css' );
}

add_action( 'wp_enqueue_scripts', 'add_styles' );


//emoji削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


//ページング
function paging(){
  $big = 9999999999;
  $arg = [
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'current' => max( 1, get_query_var('paged') ),
      'total'   => $wp_query->max_num_pages
  ];
  echo paginate_links();
}
