<?php include '../includes/db.php'; ?>
<!--begin::Container-->
<div class="container-fluid">
  <!--begin::Row-->
  <div class="row">
    <!--begin::Col-->
    <div class="col-lg-3 col-6">
      <!--begin::Small Box Widget 1-->
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3><?php $total = $conn->query("SELECT count(id) as total from users where role = 'candidate'")->fetch_assoc()['total']; 
          echo number_format($total); ?></h3>
          <p>Candidates</p>
        </div>
        <svg
          class="small-box-icon"
          fill="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
        >
          <path
            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
          ></path>
        </svg>
        <a
          href="./manage_candidates"
          class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
        >
          Manage <i class="bi bi-link-45deg"></i>
        </a>
      </div>
      <!--end::Small Box Widget 1-->
    </div>
    <!--end::Col-->
    <div class="col-lg-3 col-6">
      <!--begin::Small Box Widget 2-->
      <div class="small-box text-bg-success">
        <div class="inner">
          <h3><?php $total = $conn->query("SELECT count(id) as total from users")->fetch_assoc()['total']; 
          echo number_format($total); ?></h3>
          <p>Registered Voters</p>
        </div>
        <svg
          class="small-box-icon"
          fill="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
        >
          <path
            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
          ></path>
        </svg>
        <a
          href="./manage_voters"
          class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
        >
          Manage <i class="bi bi-link-45deg"></i>
        </a>
      </div>
      <!--end::Small Box Widget 2-->
    </div>
    <!--end::Col-->
    <div class="col-lg-3 col-6">
      <!--begin::Small Box Widget 3-->
      <div class="small-box text-bg-warning">
        <div class="inner">
          <h3><?php 
              $query = $conn->query("SELECT COUNT(DISTINCT(position)) AS total FROM candidates");
              $total = $query->fetch_assoc()['total']; 
              echo number_format($total);
          ?></h3>
          <p>Positions</p>
        </div>
        <svg
          class="small-box-icon"
          fill="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
        >
          <path
            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
          ></path>
        </svg>
        <a
          href="#"
          class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
        >
          <i class="bi bi-link-45deg"></i>
        </a>
      </div>
      <!--end::Small Box Widget 3-->
    </div>
    <!--end::Col-->
    <div class="col-lg-3 col-6">
      <!--begin::Small Box Widget 4-->
      <div class="small-box text-bg-danger">
        <div class="inner">
          <h3><?php $total = $conn->query("SELECT count(id) as total from users where role = 'admin'")->fetch_assoc()['total']; 
          echo number_format($total); ?></h3>
          <p>Administrators</p>
        </div>
        <svg
          class="small-box-icon"
          fill="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
        >
          
          <path
            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
          ></path>
        </svg>
        <a
          href="./manage_administrators"
          class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
        >
          Manage <i class="bi bi-link-45deg"></i>
        </a>
      </div>
      <!--end::Small Box Widget 4-->
    </div>
    <!--end::Col-->
  </div>
 
</div>
<?php
$positions = [];
$query = "SELECT candidates.position, candidates.votes, users.full_name 
          FROM candidates 
          JOIN users ON candidates.user_id = users.id 
          ORDER BY candidates.position";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $positions[$row['position']][] = [
        'name' => $row['full_name'],
        'votes' => $row['votes']
    ];
}

// echo json_encode($positions);

?>

<div class="container mt-4">
    <div id="chart-container" class="d-flex flex-column gap-4"></div>
</div>
<script>
    let data = <?php echo json_encode($positions); ?>;
</script>

<script>
const candidates = <?php echo json_encode($data); ?>;
</script>
<script src="../public/customjs/dashboard.js"></script>
