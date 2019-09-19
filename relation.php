<?php
 include locate_template('variable.php');
 $myposts = get_posts($relationval);
 ?>

<?php if( $myposts ): ?>

<div class="related">
  <h4>関連記事</h4>
  <ul>
    <?php foreach($myposts as $post): setup_postdata($post); ?>
    <li class="relation_box">
      <a href="<?php the_permalink(); ?>">
        <div class="related-thumb">
        <?php if( has_post_thumbnail() ): ?>
        <?= get_the_post_thumbnail($post->ID,[300,300]); ?>
        <?php endif; ?>
        </div>
        <div class="related-title">
           <p><?php the_title(); ?></p>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php wp_reset_postdata(); endif; ?>
