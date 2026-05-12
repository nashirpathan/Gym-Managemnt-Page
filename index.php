<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch Homepage Content
$hero_query = "SELECT * FROM homepage_content WHERE section_name = 'Hero'";
$hero_result = mysqli_query($conn, $hero_query);
$hero_data = mysqli_fetch_assoc($hero_result);
?>

<!-- Hero Section -->
<section class="hero-section text-white">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3"><?php echo $hero_data['title'] ?? 'Transform Your Body, Transform Your Life'; ?></h1>
        <p class="lead mb-5"><?php echo $hero_data['subtitle'] ?? 'Affordable Gym Membership Plans Starting at Just ₹1500'; ?></p>
        <div>
            <a href="inquiry.php" class="btn btn-danger btn-lg me-3 px-4">Join Now</a>
            <a href="register.php" class="btn btn-outline-light btn-lg px-4">Register Today</a>
        </div>
    </div>
</section>

<!-- Membership Plans Section -->
<section class="section-padding bg-black">
    <div class="container text-center">
        <h2 class="section-title">Membership Plans</h2>
        <div class="row g-4 mt-4">
            <?php
            $plans_query = "SELECT * FROM membership_plans";
            $plans_result = mysqli_query($conn, $plans_query);
            while($plan = mysqli_fetch_assoc($plans_result)) {
            ?>
            <div class="col-md-4">
                <div class="card h-100 plan-card">
                    <div class="card-body">
                        <h3 class="fw-bold mb-3"><?php echo $plan['plan_name']; ?></h3>
                        <h2 class="text-danger mb-3">₹<?php echo number_format($plan['price'], 0); ?></h2>
                        <p class="text-secondary mb-4"><?php echo $plan['duration']; ?></p>
                        <hr>
                        <ul class="list-unstyled mb-5 text-start">
                            <?php 
                            $features = explode(',', $plan['features']);
                            foreach($features as $feature) {
                                echo "<li class='mb-2'><i class='fas fa-check text-danger me-2'></i> " . trim($feature) . "</li>";
                            }
                            ?>
                        </ul>
                        <a href="inquiry.php?plan=<?php echo urlencode($plan['plan_name']); ?>" class="btn btn-danger w-100">Select Plan</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section-padding bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="section-title text-start">Why Choose Us?</h2>
                <p class="mb-4">We provide a premium fitness experience with state-of-the-art equipment and professional trainers to help you achieve your goals.</p>
                <div class="d-flex mb-3">
                    <div class="text-danger fs-3 me-3"><i class="fas fa-dumbbell"></i></div>
                    <div>
                        <h5 class="fw-bold">Modern Equipment</h5>
                        <p class="text-secondary">High-quality machines for all your strength and cardio needs.</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="text-danger fs-3 me-3"><i class="fas fa-user-tie"></i></div>
                    <div>
                        <h5 class="fw-bold">Expert Trainers</h5>
                        <p class="text-secondary">Certified professionals to guide you through every workout.</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="text-danger fs-3 me-3"><i class="fas fa-clock"></i></div>
                    <div>
                        <h5 class="fw-bold">Flexible Timings</h5>
                        <p class="text-secondary">Open morning and evening to fit your busy schedule.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/images/about-img.jpg" alt="Gym" class="img-fluid rounded shadow" onerror="this.src='https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'">
            </div>
        </div>
    </div>
</section>

<!-- Trainers Section -->
<section class="section-padding bg-black">
    <div class="container text-center">
        <h2 class="section-title">Our Expert Trainers</h2>
        <div class="row g-4 mt-4">
            <?php
            $trainers_query = "SELECT * FROM trainers LIMIT 3";
            $trainers_result = mysqli_query($conn, $trainers_query);
            while($trainer = mysqli_fetch_assoc($trainers_result)) {
            ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="uploads/<?php echo $trainer['image']; ?>" class="card-img-top trainer-img" alt="<?php echo $trainer['name']; ?>" onerror="this.src='https://images.unsplash.com/photo-1567013127542-490d757e51fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80'">
                    <div class="card-body">
                        <h5 class="fw-bold"><?php echo $trainer['name']; ?></h5>
                        <p class="text-danger mb-2"><?php echo $trainer['specialization']; ?></p>
                        <p class="text-secondary small">Experience: <?php echo $trainer['experience']; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section-padding bg-dark">
    <div class="container text-center">
        <h2 class="section-title">What Our Members Say</h2>
        <div class="row g-4 mt-4">
            <?php
            $testimonials_query = "SELECT * FROM testimonials";
            $testimonials_result = mysqli_query($conn, $testimonials_query);
            while($testimonial = mysqli_fetch_assoc($testimonials_result)) {
            ?>
            <div class="col-md-6">
                <div class="card testimonial-card text-start">
                    <div class="card-body">
                        <p class="mb-4 italic">"<?php echo $testimonial['feedback']; ?>"</p>
                        <h6 class="fw-bold text-danger">— <?php echo $testimonial['name']; ?></h6>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Inquiry CTA Section -->
<section class="section-padding bg-danger text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Start Your Fitness Journey?</h2>
        <p class="lead mb-4">Join today and get a free consultation with our expert trainers.</p>
        <a href="inquiry.php" class="btn btn-dark btn-lg px-5">Get Started Now</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
