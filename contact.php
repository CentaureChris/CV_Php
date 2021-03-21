<?php
session_start();
require_once('partials/headerUser.inc');


// if(isset($_POST['submit'])){

//     $message = $_POST['message'];
//     $headers = "From ".$_POST['nom']." ".$_POST['prenom']." Email: ".$_POST['email'];
//     header('sendMail.php');

// }

?>

<div>
            
            
            <div class="row row-cols-1 row-cols-md-2 g-4 m-5">
                    <article id="art1" class="col border border-2 rounded-end p-3 border-light ">
                        
                        <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post" ><legend><u>Formulaire de contact</u></legend>
                            <div class="mb-3">
                                <label htmlFor="nom" class="form-label">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control"required placeholder="Enter your name" />
                            </div>
                            <div class="mb-3">
                                <label htmlFor="prenom" class="form-label">Prénom:</label>
                                <input type="text" name="prenom" id="prenom" class="form-control"required placeholder="Enter your name" />
                            </div>
                            <div class="mb-3">
                                
                                <div class="form-group">
                                  <label for="message">Message</label>
                                  <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter votre message"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label htmlFor="telephone" class="form-label">Téléphone</label>
                                <input type="tel" name="tel" id="tel" class="form-control"required placeholder="Enter number" />
                            </div>
                            <div class="mb-3">
                                <label htmlFor="email" class="form-label">Adresse email:</label>
                                <input type="mail" name="email" id="email" class="form-control"required placeholder="Enter your email" />
                            </div>
                            <button type="submit" name="submit"class="btn btn-outline-primary offset-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Soumettre</button>
                        </form>
                    </article>
                    <article id="art2" class="col  text-center border border-2 border-light rounded-start p-3">
                        <div class="joinme"></div>
                        <legend><u>Où me joindre:</u></legend><p style="height: 100px;"></p>
                        <i class="fas fa-paper-plane fa-3x" style="color: blue;"></i>
                        <p><a href="mailto:c.centaure@gmail.com">c.centaure@gmail.com</a></p>
                        <i class="fab fa-github fa-3x" style="color: purple;"></i>
                        <p><a href="https://github.com/CentaureChris" target="blank">Github</a></p>
                        <i class="fas fa-map-marked-alt fa-3x" style="color: green;"></i>
                        <p> 1 allée du gange  92160 Antony</p>
                        <i class="fas fa-mobile-alt fa-3x" style="color: Mediumslateblue;"></i>
                        <p>Tel: 06 50 75 86 74</p>
                    </article>
                </div>
                
                <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44108.47638589965!2d2.261439010680891!3d48.75097557686981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e677114605c77f%3A0x40b82c3688b3ed0!2sAntony!5e0!3m2!1sfr!2sfr!4v1613516160414!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0"  allowfullscreen="" aria-hidden="false" tabIndex="0" title="location"></iframe></div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabIndex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        Message envoyé! Merci<?= " ".$_POST['prenom']." "; ?>pour votre visite!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
