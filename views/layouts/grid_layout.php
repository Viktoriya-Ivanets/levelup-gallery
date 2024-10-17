<div class="gallery-grid" id="gallery-grid">
    <?php foreach ($images as $image): ?>
        <a href="<?= $image['full'] ?>" data-pswp-width="<?= $image['width'] ?>" data-pswp-height="<?= $image['height'] ?>">
            <img src="<?= $image['thumb'] ?>" alt="Gallery image">
        </a>
    <?php endforeach; ?>
</div>
