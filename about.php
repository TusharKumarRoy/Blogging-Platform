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

    <div class="contact-cta" aria-labelledby="contact-heading">
      <h3 id="contact-heading">Contribute</h3>
      <p>Interested in writing for the blog? Email <a href="mailto:hello@example.com">hello@example.com</a></p>
    </div>
  </section>
</main>

<style>
/* about.css — scoped styles for About page */

/* Theme tokens (override or use values from style.css if present) */
:root {
  --bg: #f5f7fa;
  --card-bg: #ffffff;
  --muted: #666;
  --text: #222;
  --accent: #ff9800;
  --radius: 12px;
  --space-sm: 0.75rem;
  --space-md: 1.5rem;
  --space-lg: 2.5rem;
}

/* Page root */
.about-page {
  background: transparent; /* leave page background to global style */
  color: var(--text);
  padding: var(--space-lg) 1rem;
  min-height: 60vh;
}

/* HERO */
.about-page .hero {
  text-align: center;
  padding: var(--space-lg) var(--space-md);
  border-radius: calc(var(--radius) - 2px);
  background: linear-gradient(90deg, rgba(17,17,17,0.95), rgba(51,51,51,0.95));
  color: #fff;
  margin-bottom: var(--space-lg);
}
.about-page .hero h1 {
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  line-height: 1.08;
  margin-bottom: 0.5rem;
}
.about-page .hero p {
  color: #e6e6e6;
  margin: 0 auto;
  max-width: 900px;
  font-size: 1.05rem;
}

/* MAIN SECTIONS (Story / Mission) */
.about-page .container {
  max-width: 1100px;
  margin: 0 auto;
}
.about-page .about-section,
.about-page .mission {
  background: var(--card-bg);
  border-radius: var(--radius);
  padding: var(--space-md);
  box-shadow: 0 6px 18px rgba(14, 20, 25, 0.06);
  margin-bottom: var(--space-md);
}
.about-page h2, 
.about-page h3 {
  color: var(--text);
  margin: 0 0 0.5rem 0;
  font-weight: 600;
}
.about-page p {
  color: var(--muted);
  line-height: 1.6;
  margin: 0.5rem 0 0;
}

/* TEAM GRID */
.about-page .team {
  margin-top: var(--space-md);
}
.about-page .team-grid {
  display: grid;
  gap: 1rem;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  margin-top: 1rem;
}
.about-page .team-card {
  background: var(--card-bg);
  padding: 1rem;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 6px 14px rgba(0,0,0,0.06);
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 220px;
}
.about-page .team-card img {
  width: 88px;
  height: 88px;
  border-radius: 50%;
  object-fit: cover;
  display: block;
  margin-bottom: 0.6rem;
  background: #eee; /* shows if image missing */
}
.about-page .team-card h4 { margin: 0.25rem 0; font-size: 1rem; color: var(--text); }
.about-page .team-card p.role { color: var(--muted); font-size: 0.9rem; margin: .25rem 0; }
.about-page .team-card p.bio { margin-top: 0.5rem; color: var(--muted); font-size: 0.9rem; }

/* CONTACT / CTA */
.about-page .contact-cta {
  margin-top: var(--space-md);
  padding: var(--space-md);
  background: #fff8f2;
  border-radius: 10px;
  border: 1px solid rgba(255,152,0,0.08);
}
.about-page .contact-cta a,
.about-page .contact-cta .btn {
  color: var(--accent);
  font-weight: 600;
  text-decoration: none;
}

/* Focus accessibility */
.about-page a:focus,
.about-page button:focus {
  outline: 3px solid rgba(255,152,0,0.18);
  outline-offset: 3px;
  border-radius: 6px;
}

/* Small screens: tighten spacing */
@media (max-width: 480px) {
  .about-page { padding: 1rem 0.75rem; }
  .about-page .hero { padding: 1.25rem; }
  .about-page .team-card { min-height: 200px; padding: 0.85rem; }
}
</style>

</body>
</html>