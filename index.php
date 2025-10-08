
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