<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';

$error_msg = "";
$success_msg = "";

if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error_msg = "Email already registered.";
    } else {
        $query = "INSERT INTO users (full_name, email, mobile, password) VALUES ('$full_name', '$email', '$mobile', '$password')";
        if (mysqli_query($conn, $query)) {
            $success_msg = "Registration successful. <a href='login.php' class='text-white'>Login here</a>";
        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<section class="section-padding bg-black min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="section-title text-center">User Registration</h2>
                    
                    <?php if($error_msg): ?>
                        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                    <?php endif; ?>

                    <?php if($success_msg): ?>
                        <div class="alert alert-success"><?php echo $success_msg; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile number" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-danger w-100 py-2 mb-3">Register</button>
                        <p class="text-center text-secondary">Already have an account? <a href="login.php" class="text-danger">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
