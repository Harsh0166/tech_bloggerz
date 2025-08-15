<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Blog</title>
    <link rel="stylesheet" href="../../css/admin_style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
<header class="topbar">
    <button class="menu-toggle" id="menuToggle">☰</button>
  <div class="logo">
    <img src="../../img/logo.png" alt="Logo" style="width: 130px;">
  </div></header>

<aside class="sidebar" id="sidebar">
    <h2>Menu</h2>
    <ul>
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
    </ul>
</aside>

<main class="content">
    <h2>Dashboard</h2><br>
    <div class="stats">
        <div class="card">
            <h3>Total Posts</h3>
            <p>120</p>
        </div>
        <div class="card">
            <h3>Comments</h3>
            <p>350</p>
        </div>
        <div class="card">
            <h3>Users</h3>
            <p>15</p>
        </div>
        <div class="card">
            <h3>Categories</h3>
            <p>8</p>
        </div>
    </div>
</main>
</body>
<script>document.getElementById("menuToggle").addEventListener("click", function() {
    document.getElementById("sidebar").classList.toggle("active");
});
</script>
</html>
