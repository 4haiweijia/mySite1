<!-- Below is default page output -->
<?php //get_header('DropDownMenu'); //call header-DropDownMenu.php 
get_header(); //call header.php
?>

<h1>This is from index.php</h1>

<!-- Test out bootstrap rows and cols -->
<div class="container">
  <div class="row">
    <div class="col">col1</div>
    <div class="col">col2</div>
    <div class="col">col3</div>
  </div>
</div>
<hr>

<!-- Container with posts in a col and a sidebar in another col -->
<div class="container">
  <div class="row">

    <!-- Show all posts in one col. Only takes effect if the page has been
    designated in wp-login->Settings->Reading as the "Posts page" -->
    <div class="col">
      <?php
      
      if(have_posts()):
        while(have_posts()):
        the_post(); ?>

        <?php 
        get_template_part('content',get_post_format()); 
        ?>

        <?php 
        endwhile;
      else :
          echo wpautop( 'Sorry, no posts were found!' );  
      endif; ?>
      
    </div>

    <!-- Sidebar in the next col, calls sidebar.php -->
    <div class="col">
      <?php get_sidebar(); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>