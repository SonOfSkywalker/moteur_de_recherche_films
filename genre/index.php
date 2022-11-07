<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>





  <link rel="stylesheet" href="css/main.css">


<meta charset="UTF-8">
<title>Movie Database Search</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>



<body>
  <div class="container-fluid">
    <div class="container">

    <div class="row pt-3 pb-3" style="margin-bottom:50px;">
      <h2 class="col-md-12"><a style="text-decoration:none;color:black;"href="/bddr">Movie Database Search</a></h2>

    </div>
    <div class="row" style="margin-bottom:50px;">
      <h3 class="col-md-12">Recherche par genre(s) :</h3>
    </div>

    <form class=""method="GET" action="search.php">
    <div class="row form-group" >
      <select class="form-control col-md-3 mr-1 mb-3" name='genre1'>
           <option value="" selected disabled>Genre 1</option>


           <?php
          include ('../sql.php');
               // Prepare a select statement
               $sql = "SELECT DISTINCT nom_genre FROM genre ORDER BY nom_genre";


               if($stmt = mysqli_prepare($link, $sql)){


                   // Attempt to execute the prepared statement
                   if(mysqli_stmt_execute($stmt)){
                       $result = mysqli_stmt_get_result($stmt);

                       // Check number of rows in the result set
                       if(mysqli_num_rows($result) > 0){
                           // Fetch result rows as an associative array
                           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                               echo "<option value='" . $row["nom_genre"] . "'>" . $row["nom_genre"] . "</option>";
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


           // close connection
           mysqli_close($link);
           ?>





             </select>
             <select class="form-control col-md-3 mr-1 mb-3" name='genre2'>
                  <option value="" selected disabled>Genre 2</option>


                  <?php
                  include ('../sql.php');
                      // Prepare a select statement
                      $sql = "SELECT DISTINCT nom_genre FROM genre ORDER BY nom_genre";


                      if($stmt = mysqli_prepare($link, $sql)){


                          // Attempt to execute the prepared statement
                          if(mysqli_stmt_execute($stmt)){
                              $result = mysqli_stmt_get_result($stmt);

                              // Check number of rows in the result set
                              if(mysqli_num_rows($result) > 0){
                                  // Fetch result rows as an associative array
                                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                      echo "<option value='" . $row["nom_genre"] . "'>" . $row["nom_genre"] . "</option>";
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


                  // close connection
                  mysqli_close($link);
                  ?>





                    </select>
                    <select class="form-control col-md-3 mr-1 mb-3" name='genre3'>
                         <option value="" selected disabled>Genre 3</option>


                         <?php
                      include ('../sql.php');
                             // Prepare a select statement
                             $sql = "SELECT DISTINCT nom_genre FROM genre ORDER BY nom_genre";


                             if($stmt = mysqli_prepare($link, $sql)){


                                 // Attempt to execute the prepared statement
                                 if(mysqli_stmt_execute($stmt)){
                                     $result = mysqli_stmt_get_result($stmt);

                                     // Check number of rows in the result set
                                     if(mysqli_num_rows($result) > 0){
                                         // Fetch result rows as an associative array
                                         while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                             echo "<option value='" . $row["nom_genre"] . "'>" . $row["nom_genre"] . "</option>";
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


                         // close connection
                         mysqli_close($link);
                         ?>





                           </select>

      <div class="col-md-2 col-xs-6 mb-3" >
        <button style="width:100px;" type="submit" class="btn btn-dark">Valider</button>
      </div>
      </div>
      <form method="GET" action="genre.php">
    </div>
  </div>
</body>
</html>



<!-- Bootstrap core JS-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://prcmfilms.fr/fiverr/template1/js/scripts.js"></script>
