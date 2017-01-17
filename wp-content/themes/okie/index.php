<?php get_header(); ?>
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="content-container">
        <div class="inner">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>
    </div><!--End content-container-->
    
    <?php endwhile; else : ?>
    	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    
<?php get_footer(); ?>