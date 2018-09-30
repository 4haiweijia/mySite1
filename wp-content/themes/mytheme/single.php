<!-- Below is page layout to show single posts -->
<?php get_header(); //call header.php ?>

<h1>This is from single.php</h1>

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

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <!-- Show post title, posted time, category -->			
          <div class="entry-header">
            <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
            <small>Posted on: 
            <?php the_time('F j, Y'); ?> at 
            <?php the_time('g:i a'); ?> in 
            <?php the_category(' '); ?> || 
            <?php the_tags(); ?>||
            <?php edit_post_link('Owner edit link'); ?></small>
          </div>

          <!-- Show post thumbnail -->			
          <?php if( has_post_thumbnail() ): ?>
              <div class='float-right'><?php the_post_thumbnail('thumbnail'); ?></div>
          <?php endif; ?>

          <!-- Show post content -->
          <?php  the_content(); ?>

          <hr>

          <!-- Show the comment input panel, the comments are allowed for the post -->
          <?php 
          if(comments_open()) {comments_template();} 
          else{ echo('<h5 class = "text-center">Sorry comments closed!</h5>'); }?>

          </article>

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