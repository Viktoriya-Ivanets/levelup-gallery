<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="lib/photoswipe/photoswipe.css">
</head>

<body>
    <!-- PhotoSwipe layout HTML structure -->
    <div class="gallery-container">
        <?php if (!empty($uploadInfo)): ?>
            <div class="upload-messages">
                <p><?= htmlspecialchars($uploadInfo); ?></p>
            </div>
        <?php endif; ?>
        <h1>Photo Gallery</h1>
        <?php include_once('views/common/form.php'); ?>
        <?php include_once('views/layouts/grid_layout.php'); ?>
    </div>
    <!-- PhotoSwipe slider HTML structure -->
    <?php include_once('views/common/slider.php'); ?>
    <script src="lib/photoswipe/photoswipe-lightbox.esm.js" type="module"></script>
    <script src="assets/js/photoswipe-init.js" type="module"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
