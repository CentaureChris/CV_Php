<?php
 require_once('contact.php');


//     $to = "adouken972@hotmail.fr";
//     $subject = "test";
   
//      header('admin/sendMail.php');


     
//     if(mail($to,$subject,$message,$headers)){
//         echo "<script>alert('email send success!')</script>";
//         // header('contact.php');
    
//     }




$to = "c.centaure972@gmail.com";
$subject = "test";
// $message = "Test de messagerie sur php.";
// $headers = "From: c.centaure972@gmail.com"."\r\n".
// "CC: c.centaure972@gmail.com";




if(mail($to,$subject,$message,$headers)){
    echo "ok...";
}else{
    echo "echec";
}

?>