<!doctype html>
<html>
    <head>
        <title>Suppresion d'un forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    </head>

    <?php



    ?>


   <body>
   <p><h1>Supprimer le client :</h1></p><BR/>
    <form action="index.php?uc=supprimerClient&action=confirmsupprCLient" method="post">

        <table>
        <tbody>
        <tr><td>Id du forfait</td><td><input name="idForfait" Type ="hidden" value="<?php echo $idForfait ?>" size=20 readonly></td></tr>
            <tr><td>libelleForfait </td><td><input name="libelleForfait" value="<?php echo $libelleForfait ?>" size=20 readonly></td></tr>
            <tr><td>Année</td><td><input name="annee" value="<?php echo $annee ?>" size=50 readonly></td></tr>
            <tr><td>qte</td><td><input name="mois" value="<?php echo $mois ?>"size=5 readonly></td></tr>
            <input type="hidden" name="numC" value="<?php echo $numS ;?>"/>
        </tbody>
        </table>
        <br/>
        <input type="submit" value="Valider">
    </form>
 

    </body>
</html>