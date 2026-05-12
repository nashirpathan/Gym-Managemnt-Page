<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100">
    <div class="container">
        <h2 class="section-title text-center">Contact Us</h2>
        <p class="text-center text-secondary mb-5">Have questions? We're here to help.</p>
        
        <div class="row g-5">
            <div class="col-md-5">
                <div class="card p-4 h-100">
                    <h4 class="fw-bold mb-4">Get In Touch</h4>
                    <div class="d-flex mb-4">
                        <div class="text-danger fs-4 me-3"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Location</h6>
                            <p class="text-secondary small">Main Road, Vaishali Nagar, Jaipur, Rajasthan 302021</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="text-danger fs-4 me-3"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Phone Number</h6>
                            <p class="text-secondary small">+91 98765 43210<br>+91 91234 56789</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="text-danger fs-4 me-3"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Support</h6>
                            <p class="text-secondary small">info@smartgym.com<br>support@smartgym.com</p>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <h6 class="fw-bold mb-3">Gym Timings</h6>
                        <p class="text-secondary mb-1">Monday - Saturday:</p>
                        <p class="text-white small mb-3">6 AM – 11 AM & 4 PM – 10 PM</p>
                        <p class="text-secondary mb-1">Sunday:</p>
                        <p class="text-white small">Closed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card p-4 shadow">
                    <h4 class="fw-bold mb-4">Send Message</h4>
                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" placeholder="Message Subject" required>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5" placeholder="Type your message here..." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-5 rounded overflow-hidden shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113896.12643501174!2d75.72051314999999!3d26.885141699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1652345678901!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
