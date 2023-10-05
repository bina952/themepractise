<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sagartask
 */

get_header();
?>

          
	<main role="main" class="container">
      <div class="row">
              <div class="col-md-8 blog-main">
                <?php if(have_posts()){
                  while(have_posts()){
                    the_post(); ?>
                 
          
                <div class="blog-post">
                  
                  <h2 class="blog-post-title"><?php the_title();?></h2>
                  <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                  </div>
                   <p class="blog-post-meta"><?php the_time('F j, Y'); ?>by <a href="#"><?php the_author(); ?></a></p>
          
                   <?php the_content(); ?>
                </div><!-- /.blog-post -->
                <?php
                  }
                }
          
               ?>
                <nav class="blog-pagination">
                  <?php previous_post_link('%link', 'Older'); ?>
                  <?php next_post_link('%link', 'Newer'); ?>
                </nav>
                
          
              </div><!-- /.blog-main -->
          
            <aside class="col-md-4 blog-sidebar">
              <?php get_sidebar();?>
            </aside><!-- /.blog-sidebar -->
      </div><!-- /.row -->
  </main>
<?php

get_footer();
