<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

$msg = "";

// Handle Update
if (isset($_POST['update_hero'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    
    $query = "UPDATE homepage_content SET title='$title', subtitle='$subtitle' WHERE section_name='Hero'";
    if (mysqli_query($conn, $query)) {
        $msg = "Hero content updated successfully.";
    }
}

$hero = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM homepage_content WHERE section_name='Hero'"));
?>

<div class="mb-4">
    <h4 class="fw-bold">Manage Homepage Content</h4>
</div>

<?php if($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <div class="card p-4">
            <h5 class="fw-bold mb-4">Hero Section</h5>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Hero Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $hero['title']; ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Hero Subtitle</label>
                    <textarea name="subtitle" class="form-control" rows="3" required><?php echo $hero['subtitle']; ?></textarea>
                </div>
                <button type="submit" name="update_hero" class="btn btn-danger">Update Hero Section</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
