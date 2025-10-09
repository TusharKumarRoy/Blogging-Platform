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
 
<main class="container about-page" id="main-content">
  <section class="about-section" aria-labelledby="about-heading">
    <h2 id="about-heading">Our Story</h2>
    <p>
      We are a small team of Computer Science students collaborating on an ISD Group Project to build an Admin-Managed Blogging Platform. Our goal is to create a clean, user-friendly system for publishing and sharing high-quality articles while keeping blog creation restricted to verified administrators.
    </p>
  </section>

  <section class="mission" aria-labelledby="mission-heading">
    <h3 id="mission-heading">Project Overview</h3>
    <p>
      The Admin-Managed Blogging Platform is a web-based system designed for publishing and sharing articles, where only administrators can create and manage blog posts. General users can browse blogs, read articles, and engage with content through comments. This approach ensures content quality while still encouraging community interaction.
    </p>
  </section>

  <section class="team" aria-labelledby="team-heading">
    <h3 id="team-heading">The Team</h3>
    <div class="team-grid">
      <div class="team-card">
        <img src="assets/team/tushar.jpg" alt="Tushar Kumar Roy" onerror="this.style.display='none'">
        <h4>Tushar Kumar Roy</h4>
        <p class="role">Roll: 2107037 — CSE, KUET</p>
        <p>Team lead; focused on backend logic, data handling, and ensuring the platform is robust and secure.</p>
      </div>

      <div class="team-card">
        <img src="assets/team/armaan.jpg" alt="Armaan Rahman Rafi" onerror="this.style.display='none'">
        <h4>Armaan Rahman Rafi</h4>
        <p class="role">Roll: 2107046 — CSE, KUET</p>
        <p>Integration and testing lead; focuses on functionality, QA, and ensuring the project meets requirements.</p>
      </div>

      <div class="team-card">
        <img src="assets/team/shahriar.jpg" alt="Shahriar Aziz Khan" onerror="this.style.display='none'">
        <h4>Shahriar Aziz Khan</h4>
        <p class="role">Roll: 2107034 — CSE, KUET</p>
        <p>Frontend and UI contributor; works on design, responsive layouts, and improving user experience.</p>
      </div>
    </div>

    <div class="project-vision" style="margin-top:1rem;">
      <p>
        We are collaborating with perseverance and dedication. Our clear vision is to build a platform that helps users discover, read, and engage with quality blog content. By centralizing content creation with admins, we strike a balance between content quality control and community discussion.
      </p>
    </div>
  </section>
</main>