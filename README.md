# cours-sessions-et-cookies

## LES SESSIONS

- Une session en PHP correspond à une façon de stocker des informations/données en utilisant un identifiant de session unique

- Les sessions, contrairement aux cookies, sont des fichiers texte stockés sur le serveur

- Cela permet donc aux sites web ou aux application de "reconnaître" l'utilisateur et récupérer des informations spécifiques le concernant (par exemple : un identifiant | un panier | des préférences | des recherches , etc ...)

- Dans un système basé sur les sessions, chaque client est identifié par un numéro (identifiant de session) et ce numéro unique est utilisé par le serveur pour relier chaque client à ses informations. 

- Chaque fois qu'un utilisateur visite le site web ou l'application, le serveur "lit" l'identifiant de session et restitue les informations stockées sur le serveur en fonction de cet identifiant

- Dans ce type de système, en fonction de nos paramétrages, les informations que nous "stockons" sur le client, peuvent être enregistrées dans une base de données, ou un fichier de texte.

- L'identifiant unique de session est appelé PHPSESSIONID. On le retrouve sur le client dans la partie "Cookies" => cf votre Inspecteur dans vos outils Dev du navigateur

- Pour démarrer une session sous PHP, j'utilise la fonction session_start() tout en haut de mon script (= de mon fichier). Et dès que je veux utiliser ma super globale de session $_SESSION, sur n'importe quel autre fichier, il faut absolument qu'en haut de ce fichier j'ai l'appel à la fonction session_start

- Pour supprimer une session , je "vide" les valeurs contenues dans mon tableau associatif de $_SESSION grâce à la fonction unset(). Exemple unset($_SESSION['name']). Et enfin j'utiliste la fonction session_destroy(). 

- La durée de vie d'une session dépend de comment on l'a configuré. Par défaut, lors de l'installation de PHP, la durée d'une session est souvent de 24 minutes. 

- Pour modifier la durée de vie d'une session, plusieurs moyens : 
1) modifier dans le fichier de configuration de PHP sur mon serveur (donc le fichier php.ini), la variable session.lifetime ou la variable session.gc_maxlifetime
https://www.php.net/manual/fr/session.configuration.php#ini.session.gc-maxlifetime

2) dans son script, on peut utiliser la fonction session_set_cookie_params()
https://www.php.net/manual/fr/function.session-set-cookie-params.php

- Attention quand on modifie la durée de vie de sa session, à bien considérer et mesurer les risques en termes de cybersécurité au regard des avantages en termes de fonctionnalité. 


## LES COOKIES

- Le cookie est un petit fichier texte (max 65 ko) stocké sur la machine cliente

- Pour retrouver les différents cookies, je vais dans mes DevTools, onglet "Application". Il existe deux types de cookies, 
1) les cookies dits "propriétaires", exemple je suis sur le site www.lemonde.fr et le domain du cookie est lemonde.fr
2) les cookies dits "tiers ou service tiers" : ce sont des cookies installés par des outils (souvent de type marketing) qui sont utilisés par le site mais dont le site n'est pas le concepteur ou le propriétaire, exemple je suis sur le site www.lemonde.fr et le domain du cookie est twitter.com

- Pour créer un cookie, j'utilise la fonction setcookie() https://www.php.net/manual/fr/function.setcookie.php
exemple : setcookie("prenom", "Mathilde").
Dans l'exemple ci-dessus mon cookie ne stocke "qu'une donnée" mais je peux aussi stocker plusieurs données via un tableau associatif, exemple : 
$donnees_a_enregister = ['couleur' => 'bleu', 'preference' => 'chocolat', 'compagnie'=>'chien'];
foreach($donnee_a_enregister as $key=>$value){
    setcookie("identification[$key], $value);
}

- Pour supprimer un cookie, on réutilise setcookie() avec le même nom du cookie qu'on veut supprimer mais on ne lui associe aucune valeur. 
setcookie("preference");


