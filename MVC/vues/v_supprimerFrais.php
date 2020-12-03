<!doctype html>
<html>
    <head>
        <title>Suppresion d'un forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    </head>



   <body>
   <p><h1>Supprimer le client :</h1></p><BR/>
    <form action="index.php?uc=supprimerClient&action=confirmsupprCLient" method="post">

        <table>
        <tbody>
            <input Type="hidden" name="idForfait" value="<?php echo $id ?>">
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <tr><td>libelle du Forfait </td><td><input name="libelleForfait" value="<?php echo $libelle?>" size=20 readonly></td></tr>
            <tr><td>Année</td><td><input name="annee" value="<?php echo $annee ?>" size=5 readonly></td></tr>
            <tr><td>quantitée</td><td><input name="mois" value="<?php echo $mois ?>"size=5 readonly></td></tr>
        </tbody>
        </table>
        <br/>
        <input type="submit" value="supprimer le forfait">
    </form>
 

    </body>
</html>