<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100">
    <div class="container text-center">
        <h2 class="section-title">Photo Gallery</h2>
        <p class="text-secondary mb-5">Take a look at our world-class facilities and active members.</p>
        
        <div class="row g-4">
            <?php
            $gallery_query = "SELECT * FROM gallery";
            $gallery_result = mysqli_query($conn, $gallery_query);
            if(mysqli_num_rows($gallery_result) > 0) {
                while($item = mysqli_fetch_assoc($gallery_result)) {
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item overflow-hidden rounded shadow">
                    <img src="uploads/<?php echo $item['image']; ?>" class="img-fluid w-100 h-100" style="object-fit: cover; height: 250px;" alt="<?php echo $item['title']; ?>">
                </div>
            </div>
            <?php 
                }
            } else {
                // Dummy images if gallery is empty
                for($i=1; $i<=6; $i++) {
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item overflow-hidden rounded shadow">
                    <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80&sig=<?php echo $i; ?>" class="img-fluid w-100" style="object-fit: cover; height: 250px;" alt="Gym">
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
