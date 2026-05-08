<?php
session_start();
require 'includes/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];
        header('Location: ' . $user['role'] . '/');
        exit();
    } else {
        $error = "Invalid Credentials. Try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMU Evote Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh; background-image: url(assets/images/umu2.jpeg); background-position: center; background-size: cover; ">
            <header id="header" class="alt"><div class="logo"><a href="./">UMU EVOTE</a></div>
				<a href="#menu">Login/Register</a>
			</header><!-- Nav -->
            <nav id="menu"><ul class="links">
					<li><a href="./login.php">Login</a></li>
					<li><a href="./register.php">Register</a></li>
				</ul>
            </nav>
    <div class="card shadow p-4" style="width:400px;">
        <h3 class="text-center mb-3">Login</h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" id="myalert"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="example@stud.umu.ac.ug">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button name="login" class="btn btn-primary w-100">Login</button>
            <p class="mt-3 text-center">No account? <a href="register.php">Register</a></p>
        </form>
    </div>

    <script>
        setTimeout(function(){
            document.getElementById('myalert').style.display = 'none';
        }, 2500); // 3000ms = 3 seconds
    </script>
 
    <script src="assets/js/jquery.min.js"></script><script src="assets/js/jquery.scrollex.min.js"></script><script src="assets/js/skel.min.js"></script><script src="assets/js/util.js"></script><script src="assets/js/main.js"></script>
</body>
</html>
