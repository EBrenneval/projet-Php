<?php
// Si le fichier source.xml existe
if (file_exists('source.xml')) {
    // On le charge dans la variable $xml
    $xml = simplexml_load_file('source.xml');
}
$nodeNb = 0;
if(!empty($_GET['p'])){
    $nodeNbTemp = strip_tags($_GET['p']);
    if(is_numeric($nodeNbTemp) && $nodeNbTemp <= count($xml->page)){
        $nodeNb = intval($nodeNbTemp) - 1;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php
                // On affiche le bon titre en sélectionnant avec la valeur de $nodeNb
                echo $xml->page[$nodeNb]->title;
            ?>
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#buttons_navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Projet PHP</a>
                </div>
                <div class="collapse navbar-collapse" id="buttons_navbar">
                    <ul class="nav navbar-nav">
                        <?php
                        // Pour chaque page dans la tableau page du tableau xml
                        foreach ($xml->page as $page) {
                            ?>
                            <!-- On affiche un li avec les bonnes données -->
                            <li><a href="<?= $page['id'] ?>.html"><?= $page->menu; ?></a></li><?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
            // On affiche le bon contenu en sélectionnant la page avec l'id qui est la valeur de $nodeNb
            echo $xml->page[$nodeNb]->content;
        ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>