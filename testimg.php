<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $uploads_dir = 'uploads';
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    $tmp_name = $_FILES['image']['tmp_name'];
    $name = basename($_FILES['image']['name']);
    $target_file = "$uploads_dir/$name";

    if (move_uploaded_file($tmp_name, $target_file)) {
        $uploaded_image = $target_file;
    } else {
        $error = "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Input with Preview</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <div class="image-container">
            <?php if (isset($uploaded_image)): ?>
                <img src="<?php echo $uploaded_image; ?>" alt="Image Preview">
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control-file" name="image" id="imgInput" required>
                <button type="submit" class="btn btn-primary mt-3">Upload Image</button>
            </form>
            <?php if (isset($error)): ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
// Your PHP code here
?>
<?php
echo "Hello, World!";
?>
