<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM membership_inquiries WHERE id = $id");
    echo "<script>window.location.href='manage-inquiries.php';</script>";
}

// Handle Status Update
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    mysqli_query($conn, "UPDATE membership_inquiries SET status = '$status' WHERE id = $id");
    echo "<script>window.location.href='manage-inquiries.php';</script>";
}

$search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : '';
$query = "SELECT * FROM membership_inquiries";
if ($search) {
    $query .= " WHERE full_name LIKE '%$search%' OR mobile LIKE '%$search%' OR email LIKE '%$search%'";
}
$query .= " ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Manage Inquiries</h4>
    <form action="" method="POST" class="d-flex gap-2">
        <input type="text" name="search" class="form-control" placeholder="Search inquiries..." value="<?php echo $search; ?>">
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-dark table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Plan</th>
                    <th>Goal</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) { 
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td>
                        <small><?php echo $row['mobile']; ?></small><br>
                        <small class="text-secondary"><?php echo $row['email']; ?></small>
                    </td>
                    <td><?php echo $row['selected_plan']; ?></td>
                    <td><?php echo $row['fitness_goal']; ?></td>
                    <td><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-danger dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <?php echo $row['status']; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="?id=<?php echo $row['id']; ?>&status=Pending">Pending</a></li>
                                <li><a class="dropdown-item" href="?id=<?php echo $row['id']; ?>&status=Contacted">Contacted</a></li>
                                <li><a class="dropdown-item" href="?id=<?php echo $row['id']; ?>&status=Joined">Joined</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
