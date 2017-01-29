<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo get_bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>

	<body>
		<div id="body-container">

			<header id="main-header">
        <a id="site-logo" href="<?php bloginfo('url'); ?>" class="no-link-styles">
          <img src="<?php bloginfo('template_directory'); ?>/dist/img/lawton-academy-logo.svg" alt="Lawton Academy Logo">
        </a>

        <div id="accredidation">
          <a href="http://www.advanc-ed.org/" target="_new">
            <img src="<?php bloginfo('template_directory'); ?>/dist/img/advanced-accred-seal.png" alt="AdvancED Accredited SACS" id="advanced-accred-seal">
          </a>
          <a href="http://osfkids.org/" target="_blank">
            <img src="<?php bloginfo('template_directory'); ?>/dist/img/osf-seal.png" alt="Opportunity Scholarship Fund Oklahoma">
          </a>
        </div>

        <nav id="main-nav">
          <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class'      => 'header-menu' ) ); ?> 
        </nav>
			</header>

      <div id="main-content">