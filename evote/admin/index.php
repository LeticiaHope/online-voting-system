<?php 

session_start();
require '../includes/auth.php';
require '../includes/db.php';
requireLogin();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', trim($url, '/'));  // breaks URL into parts

$name = isset($parts[2]) ? $parts[2] : 'dashboard';

$page = "../application/views/" . $name;

     //$name = isset($_GET['name']) ? trim($_GET['name'], '/') : 'home';
   //  $page = "../application/views/".$name;
?>
<!doctype html>

<html lang="en">
  
  <?php include '../inc/header.php'; ?>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
 
    <div class="app-wrapper">
    
      <?php include '../inc/topnav.php'; ?>
    
      <?php include '../inc/navigation.php'; ?>
    
      <main class="app-main">
      
        <div class="app-content-header">
      
          <div class="container-fluid">
       
            <div class="row">
              <div class="col-sm-6 text-capitalize"><h3 class="mb-0"><?php if ($name == 'dashboard') {
                    echo "Dashboard";
                  } else { echo ""; }?></h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active text-capitalize" aria-current="page"><?php if ($name == 'home') {
                    echo "";
                  } else { echo $name; }?></li>
                </ol>
              </div>
            </div>
         
          </div>
      
        </div>
        
        <div class="app-content">
        
        <?php 
              if(!file_exists($page.".php") && !is_dir($page)){
                  include '../application/views/404.php';
              }else{
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';

              }
            ?>
        </div>
   
      </main>
    

      <?php include '../inc/footer.php'; ?>
    
 
      <script src="../public/customjs/dashboard.js"></script>
 
  </body>
 
</html>
