<form action="functions/process_form.php" method="POST" enctype="multipart/form-data" novalidate>
    <label for="file">Upload one or more photos to gallery</label>
    <div class="form-row">
        <input type="file" name="file[]" accept="image/*" id="file" required multiple>
        <button type="submit">Upload</button>
    </div>
</form>

<?php if (!empty($errors)): ?>
    <div class="error-messages">
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
