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

        <!-- List includes the home page button and the dropdown menu button -->
        <ul class="navbar-nav">

          <li class="nav-item active"><a class="nav-link"href="home">Home</a></li>
          
          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Nav menu<span class="caret"></span></a>
          
            <!-- List of the dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="about-us">About us</a></li>
              <li><a href="blogs">Blogs</a></li>
              <li><a href="contact">Contact</a></li>
            </ul>

          </li>

        </ul>

      </div>  

    </nav>
    <!-- The header image of the whole theme, set wp-login.php->Appearance->Header -->
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
 