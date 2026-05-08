<?php
session_start();
require 'includes/db.php';

$success = '';
$error = '';

if (isset($_POST['register'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate UMU student email
    if (!preg_match('/@stud\.umu\.ac\.ug$/', $email) && !preg_match('/@stud\.umu\.ac\.ug$/', $email)) {
        $error = "Only valid UMU student emails are allowed! Go Back and try again.";
    } else {
        // Check for existing email
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "This email is already registered!";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, 'voter')");
            $stmt->bind_param('sss', $full_name, $email, $password);

            if ($stmt->execute()) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMU Evote - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh; background-image: url(assets/images/umu2.jpeg); background-size: cover; background-position: center;">

            <header id="header" class="alt"><div class="logo"><a href="./">UMU EVOTE</a></div>
				<a href="#menu">Login/Register</a>
			</header><!-- Nav -->
            <nav id="menu"><ul class="links">
					<li><a href="./login.php">Login</a></li>
					<li><a href="./register.php">Register</a></li>
				</ul>
            </nav>
    <div class="card shadow p-4" style="width:400px;">
        <h3 class="text-center mb-3">Voter Registration</h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" id="myalert"><?= htmlspecialchars($error) ?></div>
        <?php elseif (!empty($success)): ?>
            <div class="alert alert-success" ><?= htmlspecialchars($success) ?></div>
            <div class="text-center mt-3">
                <a href="login.php" class="btn btn-primary">Proceed to Login</a>
            </div>
        <?php else: ?>
            <form method="POST">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Student Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="example@stud.umu.ac.ug">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button name="register" class="btn btn-primary w-100">Register</button>
                <p class="mt-3 text-center">Already registered? <a href="login.php">Login</a></p>
            </form>
        <?php endif; ?>
    </div>
    <script>
    setTimeout(function(){
        document.getElementById('myalert').style.display = 'none';
        window.location.href = 'register.php';
    }, 7000);
    </script>

    <script src="assets/js/jquery.min.js"></script><script src="assets/js/jquery.scrollex.min.js"></script><script src="assets/js/skel.min.js"></script><script src="assets/js/util.js"></script><script src="assets/js/main.js"></script> 
</body>
</html>
