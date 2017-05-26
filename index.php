<?php
if (file_exists('source.xml')) {  // on vérifie si le fichier existe
    $xml = simplexml_load_file('source.xml'); //  ds la variable $xml, on charge le fichier xml
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projet PHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>

        <ul>
            <?php
            foreach ($xml->page as $page) {  // boucle qui parcourt le fichier xml et recup chaque enfant ds le parent
                ?><li><a href="<?= $page['id'] ?>.html"><?= $page->menu ?></a></li> <!--  on récup les id pr chaque lien.-->
            <?php }
            ?>
        </ul>
        <?php
        if (isset($_GET['p'])) {// on vérifie que ca existe et que c'est correct. 
            $page = $_GET['p'] - 1;  // on stocke le GET dans une variable. le -1 pour commencer a 1 sinon on commencerai à 0. 
            echo $xml->page[$page]->content;  // on affiche le contenu . 
        }
        ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>