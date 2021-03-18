<?php 
session_start();
require_once('conndb.php');
require_once('partials/headeruser.inc');



?>

<style>
    .carousel-item{
        height: 500px;
    }
    .ico{
        width: 150px;
    }
</style>


<div>
            
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="assets/images/background.jpeg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                    <img src="assets/images/crossfit_caroussel.jpeg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                    <img src="assets/images/Tireur-délite.jpeg" class="d-block w-100" alt="..." />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            <section class="col" >

            <div class="card col" >
                        <div class="card-header">
                        <h1><u>Compétences</u></h1>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Permis B et C</li>
                            <li class="list-group-item">Excel, Word, Powerpoint Outlook.</li>
                            <li class="list-group-item">Premiers secours civil niveau 1</li>
                            <li class="list-group-item">Secours au combat</li>
                            <li class="list-group-item">Programmation informatique:
                                <div class="col text-center">
                                    <img src="assets/images/html.svg" alt=".." class="ico"/><img src="assets/images/css.png" alt=".."class="ico"/><img src="assets/images/js.png" alt=".." class="ico"/>
                                </div>
                                <div class="col text-center">
                                <img src="assets/images/mysql.svg" alt=".." class="ico" /> <img src="assets/images/react.jpeg" alt=".." class="ico"/><img src="assets/images/jquerry.jpg" alt=".." class="ico"/><img src="assets/images/php-logo.png" alt=".." class="ico"/><img src="assets/images/ajax.png" alt=".." class="ico"/>
                                </div>
                            </li>
                           
                        </ul>
                    </div>     
           
                    <div class="card col mb-5" >
                        <div class="card-header">
                        <h1><u>Expériences</u></h1>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Armée de terre,Colmar 152 RI— Chef d’Equipe tireur d’élite février 2014  À février 2020</li>
                            <li class="list-group-item">Chef d’équipe combattant débarqué</li>
                            <li class="list-group-item">Tireur de précision</li>
                            <li class="list-group-item">Tireur d’élite, Chef d'équipe tireur d’élite</li>
                            <li class="list-group-item">Daco-bello, Massy — conducteur de ligne janvier  2010 à mai 2013</li>
                            <li class="list-group-item">Quick, Massy: Equipier Septembre 2008 à Novembre 2010</li>
                        </ul>
                    </div>           
        </section>
    </div>
<?php require_once('partials/footer.inc'); ?>