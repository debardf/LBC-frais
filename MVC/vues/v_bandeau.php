<!DOCTYPE html>
<html>
<head>
    <title></title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../util/cssGeneral.css">

</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./?index.php">LBC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-item nav-link active" href="./?index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
       <a class="nav-item nav-link" href="./index.php?uc=frais">Frais</a>
      </li>
      <li class="nav-item">
         <a class="nav-item nav-link" href="./index.php?uc=echantillons">Echantillons</a>
      </li>
      <li>
           <a class="nav-item nav-link" href="./index.php?uc=practiciens">Practiciens</a>
      </li>
      <li>
        <a class="nav-item nav-link" href="./index.php?uc=carrieres">Carrières</a>  
      </li>
      <li>
        <a class="nav-item nav-link" href="./index.php?uc=visite">Visite</a>  
      </li>
      <li>
            <a class="nav-item nav-link" href="./index.php?uc=administration"> Administration</a>
      </li>
<?php if(isset($_SESSION['idClient']))
      {
    ?>
    <li>
    <a class="nav-item nav-link" href="index.php?uc=frais&ucf=deconnexion">Déconnexion</a>
    
</li>
    </ul>
    <span class="navbar-text">
      Bonjour <?php echo $_SESSION['prenom']," ",$_SESSION['nom']?>
    </span>
    <?php
}
?>
  </div>
</nav>
</br>


</body>
</html>