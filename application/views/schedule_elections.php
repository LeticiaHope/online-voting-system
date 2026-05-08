<?php



// Allow only Admin
if (getUser()['role'] !== 'admin') {
    exit('Access Denied.');
}

$message = "";

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $date = trim($_POST['date']);
    $status = trim($_POST['status']);

    
    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM elections WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $electionResult = $stmt->get_result();
    $election = $electionResult->fetch_assoc();

    if (!$election) {
   
        $stmt = $conn->prepare("INSERT INTO elections (title, date, status, added_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $title, $date, $status, getUser()['id']);
        $stmt->execute();
        $election_id = $stmt->insert_id;
    } else {

        $election_id = $election['id'];
        $stmt = $conn->prepare("UPDATE elections SET title = '$title', date = '$date', status = '$status'  WHERE id = ?");
        $stmt->bind_param("i", $election_id);
        $stmt->execute();
    }


    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Election Scheduled successfully!</div>";
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
            <label class="form-label">Election Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Voting Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" required placeholder="0 for active, 1 to disable">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary w-100">Schedule Election</button>
    </form>
</div>

    <script>
        setTimeout(function(){
            document.getElementById('myalert').style.display = 'none';
        }, 2500);
    </script>
</body>
</html>
