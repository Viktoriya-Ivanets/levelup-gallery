<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="<?= CSS_DIR . 'styles.css'; ?>">
    <link rel="stylesheet" href="<?= PHOTOSWIPE_DIR . 'photoswipe.css'; ?>">
</head>

<body>
    <!-- PhotoSwipe layout HTML structure -->
    <div class="gallery-container">
        <?php if (!empty($uploadInfo)): ?>
            <div class="upload-messages">
                <p><?= htmlspecialchars($uploadInfo); ?></p>
            </div>
        <?php endif; ?>
        <h1><?= SITE_NAME ?></h1>
        <?php include_once(VIEWS_COMMON_DIR . 'form.php'); ?>
        <?php include_once(VIEWS_LAYOUT_DIR . 'grid_layout.php'); ?>
    </div>
    <!-- PhotoSwipe slider HTML structure -->
    <?php include_once(VIEWS_COMMON_DIR . 'slider.php'); ?>
    <script src="<?= PHOTOSWIPE_DIR . 'photoswipe-lightbox.esm.js'; ?>" type="module"></script>
    <script src="<?= JS_DIR . 'photoswipe-init.js'; ?>" type="module"></script>
    <script src="<?= JS_DIR . 'scripts.js'; ?>"></script>
</body>

</html>
