  
  <h3> <?php the_title('From content-image.php '); ?> </h3>
  <div class="thumbnail-img"> <?php the_post_thumbnail('thumbnail'); ?> </div>
  <small> Posted on <?php the_date(); ?> at <?php the_time(); ?>, cat <?php the_category(); ?></small>
  <h4> <?php the_content(); ?> </h4>
  <hr>