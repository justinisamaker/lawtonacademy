<!-- ==========================
  DEFAULT PAGE
=========================== -->

<?php get_header(); ?>
    
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main id="internal-main">
      <header>
        <h1><?php the_title(); ?></h1>
      </header>

      <section>
        <?php the_content(); ?>

        <?php while(has_sub_field("internal_flex_content")): ?>
          <?php if(get_row_layout() == "internal_paragraph_no_picture"): ?>
            <div class="internal-row">
              <h6><?php the_sub_field("internal_paragraph_header");?></h6>
              <p><?php the_sub_field("internal_paragraph");?></p>
            </div>

            <?php elseif(get_row_layout() == "internal_paragraph_subheader"):?>
              <div class="internal-row">
                <h5><?php the_sub_field("internal_paragraph_subhead");?></h5>
              </div>

            <?php elseif(get_row_layout() == "internal_paragraph_left_picture"):?>
              <div class="internal-row internal-paragraph-left-picture">
                <div class="left">
                  <img src="<?php the_sub_field('internal_paragraph_left_pic');?>" width="100%" border="0" ?>
                </div>
                <div class="right">
                  <h6><?php the_sub_field("internal_paragraph_left_header");?></h6>
                  <p><?php the_sub_field("internal_paragraph_left_para");?></p>
                </div>
              </div>

            <?php elseif(get_row_layout() == "internal_paragraph_right_picture"):?>
              <div class="internal-row internal-paragraph-right-picture">
                <div class="left">
                  <h6><?php the_sub_field("internal_paragraph_right_header");?></h6>
                  <p><?php the_sub_field("internal_paragraph_right_para");?></p>
                </div>
                <div class="right">
                  <img src="<?php the_sub_field('internal_paragraph_right_pic');?>" width="100%" border="0" ?>
                </div>
              </div>

            <?php elseif(get_row_layout() == "internal_paragraph_no_header"):?>
              <div class="internal-row">
                <p><?php the_sub_field("internal_para_no_header");?></p>
              </div>

            <?php elseif(get_row_layout() == "internal_paragraph_linkfarm"):?>
              <div class="internal-row linkfarm">
                <h4><?php the_sub_field("linkfarm_title");?></h4>
                <?php while(has_sub_field("linkfarm_repeater")):?>
                  <a href="<?php the_sub_field('link_target'); ?>" class="linkfarm-link">
                    <div class="linkfarm-link-box">
                      <?php the_sub_field("link_title");?>
                    </div>
                  </a>
                <?php endwhile;?>
              </div>

            <?php elseif(get_row_layout() == "anchor"):?>
              <a name="<?php the_sub_field('page_anchor');?>"></a>

            <?php elseif(get_row_layout() == "html"):?>
              <div class="internal-row">
                <p><?php the_sub_field("html_input");?></p>
              </div>

          <?php endif; ?>
        <?php endwhile; ?>
      </section>
    </main>

    <nav id="internal-side-menu">
      <?php
        if($post->post_parent)
        $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
        else
        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
        if ($children) {
      $parent_title = get_the_title($post->post_parent);?>
      <li><a href="<?php echo get_permalink($post->post_parent) ?>"><?php echo $parent_title;?></a></li>
        <?php echo $children; ?>
        <?php } ?>
    </nav>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
    
<?php get_footer(); ?>