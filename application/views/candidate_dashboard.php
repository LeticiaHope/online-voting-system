<?php include '../includes/db.php';

if (isset($_SESSION['user'])) {
  $candidate_id = $_SESSION['user']['id'];
} else {
  header ('Location: ../');
}
$query = "SELECT position FROM candidates WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $candidate_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if ($row = mysqli_fetch_assoc($result)) {
    $candidate_position = $row['position'];
} else {
    
    $candidate_position = 'Not a candidate';
}

$position = $candidate_position;
$candidates = [];

$query = "SELECT candidates.votes, users.full_name 
          FROM candidates 
          JOIN users ON candidates.user_id = users.id 
          WHERE candidates.position = ? 
          ORDER BY candidates.votes DESC";

// Prepared statement for security
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $position);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $candidates[] = [
            'name' => $row['full_name'],
            'votes' => $row['votes']
        ];
    }
} else {
    echo "Query error: " . mysqli_error($conn);
}

?>

<div class="container mt-4">
    <div id="chart-container" class="d-flex flex-column gap-4"></div>
    <canvas id="voteChart" width="400" height="150"></canvas>

</div>

<script>
    const candidatesData = <?php echo json_encode($candidates); ?>;
    const positionTitle = "<?php echo addslashes($candidate_position); ?>";

</script>

<script src="../public/customjs/candidate_dashboard.js"></script>
