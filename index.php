
<?php
if (!function_exists('esc')) {
    /**
     * Escape output for HTML context.
     *
     * @param mixed $value
     * @return string
     */
    function esc($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}
?>

 <!-- Category Filter -->
    <section class="categories">
        <?php foreach ($categories as $cat):
            $isActive = ($cat === $selected);
            $activeClass = $isActive ? 'active' : '';
            $urlCat = urlencode($cat);
        ?>
            <a
                class="cat-btn <?php echo $activeClass; ?>"
                href="?category=<?php echo $urlCat; ?>"
                role="button"
                data-category="<?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?>"
                <?php echo $isActive ? 'aria-current="true"' : ''; ?>
            >
                <?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php endforeach; ?>
    </section>

     <!-- Blog List -->
    <div class="blog-section">
        <!-- Placeholder for JS-driven dynamic content -->
        <div id="dynamic-content" aria-live="polite"></div>

                <section class="blog-container" id="blog-container">
        <?php if (count($visible) === 0): ?>
            <p class="no-posts">No posts found in this category.</p>
        <?php else: ?>
            <?php foreach ($visible as $post): ?>
                <article class="blog-card">
                    <h2 class="post-title"><?php echo esc($post['title']); ?></h2>
                    <p class="post-meta"><?php echo esc($post['category']); ?> — <?php echo esc($post['date']); ?></p>
                    <p class="post-excerpt"><?php echo esc($post['excerpt']); ?></p>
                    <a class="read-more" href="<?php echo esc($post['link']); ?>">Read more</a>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <!-- Navbar -->
<nav class="navbar">
    <div class="logo">MyPremiumBlog</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">About</a></li>
    </ul>
</nav>
