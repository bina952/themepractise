<?php 
get_header();
sagartask_banner(); 
?>
<br>
<?php sagartask_post(); ?>
<br>
<div class="row mb-2">
<?php if(have_posts()){
      while(have_posts()){
          the_post();
?> 
       
<div class="col-md-6">
     
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary"> <?php sagartask_categories_list(); ?></strong>
       
        <h3 class="mb-0"><?php the_title();?></h3>
        <div class="mb-1 text-muted"><?php the_time('F j, Y'); ?></div>
        <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
        <?php sagartask_postbox();?>
      </div>
      <div class="binu-image col-auto d-none d-lg-block">
        
        <?php 
          if(has_post_thumbnail()){
            the_post_thumbnail('binu_image');
          }
        ?>

      </div>
    </div>
    </div>
    <?php
}
}?>

<?php
$args = array(  
        'post_type' => 'student',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
      );

    $student = new WP_Query( $args ); 
        
   if($student-> have_posts()){
    while($student-> have_posts()){
      $student-> the_post();?>
    
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php the_post_thumbnail_url('full');?>">
  <div class="card-body">
    <h5 class="card-title"><?php the_title();?></h5>
    <p class="card-text"><?php the_excerpt();?></p>
    <a href="<?php the_permalink();?>" class="btn btn-primary">Go somewhere</a>
    
    <span>location</span>

    <?php $hello = get_the_terms( get_the_ID(), 'places');
    foreach($hello as $value){?>
    <span>
      <?php if($value->name) echo esc_html($value->name);
      
      ?>
    </span>
    <?php
      
    }
    ?>
   
  </div>
</div>
<?php
  }
}

get_footer();