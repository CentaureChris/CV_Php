<?php
require_once('security.php');
require_once('../conndb.php');


if(isset($_GET['id'])){
    $id = (int)htmlspecialchars(addslashes($_GET['id']));
    $req = "SELECT image FROM livre WHERE id_livre =".$id;
    $res = mysqli_query($conn,$req);
    $data = mysqli_fetch_assoc($res);

    $sql = "DELETE FROM livre WHERE id_livre =".$id;

    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        copy('../assets/images/'.$data['image'],'../assets/archives/'.$data['image']);
        unlink('../assets/images/'.$data['image']);
        header('location:liste.php');
        }else{
            echo "<div class='alert alert-danger'>Delete failed!</div> ";
        }
}
?>