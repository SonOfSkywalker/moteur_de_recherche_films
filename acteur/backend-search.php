<?php
include ('../sql.php');

if(isset($_REQUEST["acteur"])){
    // Prepare a select statement
    $sql = "SELECT DISTINCT nom_personne FROM jouer JOIN personne ON jouer.id_personne=personne.id_personne WHERE nom_personne LIKE '% ". $_REQUEST["acteur"] ."%' OR  nom_personne LIKE '". $_REQUEST["acteur"] ."%' ORDER BY nom_personne";


    if($stmt = mysqli_prepare($link, $sql)){


        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["nom_personne"] . "</p>";
                }
            } else{
                echo "<p>Aucune correspondance</p>";
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
