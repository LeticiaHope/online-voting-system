<?php
require '../includes/db.php'; // DB connection

// Fetch candidates and their vote count
$sql = "SELECT c.id, u.full_name, c.photo, c.position, 
            (SELECT COUNT(*) FROM votes WHERE candidate_id = c.id) AS vote_count 
        FROM candidates c 
        JOIN users u ON c.user_id = u.id";
$result = mysqli_query($conn, $sql);
?>

<body class="bg-light"  style="background-color:gray;">


<div class="container mt-0">
    <h2 class="mb-4">Live Election Results</h2>
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="../assets/images/candidates/<?php echo $row['photo']; ?>" class="card-img-top" style="height:250px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['full_name']); ?></h5><br>
                        <p class="card-text">Position: <?php echo htmlspecialchars($row['position']); ?></p>
                        <p class="fw-bold">Votes: <?php echo $row['vote_count']; ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
