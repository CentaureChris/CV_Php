<?php
session_start();
require_once('conndb.php');
require_once('partials/headeruser.inc');


// $sql1 = "SELECT * FROM livre l
//         INNER JOIN category c
//         ON l.id_category = c.id_c";

// $result = mysqli_query($conn, $sql1);


// function trDate($date){
//     $dateArray = (explode("-",substr(($date),0,10)));
//     $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
//     return $dateIns;
// }

if(isset($_POST['navSubmit']) && !empty($_POST['navSearch'])){
    $kWord = trim(addslashes(htmlentities($_POST['navSearch'])));
    $sql1 = " SELECT * FROM livre l
    INNER JOIN category c
    ON l.id_category = c.id_c
    WHERE nom LIKE '%$kWord%' OR auteur LIKE '%$kWord%' OR titre LIKE '%$kWord%' ";
  }else{
  
  $sql1 = "SELECT * FROM livre l
        INNER JOIN category c
        ON l.id_category = c.id_c ";
  }
  
  $result = mysqli_query($conn,$sql1);

  if(mysqli_num_rows($result) == 0){
      $nores = "<h2 class='text-center text-white'>No match found! Please try again...</h2>";
      }else{
          $nores="";
      }

    //   var_dump($result) ;

?>

<style>
    body{
        background: url(assets/images/lib.jpg);
    }
    p{
        height: 110px;
        overflow: scroll;
    }
    h1,h5{
        font-family: Copperplate, Papyrus, fantasy;
    }
</style>


<div class="container mb-5">
    <div class="bg-secondary text-center  p-4">
        <h1 class="text-white">Nos livres Disponible</h1>
       
    </div> 
    <?= $nores ?>
    <div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        <?php while($rows = mysqli_fetch_assoc($result)){ ?>
            <div class="col">
              <div class="card" >
                <img src="assets/images/<?=$rows['image'];?>" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                  <h5 class="card-title text-center"><b> <?=$rows['titre'];?></b></h5>
                  <hr>
                  <p class="card-text"><?=$rows['description'];?></p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Catégorie: <?=$rows['nom'];?></li>
                    <li class="list-group-item">Auteur: <?=$rows['auteur'];?></li>
                 </ul>
                 <hr>
                  <div class="card-footer">
                        <li class="list-group-item text-right">ref: 024200<?=$rows['id_livre'];?></li>
                    </div>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
</div>
<?php require_once('partials/footer.inc');?>