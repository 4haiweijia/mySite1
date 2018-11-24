<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>Title from header.php</title>
    <?php wp_head(); ?>
  </head>

  <?php 
  if (is_front_page()) :
   $mytheme_classes = array('mytheme-class1', 'mytheme-class2');
  else :
   $mytheme_classes = array('no-mytheme-class');
  endif; ?>

  <body <?php body_class($mytheme_classes); ?>>
  
    <!-- Define a bootstrap navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="container-fluid">

        <!-- Title of the nav bar is linked to home page -->
        <div class="navbar-header"> 
        <a class="navbar-brand" href="home">mySite1</a>
        </div>                    

        <!-- List includes buttons for the pages -->
        <ul class="navbar-nav">
          <li class="nav-item active"><a class="nav-link"href="home">Home</a></li>
          <li class="nav-item active"><a class="nav-link"href="blogs">Blogs</a></li>
          <li class="nav-item active"><a class="nav-link"href="about-us">About us</a></li>
          <li class="nav-item active"><a class="nav-link"href="contact">Contact</a></li>
        </ul>

      </div>  

    </nav>
    
    <!--Display a search form here -->
    <div class="search-form-container">
      <?php get_search_form(); ?>
    </div>

    <!-- The header image of the whole theme, set wp-login.php->Appearance->Header -->
    <!-- Display original size -->
    <!--
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /> -->

    <!-- Display fixed 200x200 size -->
    <img src="<?php header_image(); ?>" height="200" width="200" alt="" />  

 