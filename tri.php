<form class="col-md-3">
    <select class="form-control" name='order' onchange="transferttri(document.querySelector('select').value)">
         <option value="" selected disabled>


           <?php    //order
               $tri =  $_COOKIE['tri'];

               if($tri=="Titre"){
                 $order = "ORDER BY titre_film";
                 echo "Trié par titre";
               }
               else if($tri=="Année"){
                 $order = "ORDER BY annee_film";
                 echo "Trié par année";
               }
               else if($tri=="Durée"){
                 $order = "ORDER BY duree_film";
                 echo "Trié par durée";
               }
               else if($tri=="Réalisateur"){
                 $order = "ORDER BY realisateur.nom_personne";
                 echo "Trié par réalisateur";
               }
               else if($tri=="Note"){
                 $order = "ORDER BY film.rating_film DESC";
                 echo "Trié par note";
               }
               else{
                 $order = "";
                 echo "Trier par";
               }
         ?>


         </option>
         <option value='Titre'>Titre (A-Z)</option>
         <option value="Réalisateur">Réalisateur (A-Z)</option>
         <option value='Année'>Année (croissant)</option>
         <option value='Durée'>Durée (croissant)</option>

         <option value="Note">Note (décroissant)</option>

    </select
    <input type="hidden" id="tri" name="tri"/>
    <script>
      function transferttri(pT){
        var str1 = "tri=";
        document.cookie = str1.concat(pT);
        location.reload();
      }

    </script>

</form>
