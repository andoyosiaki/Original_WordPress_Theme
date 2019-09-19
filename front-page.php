<?php
 include locate_template('variable.php');
 get_header();
 ?>


<main id="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="main_wrapper">
          <?php get_template_part('loop'); ?>
        </div>
      </div>
      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <div class="paging">
  <?= paginate_links($frontpageval); ?>
  </div>
</main>
<?php get_footer(); ?>
