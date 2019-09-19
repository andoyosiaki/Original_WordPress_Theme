<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="single_wrapper">
        <?php if(have_posts()):  while(have_posts()): the_post(); ?>
          <div class="breadcrumb">

            <span class="" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="<?= home_url(); ?>" itemprop="url">
                <span itemprop="title">Home</span>
              </a>&gt;&nbsp;
            </span>

            <?php if ( is_single() ) { ?>

              <span class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" itemprop="url">
                  <span itemprop="title"><?= $cat[0]->name; ?></span>
                </a>&gt;&nbsp;
              </span>

            <?php } else { ?>
            <?php } ?>

            <strong class="breadcrumbs"><?php the_title(); ?></strong>
          </div>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single_page'); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
              <div class="single_title-box">
                <h1 class="single_title entry-title" itemprop="name headline mainEntityOfPage"><?php the_title(); ?></h1>
              </div>
              <div class="single_thumbnail-box">
                <div class="time_box">
                  <p class="time_text"><time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m年d日'); ?></time></p>
                </div>
                <div  itemscope itemtype='http://schema.org/ImageObject' itemprop="image">
                  <a href="<?php the_permalink(); ?>" itemprop='url'>
                  <?php if(has_post_thumbnail()){ the_post_thumbnail([600,600]);}?>
                  </a>
                </div>
              </div>
              <div class="single_text-box" itemprop="articleBody">
                <?php the_content(); ?>
              <div class="sns_box">
                <a class="btn-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter"></i></a>
              </div>
              </div>
            </article>
        <?php endwhile; endif; ?>
      </div>
      <?php include( TEMPLATEPATH . '/relation.php' ); ?>
    </div>
    <div class="col-md-3" id="sidebar"  role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
