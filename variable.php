<?php

//front-page.php
global $wp_query; // 記事を表示する情報をこのコード内で使えるようにする
$big = 999999999; // 最大値を指定

$frontpageval = [
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), //URLの生成ルールを決める
    'format' => '?paged=%#%', //ページネーションの構造を指定
    'current' => max( 1, get_query_var('paged') ), //現在のページ番号を指定
    'total' => $wp_query->max_num_pages //全体のページ数を指定
];

//header.php
$headernavpc = [
  'container' => 'nav',
  'theme_location' => 'headnav'
];

$headernavsp = [
  'container' => 'nav',
  'container_class' => 'drawer-nav',
  'menu_class' => 'drawer-menu',
];

//relation.php
if( has_category() ) {
    $cats = get_the_category();
    $catkwds = [];
    foreach($cats as $cat) {
        $catkwds[] = $cat->term_id;
    }
}

$relationval = [
    'post_type' => 'post',
    'posts_per_page' => '6',
    'post__not_in' => [$post->ID],
    'category__in' => $catkwds,
    'orderby' => 'rand'
];
