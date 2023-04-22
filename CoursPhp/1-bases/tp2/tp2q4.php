<?php
$mails = ['jean@afpa.fr', 'fred@linux.net', 'lea@renault.fr', 'caroline@afpa.fr',
    'contact@afpa-ecole.fr', 'valentina@ferrari.it', 'melanie@afpa-ecole.fr',
    'philippe@afpa.fr', 'typhaine@belfort.fr', 'louis@leparisien.fr'];
foreach ($mails as $m) {
    $d = explode('@', $m)[1];
    if (isset($domaines[$d])) {
        $domaines[$d] ++;
    } else {
        $domaines[$d] = 1;
    }
}
var_dump($domaines);


/*
Le code crée un tableau de chaînes de caractères appelé $mails contenant une liste d'adresses e-mail. Ensuite, il utilise une boucle foreach pour parcourir chaque élément de ce tableau, et pour chaque élément, il extrait le domaine de l'adresse e-mail en utilisant la fonction explode() qui découpe la chaîne à chaque occurrence du caractère "@" et retourne un tableau contenant les parties de la chaîne.

Il stocke ensuite le domaine dans une variable $d, puis vérifie si ce domaine existe déjà dans un autre tableau $domaines en utilisant la fonction isset(). Si le domaine existe déjà, il incrémente sa valeur associée de 1. Sinon, il crée une nouvelle entrée dans le tableau $domaines avec le domaine comme clé et la valeur 1.

À la fin de la boucle foreach, le tableau $domaines contiendra les domaines extraits et le nombre de fois qu'ils apparaissent dans la liste d'adresses e-mail. Enfin, la fonction var_dump() affiche le contenu du tableau $domaines.

Dans l'expression $d = explode('@', $m)[1], le [1] signifie que nous accédons à l'élément situé à l'index 1 du tableau renvoyé par la fonction explode().

La fonction explode() divise une chaîne de caractères en un tableau de chaînes, en utilisant un délimiteur spécifié. Dans ce cas, le délimiteur est le caractère @ et la chaîne à diviser est l'adresse email stockée dans la variable $m.

La fonction explode() retourne un tableau contenant deux éléments: le nom d'utilisateur (avant le caractère @) et le nom de domaine (après le caractère @). En utilisant l'index [1], nous accédons au deuxième élément du tableau (le nom de domaine) et le stockons dans la variable $d.


*/