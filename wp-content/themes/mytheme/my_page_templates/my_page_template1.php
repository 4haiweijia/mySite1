<?php /* Template name: my_page_template1 */ ?>
<?php get_header(); ?>
<h1>my_page_template1</h1>
<h1>从来的</h1>
<?php 
if(have_posts()):
 while(have_posts()):
  the_post(); ?>

  <h3> <?php the_title(); ?> </h3>
  <h4> <?php the_content(); ?> </h4>
  <hr>

 <?php 
 endwhile;
endif;
?>
<?php get_footer(); ?>