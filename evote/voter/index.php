<?php 
session_start();
require '../includes/auth.php';
requireLogin();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', trim($url, '/'));  // breaks URL into parts

$name = isset($parts[2]) ? $parts[2] : 'home';



     $name = isset($_GET['name']) ? trim($_GET['name'], '/') : 'vote';
     $page = "../application/views/" . $name;
?>
<!doctype html>

<html lang="en">
  
  <?php include '../inc/header.php'; ?>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
 
    <div class="app-wrapper">
    
      <?php include '../inc/voter_topnav.php'; ?>
    
    
      <main class="app-main">
      
        <div class="app-content-header">
      
          <div class="container-fluid">
       
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"><?php if ($name == 'home') {
                    echo "";
                  } else { echo ""; }?></h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php if ($name == 'home') {
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
                  include '404.php';
              }else{
                if(is_dir($page))
                  include $page.'.php';
                else
                  include $page.'.php';

              }
            ?>
        </div>
   
      </main>
    

      <?php include '../inc/footer.php'; ?>
    
 
     
  </body>
 
</html>
