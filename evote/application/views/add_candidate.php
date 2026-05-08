<?php



// Allow only Admin
if (getUser()['role'] !== 'admin') {
    exit('Access Denied.');
}

$message = "";

if (isset($_POST['submit'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $position = trim($_POST['position']);
    $password = $_POST['password']; // Get the password from the form

    // Handle photo upload
    $photo = "";
    $uploadDir = "../assets/images/candidates/";  // Define the upload directory
    
    // Check if the directory exists, if not, create it
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create the directory with appropriate permissions
    }
    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);  // Get the file extension
        $photo = uniqid() . "." . $ext;  // Generate a unique filename
        
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photo);
    }
    
    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $userResult = $stmt->get_result();
    $user = $userResult->fetch_assoc();

    if (!$user) {
        // Add new user as candidate
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password
        $role = "candidate";
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $hashedPassword, $role);
        $stmt->execute();
        $user_id = $stmt->insert_id;
    } else {
        // Promote to candidate if not already
        $user_id = $user['id'];
        $stmt = $conn->prepare("UPDATE users SET role = 'candidate' WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }

    // Insert into candidates table
    $added_by = getUser()['id'];
    $stmt = $conn->prepare("INSERT INTO candidates (user_id, position, photo, added_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $user_id, $position, $photo, $added_by);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Candidate added successfully!</div>";
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
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control" required placeholder="e.g. Guild President">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Set Initial Password">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Add Candidate</button>
    </form>
</div>

    <script>
        setTimeout(function(){
            document.getElementById('myalert').style.display = 'none';
        }, 2500);
    </script>
</body>
</html>
