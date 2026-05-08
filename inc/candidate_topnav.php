<nav class="app-header navbar navbar-expand bg-body">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-md-block"><a href="./" class="nav-link">Home</a></li>
      <li class="nav-item d-none d-md-block"><a href="./vote" class="nav-link">Vote</a></li>
      <li class="nav-item d-none d-md-block"><a href="./results" class="nav-link">Results</a></li>

    </ul>
 
    <ul class="navbar-nav ms-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-bell-fill"></i>
          <span class="navbar-badge badge text-bg-warning"></span>
        </a>
      </li>
      <!--end::Notifications Dropdown Menu-->
      <!--begin::Fullscreen Toggle-->
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
        </a>
      </li>
      <!--end::Fullscreen Toggle-->
      <!--begin::User Menu Dropdown-->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img
            <?php
           
         
           
           $userid = $_SESSION['user']['id'];
           
           // Simple query — no placeholders
           $sql = "SELECT photo FROM candidates WHERE user_id = $userid";
           $query = $conn->query($sql);
           
           // Fetch the result
           $row = $query->fetch_assoc();
           
           // If found, use the photo, otherwise fallback
           $photo = $row ? $row['photo'] : 'default.png';
           ?>
          
            src="../assets/images/candidates/<?=$photo?>" 
            class="user-image rounded-circle shadow" 
            alt="User Image"
          >  
          
          <span class="d-none d-md-inline text-capitalize"><?php if (isset($_SESSION['user'])) {
              echo $_SESSION['user']['full_name'];
          } else {
              echo "User not logged in.";
          } ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <!--begin::User Image-->
          <li class="user-header text-bg-primary">
            <img
              src="../assets/images/candidates/<?=$photo?>"
              class="rounded-circle shadow"
              alt="User Image"
            />
            <p class="text-capitalize">
            <?php if (isset($_SESSION['user'])) {
              echo $_SESSION['user']['full_name'];
            } else {
                echo "User not logged in.";
            } ?>
              <small><?php echo $_SESSION['user']['role']; ?></small>
            </p>
          </li>
          <!--end::User Image-->
          <!--begin::Menu Body-->
         
          <!--end::Menu Body-->
          <!--begin::Menu Footer-->
          <li class="user-footer">
          
            <a href="../logout.php" class="btn btn-default btn-flat float-end btn-outline-primary">Sign out</a>
          </li>
          <!--end::Menu Footer-->
        </ul>
      </li>
      <!--end::User Menu Dropdown-->
    </ul>
    <!--end::End Navbar Links-->
  </div>
  <!--end::Container-->
</nav>