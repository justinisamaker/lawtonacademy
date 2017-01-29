<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <main id="internal-main">
  	<h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
  </main>

  <?php endwhile;?>
<?php endif; ?>

<?php get_footer(); ?>