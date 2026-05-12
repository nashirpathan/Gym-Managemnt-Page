<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

$msg = "";

// Handle Add/Edit
if (isset($_POST['save_plan'])) {
    $plan_name = mysqli_real_escape_string($conn, $_POST['plan_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $features = mysqli_real_escape_string($conn, $_POST['features']);
    $id = $_POST['plan_id'];

    if ($id) {
        $query = "UPDATE membership_plans SET plan_name='$plan_name', price='$price', duration='$duration', features='$features' WHERE id=$id";
    } else {
        $query = "INSERT INTO membership_plans (plan_name, price, duration, features) VALUES ('$plan_name', '$price', '$duration', '$features')";
    }

    if (mysqli_query($conn, $query)) {
        $msg = "Plan saved successfully.";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM membership_plans WHERE id = $id");
    header("Location: manage-plans.php");
}

$plans = mysqli_query($conn, "SELECT * FROM membership_plans");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Manage Membership Plans</h4>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#planModal" onclick="resetForm()">Add New Plan</button>
</div>

<?php if($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-dark table-hover mb-0">
            <thead>
                <tr>
                    <th>Plan Name</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Features</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($plans)) { ?>
                <tr>
                    <td><?php echo $row['plan_name']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td><small class="text-secondary"><?php echo substr($row['features'], 0, 50); ?>...</small></td>
                    <td>
                        <button class="btn btn-sm btn-outline-info" onclick="editPlan(<?php echo htmlspecialchars(json_encode($row)); ?>)"><i class="fas fa-edit"></i></button>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Plan Modal -->
<div class="modal fade" id="planModal" tabindex="-1">
    <div class="modal-dialog modal-dark">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="modalTitle">Add Membership Plan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="plan_id" id="plan_id">
                    <div class="mb-3">
                        <label class="form-label">Plan Name</label>
                        <input type="text" name="plan_name" id="plan_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price (₹)</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control" placeholder="e.g. 1 Month" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Features (Comma separated)</label>
                        <textarea name="features" id="features" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="save_plan" class="btn btn-danger">Save Plan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('plan_id').value = '';
    document.getElementById('plan_name').value = '';
    document.getElementById('price').value = '';
    document.getElementById('duration').value = '';
    document.getElementById('features').value = '';
    document.getElementById('modalTitle').innerText = 'Add Membership Plan';
}

function editPlan(plan) {
    document.getElementById('plan_id').value = plan.id;
    document.getElementById('plan_name').value = plan.plan_name;
    document.getElementById('price').value = plan.price;
    document.getElementById('duration').value = plan.duration;
    document.getElementById('features').value = plan.features;
    document.getElementById('modalTitle').innerText = 'Edit Membership Plan';
    new bootstrap.Modal(document.getElementById('planModal')).show();
}
</script>

<?php include 'includes/footer.php'; ?>
