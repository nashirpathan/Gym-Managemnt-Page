<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

// Fetch stats
$inq_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM membership_inquiries"))['total'];
$plan_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM membership_plans"))['total'];
$trainer_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM trainers"))['total'];
$user_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
?>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h1 class="text-danger fw-bold"><?php echo $inq_count; ?></h1>
            <p class="text-secondary mb-0">Total Inquiries</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h1 class="text-danger fw-bold"><?php echo $plan_count; ?></h1>
            <p class="text-secondary mb-0">Active Plans</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h1 class="text-danger fw-bold"><?php echo $trainer_count; ?></h1>
            <p class="text-secondary mb-0">Our Trainers</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h1 class="text-danger fw-bold"><?php echo $user_count; ?></h1>
            <p class="text-secondary mb-0">Registered Users</p>
        </div>
    </div>
</div>

<div class="mt-5">
    <h4 class="fw-bold mb-4">Recent Inquiries</h4>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Plan</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $recent_inq = mysqli_query($conn, "SELECT * FROM membership_inquiries ORDER BY created_at DESC LIMIT 5");
                    while($row = mysqli_fetch_assoc($recent_inq)) {
                    ?>
                    <tr>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['selected_plan']; ?></td>
                        <td><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
                        <td><span class="badge bg-danger"><?php echo $row['status']; ?></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
