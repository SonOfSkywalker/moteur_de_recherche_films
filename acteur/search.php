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

<?php
  $acteurs = array();
  if($_POST['acteur1']!=""){
    array_push($acteurs, $_POST['acteur1']);
  }
  if($_POST['acteur2']!=""){
    array_push($acteurs, $_POST['acteur2']);
  }
  if($_POST['acteur3']!=""){
    array_push($acteurs, $_POST['acteur3']);
  }
  if($_POST['acteur4']!=""){
    array_push($acteurs, $_POST['acteur4']);
  }

  if(count($acteurs)>=1){
  $h4="Recherche par acteur(s) pour : ";

  foreach($acteurs as &$acteur){
    $h4 = $h4 . $acteur. ", ";
  }
  $h4 = substr($h4, 0,-2);

  include ('../sql.php');
  $requete = "";



  if(count($acteurs)>=1){
    $requete = "SELECT titre_film, duree_film, annee_film,poster_film,description_film,rating_film, realisateur.nom_personne AS nom_real, GROUP_CONCAT(DISTINCT acteur.nom_personne SEPARATOR ',') AS acteurs, GROUP_CONCAT(DISTINCT genre.nom_genre SEPARATOR ',') AS genres FROM film JOIN realiser ON film.id_film=realiser.id_film JOIN personne AS realisateur ON realiser.id_personne=realisateur.id_personne JOIN jouer ON film.id_film=jouer.id_film JOIN personne AS acteur ON jouer.id_personne=acteur.id_personne JOIN etre_du_genre ON film.id_film=etre_du_genre.id_film JOIN genre ON genre.id_genre=etre_du_genre.id_genre WHERE film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[0]. "%') ";

    if(count($acteurs)>=2){
      $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[1]. "%') ";

    }
    if(count($acteurs)>=3){
      $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[2]. "%') ";

    }
    if(count($acteurs)>=4){
      $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[3]. "%') ";

    }

      // Prepare a select statement
      $sql = $requete . " GROUP BY titre_film";
      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              $result = mysqli_stmt_get_result($stmt);
              $count = mysqli_num_rows($result);}
              if ($count>1){
                $results = $count . " résultats";
              }
              else if($count==1){
                $results = $count . " résultat";;
              }
              else if($count==0){
                $results = "Aucun résultat";;
              }
            }

          }



  }


else{
  $h4="Aucune entrée";
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
      <a class="col-md-3" href="/bddr/acteur"><button class="btn btn-dark">Nouvelle recherche</button></a>
      <div class="col-md-6"></div>
      <?php include '../tri.php';?>
      <div class="col-md-1">

      </div>

    </div>


<?php

include '../headers.html';

include ('../sql.php');
$requete = "";



if(count($acteurs)>=1){
  $requete = "SELECT titre_film, duree_film, annee_film,poster_film,description_film,rating_film, realisateur.nom_personne AS nom_real, GROUP_CONCAT(DISTINCT acteur.nom_personne SEPARATOR ',') AS acteurs, GROUP_CONCAT(DISTINCT genre.nom_genre SEPARATOR ',') AS genres FROM film JOIN realiser ON film.id_film=realiser.id_film JOIN personne AS realisateur ON realiser.id_personne=realisateur.id_personne JOIN jouer ON film.id_film=jouer.id_film JOIN personne AS acteur ON jouer.id_personne=acteur.id_personne JOIN etre_du_genre ON film.id_film=etre_du_genre.id_film JOIN genre ON genre.id_genre=etre_du_genre.id_genre WHERE film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[0]. "%') ";

  if(count($acteurs)>=2){
    $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[1]. "%') ";

  }
  if(count($acteurs)>=3){
    $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[2]. "%') ";

  }
  if(count($acteurs)>=4){
    $requete = $requete . " AND film.id_film IN (SELECT film.id_film FROM film JOIN jouer ON film.id_film=jouer.id_film JOIN personne ON personne.id_personne=jouer.id_personne WHERE personne.nom_personne LIKE '%" . $acteurs[3]. "%') ";

  }


    // Prepare a select statement
    $sql = $requete . " GROUP BY titre_film " . $order;
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters

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
