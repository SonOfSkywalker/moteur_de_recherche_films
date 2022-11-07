<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <style>a,a:hover{
    color:black;
  }
</style>
</head>

<body>

<?php if(isset($_POST['realisateur'])){
  $h4="Recherche par réalisateur pour : \"" . $_POST['realisateur'] . "\"";


  include '../sql.php';


  if(isset($_POST['realisateur'])){

      // Prepare a select statement
      $sql = "SELECT titre_film, duree_film, poster_film,annee_film, rating_film,description_film, realisateur.nom_personne AS nom_real, GROUP_CONCAT(DISTINCT acteur.nom_personne SEPARATOR ',') AS acteurs, GROUP_CONCAT(DISTINCT genre.nom_genre SEPARATOR ', ') AS genres FROM film JOIN realiser ON film.id_film=realiser.id_film JOIN personne AS realisateur ON realiser.id_personne=realisateur.id_personne JOIN jouer ON film.id_film=jouer.id_film JOIN personne AS acteur ON jouer.id_personne=acteur.id_personne JOIN etre_du_genre ON film.id_film=etre_du_genre.id_film JOIN genre ON genre.id_genre=etre_du_genre.id_genre WHERE realisateur.nom_personne LIKE '% ". $_POST["realisateur"] ."%' OR  realisateur.nom_personne LIKE '". $_POST["realisateur"] ."%' GROUP BY titre_film ";

      if($stmt = mysqli_prepare($link, $sql)){

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);
          $count = mysqli_num_rows($result);
        }
}

if ($count>1){
  $results = ($count . " résultats");
}
else if($count==1){
  $results = ($count . " résultat");
}
else if($count==0){
  $results = ("Aucun résultat");
}

}
}
else{
  $h4=("Aucune entrée");
}




?>

  <div class="container">
    <div class="row pt-3 pb-3" style="margin-bottom:50px;">
      <h2 class="col-md-12"><a style="text-decoration:none;"href="/bddr">Movie Database Search</a></h2>

    </div>
    <div class="row" style="margin-bottom:50px;">
      <h4 class="col-md-12"><?php echo $h4;?></h4>
    </div>
    <div class="row" style="margin-bottom:50px;">
      <p class="col-md-12"><?php echo $results;?></p>
    </div>
    <div class="row form-group">
      <a class="col-md-3" href="/bddr/real"><button class="btn btn-dark">Nouvelle recherche</button></a>
      <div class="col-md-6"></div>
      <?php include '../tri.php';?>
      <div class="col-md-1">

      </div>

    </div>



<?php
include '../headers.html';

include '../sql.php';


if(isset($_POST['realisateur'])){

    // Prepare a select statement
    $sql = "SELECT titre_film, duree_film, poster_film,annee_film, rating_film,description_film, realisateur.nom_personne AS nom_real, GROUP_CONCAT(DISTINCT acteur.nom_personne SEPARATOR ',') AS acteurs, GROUP_CONCAT(DISTINCT genre.nom_genre SEPARATOR ', ') AS genres FROM film JOIN realiser ON film.id_film=realiser.id_film JOIN personne AS realisateur ON realiser.id_personne=realisateur.id_personne JOIN jouer ON film.id_film=jouer.id_film JOIN personne AS acteur ON jouer.id_personne=acteur.id_personne JOIN etre_du_genre ON film.id_film=etre_du_genre.id_film JOIN genre ON genre.id_genre=etre_du_genre.id_genre WHERE realisateur.nom_personne LIKE '% ". $_POST["realisateur"] ."%' OR  realisateur.nom_personne LIKE '". $_POST["realisateur"] ."%' GROUP BY titre_film " . $order;

    if($stmt = mysqli_prepare($link, $sql)){

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                $i =0;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                  include '../results.php';

                }
            } else{
                echo "<div class='row'>Aucun film correspondant trouvé</div>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
else{
  echo "";
}
// close connection
mysqli_close($link);
?>


</body>
</html>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://prcmfilms.fr/fiverr/template1/js/scripts.js"></script>
