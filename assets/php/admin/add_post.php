<?php
include_once("../connection.php");

if(!isset($_SESSION['username'])){
  header("Location: admin_login.php");
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $sub_content = $_POST['sub_content'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $check_category_sql = "SELECT * FROM `category` WHERE `category` = '$category'";
    $check_category_result = mysqli_query($conn,$check_category_sql);
    $count = mysqli_num_rows($check_category_result);

    if($count == 0){
        $add_category_sql = "INSERT INTO `category`(`sno`, `category`) VALUES (NULL,'$category')";
        mysqli_query($conn,$add_category_sql);
    }

    $add_post_sql = "INSERT INTO `add_post`(`sno`, `title`, `category`, `tags`,`sub_content`, `content`, `image`) VALUES (NULL,'$title','$category','$tags','$sub_content','$content','')";
    $add_post_result = mysqli_query($conn,$add_post_sql);
    
    if($add_post_result){
        echo '
        <script>alert("Blog Posted Successfully !")
        window.location.href="add_post.php"</script>
        ';
    }
    else{
        echo '
        <script>alert("Something Went Wrong !")
        window.location.href="add_post.php"</script>
        ';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post - Blog Admin</title>
    <link rel="stylesheet" href="../../css/admin_style.css">
    <script src="assets/js/script.js" defer></script>
</head>

<body>
<header class="topbar">
    <button class="menu-toggle" id="menuToggle">☰</button>
  <div class="logo">
    <img src="../../img/logo.png" alt="Logo" style="width: 130px;">
  </div></header></header>

<aside class="sidebar" id="sidebar">
    <h2>Menu</h2>
    <ul>
        <li><a href="admin_homepage.php">Dashboard</a></li>
        <!-- <li><a href="posts.html">Posts</a></li> -->
        <li><a href="add_post.php" class="active">Add New Post</a></li>
        <!-- <li><a href="categories.html">Categories</a></li>
        <li><a href="comments.html">Comments</a></li>
        <li><a href="users.html">Users</a></li>
        <li><a href="add_user.html">Add New User</a></li>
        <li><a href="media.html">Media Library</a></li>
        <li><a href="settings.html">Settings</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="../index.html">View Site</a></li>
        <li><a href="logout.html">Logout</a></li> -->
    </ul>
</aside>

<main class="content">
    <h2>Add New Post</h2>
    <form class="form-container" action="" method="POST">
        <label>Title:</label>

        <input type="text" placeholder="Enter post title" name="title" required>



        <label>Category:</label>
        <input type="text" placeholder="Enter post category" name="category" required>
        <!-- <select required name="category">
            <option value="">Select Category</option>
            <option value="Technology">Technology</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Business">Business</option>
            <option value="Travel">Travel</option>
        </select> -->

        <label>Tags (comma separated):</label>
        <input type="text" placeholder="e.g. tech, coding, AI" name="tags">

        <label>Sub-Content:</label>
        <input type="text" placeholder="Write your post sub-content here..." name="sub_content">

        <label>Content:</label>
        <textarea rows="8" placeholder="Write your post content here..." name="content" required></textarea>

        <label>Featured Image:</label>
        <input type="file" accept="image/*" name="image" required>

        <!-- <label>Status:</label>
        <select required>
            <option value="Draft">Draft</option>
            <option value="Published">Published</option>
        </select> -->

        <button type="submit" class="btn-submit">Save Post</button>
    </form>
</main>
<script>document.getElementById("menuToggle").addEventListener("click", function() {
    document.getElementById("sidebar").classList.toggle("active");
});
</script>
</body>
</html>
