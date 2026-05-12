<?php 
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="section-title text-center">BMI Calculator</h2>
                    <p class="text-center text-secondary mb-4">Body Mass Index (BMI) is a measure of body fat based on height and weight.</p>
                    
                    <form id="bmiForm">
                        <div class="mb-3">
                            <label class="form-label">Weight (kg)</label>
                            <input type="number" step="0.1" class="form-control" id="weight" placeholder="Enter weight in kg" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Height (meters)</label>
                            <input type="number" step="0.01" class="form-control" id="height" placeholder="Enter height in meters (e.g. 1.75)" required>
                        </div>
                        <button type="button" onclick="calculateBMI()" class="btn btn-danger w-100 py-2">Calculate BMI</button>
                    </form>

                    <div id="bmiResult" class="mt-4 text-center d-none">
                        <hr>
                        <h4 class="fw-bold">Your BMI: <span id="bmiValue" class="text-danger">0</span></h4>
                        <p class="lead">Category: <span id="bmiCategory" class="fw-bold">Normal</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function calculateBMI() {
    const weight = document.getElementById('weight').value;
    const height = document.getElementById('height').value;

    if (weight > 0 && height > 0) {
        const bmi = (weight / (height * height)).toFixed(2);
        document.getElementById('bmiValue').innerText = bmi;
        
        let category = "";
        let color = "";

        if (bmi < 18.5) {
            category = "Underweight";
            color = "#ffc107";
        } else if (bmi >= 18.5 && bmi <= 24.9) {
            category = "Normal Weight";
            color = "#28a745";
        } else if (bmi >= 25 && bmi <= 29.9) {
            category = "Overweight";
            color = "#fd7e14";
        } else {
            category = "Obese";
            color = "#dc3545";
        }

        document.getElementById('bmiCategory').innerText = category;
        document.getElementById('bmiCategory').style.color = color;
        document.getElementById('bmiResult').classList.remove('d-none');
    } else {
        alert("Please enter valid weight and height.");
    }
}
</script>

<?php include 'includes/footer.php'; ?>
