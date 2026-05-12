<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';

$success_msg = "";
$error_msg = "";

if (isset($_POST['submit_inquiry'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $selected_plan = mysqli_real_escape_string($conn, $_POST['selected_plan']);
    $fitness_goal = mysqli_real_escape_string($conn, $_POST['fitness_goal']);
    $preferred_timing = mysqli_real_escape_string($conn, $_POST['preferred_timing']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO membership_inquiries (full_name, mobile, email, age, gender, weight, height, selected_plan, fitness_goal, preferred_timing, address, message) 
              VALUES ('$full_name', '$mobile', '$email', '$age', '$gender', '$weight', '$height', '$selected_plan', '$fitness_goal', '$preferred_timing', '$address', '$message')";

    if (mysqli_query($conn, $query)) {
        $success_msg = "Thank you for registering with our gym. Our team will contact you soon.";
    } else {
        $error_msg = "Something went wrong. Please try again.";
    }
}

$pre_selected_plan = isset($_GET['plan']) ? $_GET['plan'] : '';
?>

<section class="section-padding bg-black">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4 p-md-5">
                    <h2 class="section-title text-center">Membership Inquiry</h2>
                    <p class="text-center text-secondary mb-5">Fill the form below to start your fitness journey.</p>

                    <?php if($success_msg): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success_msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($error_msg): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $error_msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" placeholder="Age" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Weight (kg)</label>
                                <input type="number" step="0.1" name="weight" class="form-control" placeholder="Weight">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" step="0.1" name="height" class="form-control" placeholder="Height">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Membership Plan</label>
                                <select name="selected_plan" class="form-select" required>
                                    <option value="">Choose a plan</option>
                                    <?php
                                    $plans_query = "SELECT plan_name FROM membership_plans";
                                    $plans_result = mysqli_query($conn, $plans_query);
                                    while($plan = mysqli_fetch_assoc($plans_result)) {
                                        $selected = ($plan['plan_name'] == $pre_selected_plan) ? 'selected' : '';
                                        echo "<option value='".$plan['plan_name']."' $selected>".$plan['plan_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fitness Goal</label>
                                <select name="fitness_goal" class="form-select" required>
                                    <option value="">Select goal</option>
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Muscle Gain">Muscle Gain</option>
                                    <option value="General Fitness">General Fitness</option>
                                    <option value="Strength Training">Strength Training</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preferred Timing</label>
                                <select name="preferred_timing" class="form-select" required>
                                    <option value="">Select batch</option>
                                    <option value="Morning Batch">Morning Batch (6 AM - 11 AM)</option>
                                    <option value="Evening Batch">Evening Batch (4 PM - 10 PM)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="2" placeholder="Enter your full address" required></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Additional Message (Optional)</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Any specific requirements?"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit_inquiry" class="btn btn-danger btn-lg px-5">Submit Inquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
