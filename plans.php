<?php 
include 'includes/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100">
    <div class="container text-center">
        <h2 class="section-title">Membership Plans</h2>
        <p class="text-secondary mb-5">Choose the plan that fits your lifestyle and fitness goals.</p>
        
        <div class="row g-4 mt-2">
            <?php
            $plans_query = "SELECT * FROM membership_plans";
            $plans_result = mysqli_query($conn, $plans_query);
            while($plan = mysqli_fetch_assoc($plans_result)) {
            ?>
            <div class="col-md-4">
                <div class="card h-100 plan-card <?php echo ($plan['plan_name'] == 'Standard Plan') ? 'active' : ''; ?>">
                    <div class="card-body p-4">
                        <?php if($plan['plan_name'] == 'Standard Plan') echo '<span class="badge bg-danger mb-3">MOST POPULAR</span>'; ?>
                        <h3 class="fw-bold mb-3"><?php echo $plan['plan_name']; ?></h3>
                        <h2 class="text-danger mb-3">₹<?php echo number_format($plan['price'], 0); ?></h2>
                        <p class="text-secondary mb-4"><?php echo $plan['duration']; ?></p>
                        <hr class="bg-secondary">
                        <ul class="list-unstyled mb-5 text-start">
                            <?php 
                            $features = explode(',', $plan['features']);
                            foreach($features as $feature) {
                                echo "<li class='mb-2'><i class='fas fa-check text-danger me-2'></i> " . trim($feature) . "</li>";
                            }
                            ?>
                        </ul>
                        <a href="inquiry.php?plan=<?php echo urlencode($plan['plan_name']); ?>" class="btn btn-danger btn-lg w-100">Choose Plan</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="mt-5 p-4 bg-dark rounded text-start">
            <h4 class="fw-bold mb-3">Frequently Asked Questions</h4>
            <div class="accordion accordion-flush" id="faqAccordion">
                <div class="accordion-item bg-dark text-white border-secondary">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Can I change my plan later?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Yes, you can upgrade your plan at any time. The difference in price will be adjusted accordingly.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-dark text-white border-secondary">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Is there a registration fee?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            No, we do not charge any separate registration fee. You only pay for the selected plan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
