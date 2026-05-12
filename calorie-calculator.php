<?php 
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="section-padding bg-black min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h2 class="section-title text-center">Calorie Intake Calculator</h2>
                    <p class="text-center text-secondary mb-4">Calculate your daily calorie needs based on your activity level and goals.</p>
                    
                    <form id="calorieForm">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" placeholder="e.g. 25" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" id="cWeight" placeholder="e.g. 70" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" id="cHeight" placeholder="e.g. 175" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Activity Level</label>
                                <select class="form-select" id="activity" required>
                                    <option value="1.2">Sedentary (Little or no exercise)</option>
                                    <option value="1.375">Lightly Active (Exercise 1-3 days/week)</option>
                                    <option value="1.55">Moderately Active (Exercise 3-5 days/week)</option>
                                    <option value="1.725">Very Active (Exercise 6-7 days/week)</option>
                                    <option value="1.9">Extra Active (Hard exercise & physical job)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Goal</label>
                                <select class="form-select" id="goal" required>
                                    <option value="maintain">Maintain Weight</option>
                                    <option value="loss">Weight Loss</option>
                                    <option value="gain">Muscle Gain</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" onclick="calculateCalories()" class="btn btn-danger w-100 py-2">Calculate Calories</button>
                    </form>

                    <div id="calorieResult" class="mt-4 d-none">
                        <hr>
                        <div class="row text-center g-3">
                            <div class="col-md-4">
                                <div class="p-3 bg-dark rounded">
                                    <h5 class="text-danger mb-1"><span id="calories">0</span></h5>
                                    <small class="text-secondary">Daily Calories</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-dark rounded">
                                    <h5 class="text-danger mb-1"><span id="water">0</span> L</h5>
                                    <small class="text-secondary">Water Intake</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-dark rounded">
                                    <h5 class="text-danger mb-1"><span id="protein">0</span> g</h5>
                                    <small class="text-secondary">Protein Intake</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function calculateCalories() {
    const age = parseInt(document.getElementById('age').value);
    const gender = document.getElementById('gender').value;
    const weight = parseFloat(document.getElementById('cWeight').value);
    const height = parseFloat(document.getElementById('cHeight').value);
    const activity = parseFloat(document.getElementById('activity').value);
    const goal = document.getElementById('goal').value;

    if (age && weight && height) {
        let bmr;
        if (gender === "male") {
            bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
        } else {
            bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
        }

        let maintenanceCalories = bmr * activity;
        let finalCalories;

        if (goal === "loss") {
            finalCalories = maintenanceCalories - 500;
        } else if (goal === "gain") {
            finalCalories = maintenanceCalories + 500;
        } else {
            finalCalories = maintenanceCalories;
        }

        document.getElementById('calories').innerText = Math.round(finalCalories);
        document.getElementById('water').innerText = (weight * 0.033).toFixed(1);
        document.getElementById('protein').innerText = Math.round(weight * 1.8);
        document.getElementById('calorieResult').classList.remove('d-none');
    } else {
        alert("Please fill all fields.");
    }
}
</script>

<?php include 'includes/footer.php'; ?>
