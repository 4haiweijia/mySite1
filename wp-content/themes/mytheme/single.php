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

          <?php 

          // If the post has a gallery, get all the img urls
          if( $gallery = get_post_gallery(get_the_ID(), false)): //$galleryImgURLs['sr'] element is the array of img urls
            $imgURLs = $gallery['src'];
            $nImgs = count($imgURLs);  
            ?>
            
            <!-- Show imgs in a bootstrap carousel -->  
            <div id="galleryImgs" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <?php for($imgCntr = 0; $imgCntr < $nImgs; $imgCntr++ )
                  {
                    $isActive = ($imgCntr == 0? 'class="active"':''); //1st indicator dot is initially active 
                    ?>
                    <li data-target="#galleryImgs" data-slide-to="<?php echo $imgCntr; ?>" <?php echo $isActive; ?>></li>
                  <?php } ?>
                </ol>
            
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <?php foreach ($imgURLs as $imgURL) {  
                    $isActive = ($imgURL == $imgURLs[0]? 'carousel-item active':'carousel-item'); //1st img is active 
                    ?>

                    <div class= "<?php echo $isActive; ?>" >
                      <img "d-block w-100" height = "300" width = "600" src= "<?php echo $imgURL; ?>" alt="" />
                    </div>
                  <?php } ?>
                </div>
              
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#galleryImgs" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#galleryImgs" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
              
              </div>

          <?php endif; ?>

          <!-- Show post thumbnail -->			
          <?php if( has_post_thumbnail() ): ?>
              <div class='float-right'><?php the_post_thumbnail('thumbnail'); ?></div>
          <?php endif; ?>

          <!-- Show post content -->
          <?php 
          //the_content(); //Default show all content of post.

          $content2 = strip_shortcodes(get_the_content()); //remove the gallery code
          echo $content2; //show only unformatted text.
          ?>

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