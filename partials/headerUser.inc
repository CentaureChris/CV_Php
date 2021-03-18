<?php 
require_once('conndb.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecf5 Centaure</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="assets/JS/script.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="logo" width="100px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item text-center" >
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i>Home</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link" href="presentation.php"><i class="fas fa-handshake"></i>Presentation</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link" href="contact.php"><i class="fas fa-handshake"></i>Contacts</a>
        </li>
        <span id="look" class=mt-3 >
        <i class="fas fa-hand-point-left fa-2x text-white"></i>
        </span>
      </ul>
      <form class="d-flex offset-7" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
          <input class="form-control me-2" type="search"  id="navSearch" name="navSearch" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-success flex-end" type="submit" id="navSubmit" name="navSubmit"><i class="fas fa-search"></i></button>
      </form>
      <?php if(isset($_SESSION['auth'])){ ?>
        <span class="nav-item dropdown">
        <span class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        
        <?= $_SESSION['auth']['nom']." ".$_SESSION['auth']['prenom']; ?>
        </span>
        <ul class="dropdown-menu bg-light " aria-labelledby="navbarDropdown">
        <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){ ?>
          <li><a class="dropdown-item text-primary" href="addUser.php">Add User<i class="fas fa-user-plus ml-2"></i></li>
        <?php } ?>
        <li class="text-end"><a class="dropdown-item " href="admin/liste.php">List Setup</a></li>
          <li class="text-end"><a class="dropdown-item text-warning" href="admin/logout.php">Déconexion<i class="fas fa-user-alt-slash ml-2"></i></a></li>
        </ul>
      </span>
      </ul>
    
            </ul>
        <?php } ?>
        </div>
    </div>
  </div>
</nav>