<?php
include ('../sql.php');


if(isset($_REQUEST["realisateur"])){
    // Prepare a select statement
    $sql = "SELECT DISTINCT nom_personne FROM realiser JOIN personne ON realiser.id_personne=personne.id_personne WHERE nom_personne LIKE '% ". $_REQUEST["realisateur"] ."%' OR  nom_personne LIKE '". $_REQUEST["realisateur"] ."%' ORDER BY nom_personne";


    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters

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
