<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sagartask
 * calling the nav
 */

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- <title>Album example · Bootstrap v4.6</title> -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/album/">
    
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container">
<header class="blog-header py-3">
  <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
    <?php 
    $subscribe_title= get_theme_mod('subscribe', 'Subscribe');
    $subscribe_url=   get_theme_mod('subscribe_url');
    ?>

    <?php if($subscribe_title || $subscribe_url ){?>

      <a class="text-muted subscribe" href="<?php echo $subscribe_url;?> "><?php echo $subscribe_title;?> </a>
    <?php
    }
    ?>

    </div>
    <div class="col-4 text-center">
    <?php the_custom_logo(); ?>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="text-muted" href="#" aria-label="Search">
      <?php echo get_search_form(false); ?>
      </a>
      <!-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> -->

      <?php 
      $signup_title=  get_theme_mod('signup_title', 'Signup');
      $signup_url=    get_theme_mod('signup_url');
      ?>

      <?php if($signup_title || $signup_url){ ?>
        <a class="btn btn-sm btn-outline-secondary" href="<?php echo $signup_url;?>"><?php echo $signup_title;?> </a>
      <?php
      }
      ?>
    </div>
  </div>
</header>


<?php if(has_nav_menu('menu-1')){ ?>
  <div class="nav-scroller py-1 mb-2">

<?php 
  wp_nav_menu(
   array(
    'theme_location'=> 'menu-1',
    'menu_id'=> 'primary-menu',
    'menu_class'=> 'nav d-flex justify-content-between'
   )
  );
?>
  </div>
<?php
}
?>
  