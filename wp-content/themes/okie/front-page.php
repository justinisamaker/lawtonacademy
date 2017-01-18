<!-- ==========================
  FRONT PAGE
=========================== -->

<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="intro">
    <h2><?php the_field("home_headline");?></h2>
    <p><?php the_field("home_intro_paragraph");?></p>
  </div>

  <div id="slideshow">
    <?php do_action('slideshow_deploy', '762'); ?>
  </div> 

  <div id="home-actions">
    <div class="home-action">
      <h4>Accredited by AdvancED</h4>
      <p>Lawton Academy is accredited by North Central Association, Commission on Accreditation and School Improvement (NCA CASI)/AdvancEd which is recognized for accreditation by the Oklahoma State Department of Education.</p>
      <p>We also offer scholarship opportunities through the Opportunity Scholarship Fund, a tax-credit scholarship fund that provides scholarships to Oklahoma K-12 students.</p>
    </div>

    <div id="home-action-apply" class="home-action">
      <a href="/" class="btn">Apply now</a>
    </div>
  </div>

  <div id="news-and-events">
    <div id="upcoming-events">
      <h4>Upcoming Events</h4>
      <ul>
       <?php if(get_field('events_repeater')):?>
          <?php while(has_sub_field('events_repeater')):?>
            <li><em><?php the_sub_field('event_title')?></em> &mdash; <?php the_sub_field('event_date');?></li>
          <?php endwhile;?>
        <?php endif;?>
      </ul>
    </div>

    <div id="school-news">
      <h4>School News</h4>
      <ul>
        <?php if(get_field('in_the_spotlight')):?>
          <?php while(has_sub_field('in_the_spotlight')):?>
            <li>
              <div class="inner-container">
                <p><em><?php the_sub_field("spotlight_name");?></em></p>
                <img src="<?php the_sub_field('spotlight_image');?>" class="spotlight-picture" width='115' height="115" border="0" alt="Featured Students" />
                <p><?php the_sub_field("spotlight_paragraph");?></p>
              </div>
            </li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>

  <div id="school-information">
    <div id="featured-video" class="school-info">
      <h4>Featured Video</h4>
      <?php the_field("featured_video");?>

      <h4>School Handbooks</h4>
      <a href="<?php echo home_url(); ?>/elementary-school-handbook" id="elementary-handbook" class="btn handbook-link">Elementary Handbook</a>
      <a href="<?php echo home_url(); ?>/secondary-handbook" id="secondary-handbook" class="btn handbook-link">Secondary Handbook</a>
    </div>

    <div id="triopinion" class="school-info">
      <h4>TriOpinion</h4>
      <img src="<?php bloginfo('template_directory'); ?>/dist/img/triopinion-logo.png" alt="TriOpinion Logo">
      <p>TriOpinion is a three-generation blog hosted by Mrs. Johnson, Mrs. Smith, and her daughter Bria (a LAAS graduate).  Topics are updated on Sundays and always pertain to some aspect of being/raising gifted kids.  This week's topic: Opportunities.</p>
      <a href="http://www.triopinion.com/blog?ref=lawtonacademy" target="_new" class="btn">Visit TriOpinion.com</a>
    </div>

    <div id="sponsors" class="school-info">
      <h4>Sponsors</h4>
      <p>Thank you to our sponsors for all of their support! Click on an image to visit the sponsor's website.</p>
      <?php do_action('slideshow_deploy', '763'); ?>

      <h4 id="summer-camps-header">Summer Camps</h4>
      <a href="<?php echo home_url(); ?>/summer-camps" class="btn">View Summer Camp sessions</a>
    </div>
  </div>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>