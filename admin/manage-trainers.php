<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

$msg = "";

// Handle Add/Edit
if (isset($_POST['save_trainer'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $id = $_POST['trainer_id'];

    $image = $_POST['existing_image'];
    if ($_FILES['image']['name']) {
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
    }

    if ($id) {
        $query = "UPDATE trainers SET name='$name', specialization='$specialization', experience='$experience', image='$image' WHERE id=$id";
    } else {
        $query = "INSERT INTO trainers (name, specialization, experience, image) VALUES ('$name', '$specialization', '$experience', '$image')";
    }

    if (mysqli_query($conn, $query)) {
        $msg = "Trainer saved successfully.";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM trainers WHERE id = $id");
    header("Location: manage-trainers.php");
}

$trainers = mysqli_query($conn, "SELECT * FROM trainers");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Manage Trainers</h4>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#trainerModal" onclick="resetForm()">Add New Trainer</button>
</div>

<?php if($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-dark table-hover mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Experience</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($trainers)) { ?>
                <tr>
                    <td><img src="../uploads/<?php echo $row['image']; ?>" width="50" height="50" class="rounded-circle" style="object-fit: cover;" onerror="this.src='https://via.placeholder.com/50'"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['specialization']; ?></td>
                    <td><?php echo $row['experience']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-outline-info" onclick="editTrainer(<?php echo htmlspecialchars(json_encode($row)); ?>)"><i class="fas fa-edit"></i></button>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Trainer Modal -->
<div class="modal fade" id="trainerModal" tabindex="-1">
    <div class="modal-dialog modal-dark">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="modalTitle">Add Trainer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="trainer_id" id="trainer_id">
                    <input type="hidden" name="existing_image" id="existing_image">
                    <div class="mb-3 text-center" id="imagePreviewContainer">
                        <img id="imagePreview" src="" width="100" height="100" class="rounded-circle mb-2" style="object-fit: cover; display: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" id="specialization" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Experience</label>
                        <input type="text" name="experience" id="experience" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trainer Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="save_trainer" class="btn btn-danger">Save Trainer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('trainer_id').value = '';
    document.getElementById('existing_image').value = 'default-trainer.jpg';
    document.getElementById('name').value = '';
    document.getElementById('specialization').value = '';
    document.getElementById('experience').value = '';
    document.getElementById('imagePreview').style.display = 'none';
    document.getElementById('modalTitle').innerText = 'Add Trainer';
}

function editTrainer(trainer) {
    document.getElementById('trainer_id').value = trainer.id;
    document.getElementById('existing_image').value = trainer.image;
    document.getElementById('name').value = trainer.name;
    document.getElementById('specialization').value = trainer.specialization;
    document.getElementById('experience').value = trainer.experience;
    document.getElementById('imagePreview').src = '../uploads/' + trainer.image;
    document.getElementById('imagePreview').style.display = 'inline-block';
    document.getElementById('modalTitle').innerText = 'Edit Trainer';
    new bootstrap.Modal(document.getElementById('trainerModal')).show();
}
</script>

<?php include 'includes/footer.php'; ?>
