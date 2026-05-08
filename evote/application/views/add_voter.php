<?php



// Allow only Admin
if (getUser()['role'] !== 'admin') {
    exit('Access Denied.');
}

$message = "";

if (isset($_POST['submit'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Get the password from the form


    
    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $userResult = $stmt->get_result();
    $user = $userResult->fetch_assoc();

    if (!$user) {
        // Add new user as voter
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password
        $role = "voter";
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $hashedPassword, $role);
        $stmt->execute();
        $user_id = $stmt->insert_id;
    } else {
        // Promote to admin if not already
        $user_id = $user['id'];
        $stmt = $conn->prepare("UPDATE users SET role = 'voter' WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }

   

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Voter added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
}
?>


<body class="bg-light">
<div class="container mt-0">
    <!-- <h2 class="mb-4 text-center">Add Candidate</h2> -->

    <div id="myalert">
    <?= $message ?>
    </div>

    <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm mx-auto" style="max-width: 900px;">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required placeholder="example@umu.ac.ug">
        </div>
       
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Set Initial Password">
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary w-100">Add Voter</button>
    </form>
</div>

    <script>
        setTimeout(function(){
            document.getElementById('myalert').style.display = 'none';
        }, 2500); 
    </script>
</body>
</html>
