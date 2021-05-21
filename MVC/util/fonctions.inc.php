<?php

function redirect($url, $postValues){
    echo '<form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">';
    
    foreach ($postValues as $key => $value) {
        echo('<input type="hidden" name="' . $key . '" value="' . $value .'">');
    }
    echo('<input id="post_submit" type="submit"/>');
    echo('</form>');
    echo("<script>let bouton = document.getElementById('post_submit'); bouton.click();</script>");
}

?>