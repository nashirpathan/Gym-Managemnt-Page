<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100">
    <div class="container text-center">
        <h2 class="section-title">Our Expert Trainers</h2>
        <p class="text-secondary mb-5">Our certified professionals are here to guide you on your fitness journey.</p>
        
        <div class="row g-4 mt-2">
            <?php
            $trainers_query = "SELECT * FROM trainers";
            $trainers_result = mysqli_query($conn, $trainers_query);
            while($trainer = mysqli_fetch_assoc($trainers_result)) {
            ?>
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <img src="uploads/<?php echo $trainer['image']; ?>" class="card-img-top trainer-img" alt="<?php echo $trainer['name']; ?>" onerror="this.src='https://images.unsplash.com/photo-1567013127542-490d757e51fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80'">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-1"><?php echo $trainer['name']; ?></h4>
                        <p class="text-danger fw-semibold mb-3"><?php echo $trainer['specialization']; ?></p>
                        <p class="text-secondary small mb-4">Experience: <?php echo $trainer['experience']; ?></p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-white"><i class="fab fa-instagram fs-5"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-facebook fs-5"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-twitter fs-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
