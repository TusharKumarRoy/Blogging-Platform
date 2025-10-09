<?php
if (!function_exists('esc')) {
    function esc($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>About — My Premium Blog</title>
  <link rel="stylesheet" href="style.css">
  <!-- optional about styles -->
  <link rel="stylesheet" href="about.css">
</head>
<body>

<nav class="navbar" role="navigation" aria-label="Main">
  <div class="logo">MyPremiumBlog</div>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Categories</a></li>
    <li><a class="active" href="about.php">About</a></li>
  </ul>
</nav>

<section class="hero">
  <h1>About My Premium Blog</h1>
  <p>Learn who we are, what we do, and how we help readers build better things.</p>
</section>