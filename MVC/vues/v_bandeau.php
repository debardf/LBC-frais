<body >
	<nav>
            
        <ul>
            <li><a href="./?index.php">Accueil</a></li> 
            <li><a href="./index.php?uc=frais">Frais</a></li>
            <li><a href="./index.php?uc=echantillons">Echantillons</a></li>
            <li><a href="./index.php?uc=practiciens">Practiciens</a></li>
            <li><a href="./index.php?uc=carrieres">Carrières</a></li>
            <li><a href="./index.php?uc=visite">Visite</a></li>
            <li><a href="./index.php?uc=administration">Administration</a>
            <?php if(isset($_SESSION['idClient']))
{
    ?>
    <li><a class="metadata" href="index.php?uc=frais&ucf=deconnexion">Deconnexion </li></a>
    <?php
}
?>
		</ul>

</nav>
</body>
</br>