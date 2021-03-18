

<?php
require_once('../conndb.php');


$error="";
if(isset($_POST['submit'])){
    if(!empty($_POST['login']) &&  !empty($_POST['pass'])){
        $login = trim(htmlentities($_POST['login']));
        $pass = md5(trim(htmlentities($_POST['pass'])));      
        $sql= "SELECT *
                FROM user
                WHERE login = '$login' AND pass = '$pass' ";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $data = mysqli_fetch_assoc($result);
                    session_start();
                    $_SESSION['auth'] = $data;
                    header('location:liste.php');
                }else{
                    $error = '<div class="alert alert-danger text-center">Le login et le mot de passe ne correspondent pas!</div>';
                }
        
    }else{
        $error = "<div class='alert alert-danger'> Mot de passe et login requis!' </div>";
    }
}

?>

<?php require_once('../partials/header.inc'); ?>

<div class="container ">
    <div class="card col-4 offset-4 " style="margin-top:20%!important;">
        <div class="card-header text-center">Connexion</div>
        <?=$error; ?>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post"?>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login" >
                </div>  
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrer le mot de passe" >
                </div>
               <div class = text-center>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>
    
    

<?php
require_once('../partials/footer.inc');


?>

