<?php $resume = "<div class='col-md-1' style='text-align:center;'><button class='btn btn-dark col-md-12' type='button' data-toggle='collapse' data-target='#collapsesummary". $i ."' aria-expanded='false' aria-controls='collapsesummary" . $i ."'>+</button></div>";


$acteurs = explode(",", ucwords($row["acteurs"]));
$actstr = "";
foreach ($acteurs as &$acteur){
  $actstr = $actstr . "<a target='_blank' href='https://en.wikipedia.org/wiki/". str_replace(' ', '_', $acteur) . "'>" . ucwords($acteur)."</a>, ";
}
$actstr = substr($actstr, 0, -2);

$genres = explode(",", $row["genres"]);
$gstr = "";
foreach ($genres as &$genre){
  $gstr = $gstr . "<a href='/bddr/genre/search.php?genre1=". $genre . "'>" . ucwords($genre)."</a>, ";
}
$gstr = substr($gstr, 0, -2);
echo "<div class='row pt-3 mt-3 pb-3 mb-3' style='border-top: 1px solid black;'>";
echo ("<div class='col-md-1' style='text-align:left;'><img src='" . $row["poster_film"]."' style='border-radius:5px;width:100%;max-width:100px;'></div>");
echo ("<div class='col-md-3 pl-5' style='text-align:left;'><a target='_blank' href='https://en.wikipedia.org/wiki/". str_replace(' ', '_', $row["titre_film"]) . "'><strong>" . ucwords($row["titre_film"])."</strong></a></div>");
echo "<div class='col-md-1'style='text-align:left;'>" . ucwords($row["annee_film"])."</div>";
echo "<div class='col-md-1'style='text-align:left;'>" . ucwords($row["duree_film"])."\"</div>";
echo "<div class='col-md-1'style='text-align:left;'><a target='_blank' href='https://en.wikipedia.org/wiki/". str_replace(' ', '_', $row["nom_real"]) . "'>" . ucwords($row["nom_real"])."</a></div>";
echo "<div class='col-md-2'style='text-align:left;'>" . $actstr ."</div>";
echo "<div class='col-md-1'style='text-align:left;'>" . $gstr ."</div>";
echo "<div class='col-md-1'style='text-align:left;'><strong>" . $row["rating_film"] ."</strong></div>";
echo $resume;
echo "<div class='collapse mt-2' id='collapsesummary".$i."'><div class='card card-body '>" . $row["description_film"] . "</div></div>";
echo "</div>";
$i = $i + 1;
?>
