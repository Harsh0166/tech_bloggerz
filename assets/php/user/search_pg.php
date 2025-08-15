<?php
include_once("../connection.php");

if(!isset($_SESSION['username'])){
  header("Location: user_login.php");
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
//   $category = $_GET['category'];
  $search = $_GET['search'];

$search_sql = "SELECT * FROM add_post WHERE title LIKE '%$search%' OR sub_content LIKE '%$search%' OR tags LIKE '%$search%' OR category LIKE '%$search%' OR content LIKE '%$search%'";
$search_result = mysqli_query($conn, $search_sql);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Blog</title>
  <link rel="stylesheet" href="../../css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      $categories = $row['category'];

      echo '<a href="topic_list.php?category='.$categories.'">'.$categories.'</a>';
    }
  ?>
  </div>

</nav><?php

echo '<br><h2>Showing results for "'.$search.'"</h2>
  <section class="grid_posts">';



  while($row = $search_result->fetch_assoc()){
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
        <a href="blog_detail.php?blog_id='.$blog_id.'">Read  More</a>
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
