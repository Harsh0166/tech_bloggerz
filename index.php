<?php
include_once("assets/php/connection.php");

if(!isset($_SESSION['username'])){
  header("Location: assets/php/user/user_login.php");
}

$show_post_sql = "SELECT * FROM `add_post`";
$show_post_result = mysqli_query($conn,$show_post_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Blog</title>
  <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 <header class="main-header">
  <div class="logo">
    <img src="assets/img/logo.png" alt="Logo">
  </div>


    <form action="assets/php/user/search_pg.php" method="GET">
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

      echo '<a href="assets/php/user/topic_list.php?category='.$category.'">'.$category.'</a>';
    }
  ?>
  </div>

 <!-- <div class="right_nav"> -->
   

  <!-- <div class="dropdown_wrapper">
    <select id="topics" class="topic_dropdown">
      <option value=""> Favorite topic</option>
      <option value="technology">Technology</option>
      <option value="business">Business</option>
      <option value="design">Design</option>
      <option value="health">Health</option>
      <option value="travel">Travel</option>
      <option value="education">Education</option>
    </select>
  </div> -->
 <!-- </div> -->
</nav>
  <section class="grid_posts">

<?php
  while($row = $show_post_result->fetch_assoc()){
    $title = $row['title'];
    $sub_content = $row['sub_content'];
    $image = $row['image'];
    $blog_id = $row['sno'];

    echo '
  <div class="blog_box">
      <img src="https://images.pexels.com/photos/1181263/pexels-photo-1181263.jpeg" alt="Blog Image">
      <div class="content">
        <h3>'.$title.'</h3>
        <p>'.$sub_content.'</p>
        <a href="assets/php/user/blog_detail.php?blog_id='.$blog_id.'">Read  More</a>
      </div>
    </div>';
  }

?>
    
  </section>

  <footer class="footer">
  <div class="footer_container">
    <div class="footer_section">
  <h3>Quick Links</h3>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="/index.php">Blogs</a></li>
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
<script src="assets/js/script.js"></script>
</body>
</html>
