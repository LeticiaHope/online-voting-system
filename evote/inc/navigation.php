<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="./" class="brand-link">
      <!--begin::Brand Image
      <img
        src="../assets/images/kyu2.jpg"
        alt="Logo"
        class="brand-image opacity-75 shadow"
      />
      end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">UMU Evote</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false"
      >
        <li class="nav-item menu-closed">
          <a href="../admin/dashboard" class="nav-link ">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
         
        </li>
        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-person-badge"></i>
            <p>
              Candidates
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./manage_candidates" class="nav-link <?php if ($name == 'manage_candidates') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-person-gear"></i>
                <p>Manage Profiles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./view_votes" class="nav-link <?php if ($name == 'view_votes') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-bar-chart-line"></i>
                <p>Monitor Votes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./add_candidate" class="nav-link <?php if ($name == 'add_candidate') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-plus"></i>
                <p>Add candidate</p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="./positions" class="nav-link <?php if ($name == 'positions') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-gear"></i>
                <p>View Positions</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-sliders"></i>
            <p>
              Administrators
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./manage_administrators" class="nav-link <?php if ($name == 'manage_administrators') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-person-gear"></i>
                <p>Manage Administrators</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./add_administrator" class="nav-link <?php if ($name == 'add_administrator') {echo 'active'; } ?> ">
                <i class="nav-icon bi bi-plus"></i>
                <p>Add Administrator</p>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-person"></i>
            <p>
              Voters
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./manage_voters" class="nav-link <?php if ($name == 'manage_voters') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-person-gear"></i>
                <p>Manage Voters</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./add_voter" class="nav-link <?php if ($name == 'add_voter') {echo 'active'; } ?>">
                <i class="nav-icon bi bi-plus"></i>
                <p>Add Voter</p>
              </a>
            </li>
           
            
          </ul>
        </li>

        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-shield"></i>
            <p>
              Elections
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./schedule_elections" class="nav-link">
                <i class="nav-icon bi bi-clock"></i>
                <p>Schedule Elections</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-clock"></i>
                <p>Make Changes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-bell"></i>
                <p>Alert Candidates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-bell"></i>
                <p>Alert Registered Voters</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-bell"></i>
                <p>Alert Administrators</p>
              </a>
            </li> -->
            
          </ul>
        </li>
        <!--
        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-file-earmark"></i>
            <p>
              Reports
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-pdf"></i>
                <p>Registered Voters</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-pdf"></i>
                <p>Registered Candidates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-pdf"></i>
                <p>Administrators List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-pdf"></i>
                <p>Votes Analysis</p>
              </a>
            </li>
            
          </ul>
        </li>
        
        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-gear"></i>
            <p>
              Settings
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-person-gear"></i>
                <p>Manage Profile</p>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item menu-closed">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-phone"></i>
            <p>
              Support
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon bi bi-person-gear"></i>
                <p>Contact Support Team</p>
              </a>
            </li>
            
          </ul>
        </li>
        -->
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>