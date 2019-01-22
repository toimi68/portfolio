<?php

/**************************************** fonction de debug ****************************************/
function debugV($param)
{
    echo '<pre style="background-color: #ebd4cb;">';
    echo '<strong>var_dump($param)</strong> <br>';
    var_dump($param);
    echo '</pre>';
}

/**************************************** fonction de requete ****************************************/
function executeRequete($requete, $param = array())
{
    if (!empty($param)) { // si j'ai bien recu un array rempli, je peux transformer les caractères spéciaux en entité HTML
        foreach ($param as $indice => $valeur) {
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // pour éviter les injaction CSS et JS
        }
    }
    global $pdo; // permet d'avoir acces (à l'intérieur de la fonction) à la variable $pdo définie dans l'espace global (à l'extérieur de la fonction)
    $resultat = $pdo->prepare($requete); // on prépare la requête fournit lors de l'appel de la fonction
    $resultat->execute($param); // on exécute en liant les marqueurs aux valeurs qui se trouvent dans l'array$param fourni lors de l'appel de la fonction
    return $resultat; // on retourne l'objet pdo statement à l'endroit ou la fonction executeRequete est appelée.
}