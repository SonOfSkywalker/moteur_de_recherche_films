<?php
include_once('simple_html_dom.php');
function getPoster($name){

$search_keyword= $name . " Poster+imagesize:400x600";
$search_keyword=str_replace(' ','+',$search_keyword);
$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));
$newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch",false,$context);
$result_image_source = $newhtml->find('img', 1)->src;
return $result_image_source;
//echo "<img src='".$result_image_source."' style='border-radius:5px;' width-max='30px'>";
}








include('sql.php');



$sql = "SELECT titre_film,id_film from film WHERE titre_film='Lída Baarová'";

if($stmt = mysqli_prepare($link, $sql)){


    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        // Check number of rows in the result set
        if(mysqli_num_rows($result) > 0){
            // Fetch result rows as an associative array
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            echo ("UPDATE film SET poster_film='" . getPoster($row["titre_film"]). "' WHERE id_film=" . $row["id_film"] . ";<br>");



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



?>
