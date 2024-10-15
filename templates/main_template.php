<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="node_modules/photoswipe/dist/photoswipe.css">
</head>

<body>
    <!-- PhotoSwipe layout HTML structure -->
    <div class="gallery-container">
        <h1>Photo Gallery</h1>
        <?php include_once('layouts/grid_layout.php'); ?>
    </div>
    <!-- PhotoSwipe slider HTML structure -->
    <?php include_once('common/slider.php'); ?>
    <script src="node_modules/photoswipe/dist/photoswipe-lightbox.esm.js" type="module"></script>
    <script src="assets/js/photoswipe-init.js" type="module"></script>
</body>

</html>
