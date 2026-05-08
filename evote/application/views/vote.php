<?php

// session_start();

// require '../includes/auth.php';

// requireLogin();  // force login

$user = $_SESSION['user'];


require '../includes/db.php';
$voted_positions = [];
$stmt = $conn->prepare("SELECT position FROM votes WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user']['id']);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $voted_positions[] = $row['position'];
}

// Fetch all candidates grouped by position
$candidates = [];
$res = $conn->query("SELECT c.*, u.full_name AS candidate_name FROM candidates c 
                     LEFT JOIN users u ON c.user_id = u.id ORDER BY c.position DESC");

while ($row = $res->fetch_assoc()) {
    $candidates[$row['position']][] = $row;
}

// Handle voting submission
if (isset($_POST['vote_candidate'])) {
    $candidate_id = $_POST['candidate_id'];

    // Get candidate info
    $stmt = $conn->prepare("SELECT c.id, c.position, c.photo, u.full_name AS candidate_name 
    FROM candidates c 
    LEFT JOIN users u ON c.user_id = u.id 
    WHERE c.id = ?");

    $stmt->bind_param("i", $candidate_id);
    $stmt->execute();
    $candidate = $stmt->get_result()->fetch_assoc();

    if (!$candidate) {
        $error = "Invalid candidate selected.";
    } elseif (in_array($candidate['position'], $voted_positions)) {
        $error = "You have already voted for this position.";
    } else {
        // Record vote
        $stmt = $conn->prepare("INSERT INTO votes (user_id, candidate_id, position) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $_SESSION['user']['id'], $candidate_id, $candidate['position']);
        if ($stmt->execute()) {
            // Update votes count in candidates table (optional but useful for fast queries)
            $conn->query("UPDATE candidates SET votes = votes + 1 WHERE id = $candidate_id");
            
            echo "<script> location.reload(); </script>";
            exit();
        } else {
            $error = "Failed to submit your vote. Try again.";
        }
    }
}
?>

    <h2 class="mb-4 text-center">Vote for Your Candidate</h2>
  

    <?php if (!empty($_GET['success'])): ?>
        <div class="alert alert-success text-center" id="myalert">Your vote has been recorded!</div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger text-center" id="myalert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php foreach ($candidates as $position => $list): ?>
        <h4 class="mt-4"><?= htmlspecialchars($position) ?></h4>

        <?php if (in_array($position, $voted_positions)): ?>
            <div class="alert alert-warning">You have already voted for this position.</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($list as $candidate): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <?php if (!empty($candidate['photo'])): ?>
                                <img src="../assets/images/candidates/<?=$candidate['photo']?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="<?= htmlspecialchars($candidate['candidate_name']) ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x200?text=No+Photo" class="card-img-top" alt="No Photo">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($candidate['candidate_name']) ?></h5>
                                <p class="card-text"><strong>Position:</strong> <?= htmlspecialchars($candidate['position']) ?></p>
                                <p class="card-text"><small class="text-muted"><?= htmlspecialchars($candidate['candidate_name']) ?></small></p>

                                <form method="POST" class="mt-auto">
                                    <input type="hidden" name="candidate_id" value="<?= $candidate['id'] ?>">
                                    <button name="vote_candidate" class="btn btn-success w-100" onclick="return confirm('Confirm your vote for <?= htmlspecialchars($candidate['candidate_name']) ?>?')">Vote</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <script>
        setTimeout(function(){
            document.getElementById('myalert').style.display = 'none';
        }, 2500);
    </script>