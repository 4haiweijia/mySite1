<?php get_header(); ?>
<h1>This is from page-home.php</h1>


<div class="row"> <!-- start row 1 -->

  <?php //Display the first post of each of the three categories
  //Since home page is not the designated page to show posts, must
  //do the wp_query() explicitly and get the posts.    
  //Defined the names of the included categories, not case sensitive
  $cat_args = array(
    'name'=>array('News','tutorials','Reviews')
  );

  $categories = get_categories($cat_args);//Retrieve the three category objects

  foreach ($categories as $category) {
      //Overload the wp_query with a new function, which gets the last post in the category
    $lastBlog = new WP_Query($args = array(
      'type' => 'post',
      'posts_per_page'=>1, 
      'category__in'=> $category->term_id));

    if($lastBlog->have_posts()): ?>

      <?php  
      while($lastBlog->have_posts()):
      $lastBlog->the_post(); ?>

        <div class='col'> <!-- each post in a col -->
          <?php 
          get_template_part('content','featured');//content-featured.php is used.
          ?>
        </div>
      <?php 
      endwhile; ?>
      
    <?php  
    endif;
    wp_reset_postdata(); //Always reset after overloading the WP_Query
    
  } ?>

</div> <!-- end row 1 -->

 <!-- calls sidebar.php -->
<?php get_sidebar(); ?>
<hr>

<?php
  /* 
  //Get all the posts of category tutorials
  $lastBlog = new WP_Query($arg = array(
  'type' => 'post',
  'posts_per_page'=>-1,
  'category_name'=>'tutorials'));

  //$lastBlog = new WP_Query('type=post&posts_per_page=-1&category_name=tutorials');

  if($lastBlog->have_posts()):
    while($lastBlog->have_posts()):
    $lastBlog->the_post(); 

      get_template_part('content',get_post_format());
    
    endwhile;
  endif;
  wp_reset_postdata(); //Always reset after overloading the WP_Query
  */
  ?>
 


<?php get_footer(); ?>