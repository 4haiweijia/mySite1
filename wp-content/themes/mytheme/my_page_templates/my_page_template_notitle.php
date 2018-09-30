<?php /* Template name: my_page_template_notitle */
get_header(); ?>
<h1>This is page-notitle.php</h1>

<?php 
if(have_posts()):
 while(have_posts()):
  the_post(); ?>
  <h4> <?php the_content(); ?> </h4>
  <hr>

 <?php 
 endwhile;
endif;
?>
<?php get_footer(); ?>