<?php
spl_autoload_register(function ($className) {
    // pour le moment classname = Controllers\Article
    // objectif: require = libraries/Controllers.Article.php

    $className = str_replace("\\", "/", $className); // on remplace \ par /

    require_once("libraries/$className.php");
});
