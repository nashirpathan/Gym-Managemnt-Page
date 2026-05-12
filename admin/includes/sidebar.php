<div class="col-md-3 col-lg-2 sidebar px-0">
    <div class="p-4 text-center">
        <h4 class="fw-bold text-white"><span class="text-danger">SMART</span> GYM</h4>
        <small class="text-secondary">Admin Panel</small>
    </div>
    <hr class="bg-secondary mx-3">
    <nav class="admin-nav flex-column">
        <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a class="nav-link" href="manage-inquiries.php"><i class="fas fa-envelope me-2"></i> Inquiries</a>
        <a class="nav-link" href="manage-plans.php"><i class="fas fa-list me-2"></i> Manage Plans</a>
        <a class="nav-link" href="manage-trainers.php"><i class="fas fa-users me-2"></i> Manage Trainers</a>
        <a class="nav-link" href="manage-users.php"><i class="fas fa-user-friends me-2"></i> Manage Users</a>
        <a class="nav-link" href="manage-gallery.php"><i class="fas fa-images me-2"></i> Manage Gallery</a>
        <a class="nav-link" href="manage-testimonials.php"><i class="fas fa-comment-dots me-2"></i> Testimonials</a>
        <a class="nav-link" href="manage-homepage.php"><i class="fas fa-home me-2"></i> Homepage Content</a>
        <hr class="bg-secondary mx-3">
        <a class="nav-link text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </nav>
</div>
<div class="col-md-9 col-lg-10 p-4 main-content text-white">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Welcome, <?php echo $_SESSION['admin_name']; ?></h3>
        <div class="text-secondary small"><?php echo date('D, d M Y'); ?></div>
    </div>
