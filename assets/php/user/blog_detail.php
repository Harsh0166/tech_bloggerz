<?php
include_once("../connection.php");
if(!isset($_SESSION['username'])){
  header("Location: assets/php/user/user_login.php");
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
  $blog_id = $_GET['blog_id'];

  $show_detail_sql = "SELECT * FROM `add_post` WHERE `sno`= '$blog_id'";
  $show_detail_result = mysqli_query($conn,$show_detail_sql);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Detail</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../css/style2.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../js/script.js">

  <style>
    
  </style>
</head>
<body>
 <header class="main-header">
  <div class="logo">
    <img src="../../img/logo.png" alt="Logo">
  </div>

    <form action="search_pg.php" method="GET">
  <div class="search_bar">
    <div class="animated_input fade-in">
      <input type="text" placeholder=" " id="searchInput" name="search" />
      <label for="searchInput" id="animated_placeholder">Search Technology</label>
    </div>
    <button type="submit">Search</button>
  </div>
</form>
</header>

  <nav class="hot_topics">
  <div class="topic_links">
  <?php
    $category_sql = "SELECT * FROM `category`";
    $category_result = mysqli_query($conn,$category_sql);

    while($row = $category_result->fetch_assoc()){
      $category = $row['category'];

      echo '<a href="topic_list.php?category='.$category.'">'.$category.'</a>';
    }
  ?>
  </div>

 <!-- <div class="right_nav">
   

  <div class="dropdown_wrapper">
    <select id="topics" class="topic_dropdown">
      <option value=""> Favorite topic</option>
      <option value="technology">Technology</option>
      <option value="business">Business</option>
      <option value="design">Design</option>
      <option value="health">Health</option>
      <option value="travel">Travel</option>
      <option value="education">Education</option>
    </select>
  </div>
 </div> -->
</nav>

  <div class="detail_container">
    
    <div class="blog_text">
    <?php
      while($row = $show_detail_result-> fetch_assoc()){
        $title = $row['title'];
        $content = $row['content'];
        $datetime = $row['date_time'];
        $category = $row['category'];
        list($date, $time) = explode(" ", $datetime);


        echo ' <h2>'.$title.'</h2>
      <p>'.$content.'</p>
      

          <div class="author_info">
        <h4>Author: Jane Doe</h4>
        <p>Published on: '.$date.'</p>
      </div>';
      }
    ?>

     
  

      <div class="blog_actions">
        <div class="share_icons">
        <a href="https://wa.me/?text=Check%20this%20blog%20out:%20YOUR_BLOG_URL" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_BLOG_URL" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=YOUR_BLOG_URL" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
      </div>
      <a href="/buy-now.html" class="buy_button">Buy Now</a>
      </div>
      

    </div>
<div class="blog_image">
      <img src="https://images.pexels.com/photos/1181263/pexels-photo-1181263.jpeg" alt="AI Future Image">
    </div>
    
  </div>

  <section class="related_posts">
    <h2>Related Posts</h2>
    <section class="grid_posts">

    <?php
      $related_post_sql = "SELECT * FROM `add_post` WHERE `category`= '$category'";
      $related_post_result = mysqli_query($conn,$related_post_sql);

      while($row = $related_post_result->fetch_assoc()){
        $related_title = $row['title'];
        $related_sub_content = $row['sub_content'];
        $related_blog_id = $row['sno'];

        if($related_title != $title){
          echo '<div class="blog_box">
      <img src="https://images.pexels.com/photos/1181263/pexels-photo-1181263.jpeg" alt="Blog Image">
      <div class="content">
        <h3>'.$related_title.'</h3>
        <p>'.$related_sub_content.'</p>
        <a href="blog_detail.php?blog_id='.$related_blog_id.'">Read More</a>
      </div>
    </div>';

      }
        }
        

    ?>
  </section>
  </section>
<footer class="footer">
  <div class="footer_container">
    <div class="footer_section">
  <h3>Quick Links</h3>
  <ul>
    <li><a href="../../../index.php">Home</a></li>
    <li><a href="../../../index.php">Blogs</a></li>
    <li><a href="/about.html">About Us</a></li>
    <li><a href="/contact.html">Contact</a></li>

  </ul>
</div>

    <div class="footer_section">
      <h3>Contact</h3>
      <p>Email: <a href="mailto:example@email.com">example@email.com</a></p>
      <!-- <p>WhatsApp: <a href="https://wa.me/91XXXXXXXXXX" target="_blank">+91 XXXXX-XXXXX</a></p> -->
    </div>

    <div class="footer_section">
      <h3>Follow Us</h3>
      <div class="social_icons">
        <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <!-- <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i></a> -->
        <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>

      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <p>&copy; 2025 Your Blog Name. All rights reserved.</p>
  </div>
</footer>
<script src="../../js/script.js"></script>
</body>
</html>
