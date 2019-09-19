<?php
 include locate_template('variable.php');
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php if(!is_home()){wp_title('-','true','right');} ?><?php bloginfo('name'); ?></title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 <?php wp_head(); ?>
</head>
<body class="drawer drawer--right">
  <header itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <div class="brand">
      <?php if(is_home() || is_front_page()): ?>
      <h1 class="brand_h1"><a href="<?= esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
      <?php else: ?>
      <h2 class="brand_h2"><a href="<?= esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h2>
      <?php endif; ?>
    </div>
    <div class="drawer_box">
      <button type="button" class="drawer-toggle drawer-hamburger">
        <span class="sr-only">toggle navigation</span>
        <span class="drawer-hamburger-icon"></span>
      </button>
    </div>
    <div class="menu">
      <?php wp_nav_menu($headernavpc); ?>
    </div>
    <div class="menu-sp">
      <?php wp_nav_menu($headernavsp); ?>
    </div>
  </header>

<?php if(is_home() || is_front_page()): ?>
<div class="header_subsection">
  <img src="<?php header_image(); ?>" height="<?= get_custom_header()->height; ?>" width="<?= get_custom_header()->width; ?>" alt="" />
</div>
<?php endif; ?>
