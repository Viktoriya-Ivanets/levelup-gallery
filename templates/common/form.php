    <form action="functions/process_form.php" method="POST" enctype="multipart/form-data" novalidate>
        <label for="file">Upload one or more photo to gallery</label>
        <div class="form-row">
            <input type="file" name="file" accept="image/*" id="file" required>
            <button type="submit">Upload</button>
        </div>
    </form>
