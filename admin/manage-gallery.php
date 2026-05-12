<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

$msg = "";

// Handle Upload
if (isset($_POST['upload_image'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    
    if ($_FILES['image']['name']) {
        $image = time() . '_' . $_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image)) {
            $query = "INSERT INTO gallery (title, image) VALUES ('$title', '$image')";
            if (mysqli_query($conn, $query)) {
                $msg = "Image uploaded successfully.";
            }
        }
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $img_query = mysqli_query($conn, "SELECT image FROM gallery WHERE id = $id");
    $img_data = mysqli_fetch_assoc($img_query);
    if ($img_data) {
        unlink('../uploads/' . $img_data['image']);
        mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
    }
    header("Location: manage-gallery.php");
}

$gallery = mysqli_query($conn, "SELECT * FROM gallery");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Manage Gallery</h4>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#galleryModal">Upload New Image</button>
</div>

<?php if($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="row g-4">
    <?php while($row = mysqli_fetch_assoc($gallery)) { ?>
    <div class="col-md-3">
        <div class="card h-100 bg-dark">
            <img src="../uploads/<?php echo $row['image']; ?>" class="card-img-top" style="height: 150px; object-fit: cover;">
            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                <small class="text-secondary"><?php echo $row['title']; ?></small>
                <a href="?delete=<?php echo $row['id']; ?>" class="text-danger" onclick="return confirm('Delete this image?')"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-dark">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title">Upload Gallery Image</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Image Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Cardio Zone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="upload_image" class="btn btn-danger">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
