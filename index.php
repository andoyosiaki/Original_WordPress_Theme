<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php if(is_month()): ?>
         <h4>「 <?php the_time('Y年m月'); ?> 」の記事</h4>
       <?php elseif (is_category()): ?>
         <h4>「 <?php single_cat_title(); ?> 」の記事</h4>
       <?php endif; ?>
        <div class="main_wrapper">
        <?php get_template_part('loop'); ?>
        </div>
      </div>
      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
