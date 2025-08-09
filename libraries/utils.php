<?php




// REMPLACER CE FICHIER EN 2 CLASS: RENDERER.PHP ET HTTP.PHP
// render('articles/show);
/*
function render(string $path, array $variables = [])
{
    extract($variables);  // extract(); permet de sortir d'un tableau associatif les infos sous forme de véritables variables

    ob_start();   // à partir de maintenant stocker la suite - ici j'ouvre un tampon pour y mettre ce qui suit
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();   // afficher ce qui est stocké (donc templates/articles/index.html.php   = le corps de la page)

    require('templates/layout.html.php');
}

// redirect(index.php);
function redirect(string $url): void
{
    header("Location: $url");
    exit();
}
*/