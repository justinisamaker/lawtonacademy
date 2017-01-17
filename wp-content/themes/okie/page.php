<!-- ==========================
  DEFAULT PAGE
=========================== -->

<?php get_header(); ?>
    
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section id="default-page">
        
      <h1><?php the_title(); ?></h1>

      <div class="content-container">
        <?php the_content(); ?>
      </div>

    </section>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
    
<?php get_footer(); ?>