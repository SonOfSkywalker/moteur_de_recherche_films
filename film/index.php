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
<style>

    /* Formatting search box */
    .search-box{
        width: 100%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 100%;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;
        z-index: 999;
        top: 100%;
        left: 5%;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting film items */
    .result p{
        width: 90%;
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background: #ffffff;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var filmDropdown = $(this).siblings(".film");
        if(inputVal.length){
            $.get("backend-search.php", {film: inputVal}).done(function(data){
                // Display the returned data in browser
                filmDropdown.html(data);
            });
        } else{
            filmDropdown.empty();
        }
    });

    // Set search input value on click of film item
    $(document).on("click", ".film p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".film").empty();
    });
});
</script>
</head>



<body>
  <div class="container-fluid">
    <div class="container">

    <div class="row pt-3 pb-3" style="margin-bottom:50px;">
      <h2 class="col-md-12"><a style="text-decoration:none;color:black;"href="/bddr">Movie Database Search</a></h2>

    </div>
    <div class="row" style="margin-bottom:50px;">
      <h3 class="col-md-12">Recherche par titre :</h3>
    </div>

    <form method="post" action="search.php">
    <div class="row" >


      <div class="search-box col-md-6 col-xs-6 mb-3">
          <input type="text" autocomplete="off" name="film" placeholder="Entrez le nom d'un film"/>
          <div class="result film"></div>
      </div>
      <div class="col-md-6 col-xs-6 mb-3" >
        <button style="width:100px;" type="submit" class="btn btn-dark">Valider</button>
      </div>
      </div>
      <form method="post" action="search.php">
    </div>
  </div>
</body>
</html>



<!-- Bootstrap core JS-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://prcmfilms.fr/fiverr/template1/js/scripts.js"></script>
