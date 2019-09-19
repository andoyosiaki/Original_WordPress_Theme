<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article_page'); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
        <div class="row">
          <div class="col-4">
            <div class="article_page-box">
              <div class="single_text-box">
                <div  itemscope itemtype='http://schema.org/ImageObject' itemprop="image">
                <a href="<?php the_permalink(); ?>"  itemprop='url'>
                <?php if(has_post_thumbnail()){ the_post_thumbnail([300,290]);}?>
                </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="info_box">
              <ul class="category_box">
                <?php categories_label() ?>
              </ul>
              <div class="time_box">
                <?php if(get_the_time('Y/m/d') != get_the_modified_date('Y/m/d')):?>
                <time  class="modified" itemprop="dateModified" datetime="<?php the_modified_date('Y-m-d'); ?>"><?php the_modified_date('Y年m年d日'); ?></time>
                <?php endif;?>
                <time class="post" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m年d日'); ?></time>
              </div>
            </div>
            <h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></span></h2>
             <p class="excerpt"><?= get_the_excerpt(); ?></p>
          </div>
        </div>
    </article>
<?php endwhile; endif; ?>
