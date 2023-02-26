<?php
// Exercice1
    for($n=0; $n<10; $n++){
        echo"Je dois faire des sauvegardes régulières de mes fichiers.<br>";
    }
// Exercice2
   for($i=1; $i<=15; $i+=2) {
        echo"$i\t";
   } 
   echo"<br>";
// Exercice3
   $n=10*5;
   echo"$n";
   echo"<br>";
//retourne le siècle
function voirSiecle($annee) {
    // Vérifie si l'année est un nombre positif non nul
    if (!is_numeric($annee) || $annee <= 0) {
        return "Veuillez saisir une année valide";
    }
    
    // Calcule le siècle
    $siecle = ceil($annee / 100);
    
    // Ajoute le suffixe approprié pour le siècle en fonction de sa valeur
    switch ($siecle) {
        case 11:
        case 12:
        case 13:
            $suffix = "ème";
            break;
        default:
            switch ($siecle % 10) {
                case 1:
                    $suffix = "er";
                    break;
                case 2:
                    $suffix = "ème";
                    break;
                case 3:
                    $suffix = "ème";
                    break;
                default:
                    $suffix = "ème";
                    break;
            }
            break;
    }
    
    // Retourne le siècle avec le suffixe approprié
    return $siecle . $suffix;
}
echo voirSiecle(2023);
echo voirSiecle(1789);
echo voirSiecle(200);
echo voirSiecle("abc");
echo "<br>";
//true ou false pour un palindrome
function est_palindrome($chaine) {
    return $chaine === strrev($chaine);
}
echo est_palindrome("kayak");
echo est_palindrome("bonjour");
echo "<br>";
//multiple adjacent
function plusGrandMultiple($array)
{
    $count=count($array);
    $max = 0;
    for($i=0; $i<($count-1); $i++)
    {
        $nbr = $array[$i]* $array[$i+1];
        if( $nbr > $max)
        {
            $max = $nbr; 
        }
    }
    echo $max;
}

plusGrandMultiple([3, 6, -2, -5, 7, 3]);
echo "<br>";
//adresse ip
$ip = $_SERVER['REMOTE_ADDR'];
echo "Adresse IP du client : " . $ip;
echo "<br>";
//variables title h3 et ancre
$text = 'PHP Tutorial';
$textTitle = 'PHP Tutorial';
//change la première lettre du mot
$text = preg_replace('/(\b[a-z])/i','<span style="color:red;">\1</span>',$text);
/*
//envoi son nom au serveur
$nom = '';

if (isset($_POST['nom'])); {
    if (isset($_POST[$nom]))
        echo "$nom";
}
//Le même mais cette fois PHP récupère l'IP du client
if (isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']) && addslashes($_POST['prenom']);
    $ip_address = $_SERVER['REMOTE_ADDR'];



    echo $nom . "$prenom ton IP est " . $ip_address . '<button onclick="document.location.href= "./page2.html">click</button>';
      $server_info = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
    $browser = get_browser(null, true);
    if ($ip_adress == TRUE && $browser == TRUE) {
        echo 'tu peux continuer';
    }

    // par sécurité nettoie la chaîne GET entrante
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    if ($nom) {
        echo 'ok';
    }
}*/
//tableau nom salaire
$t = [ 
    ['Joe', 1255],
    ['Bill', 1275],
    ['Pierre', 1200],
    ['François', 2650],
];
$html = '<table border="1"><tr><th>Nom</th><th>Salaire</th>' ;
foreach($t as $ligne)
{
    $html .= "<tr><td>$ligne[0]</td><td>$ligne[1]</td></tr>";
}
$html .= "</table>";

echo $html;
//email valide ou invalide
$email = "joe@domaine.fr";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
     echo '"' . $email . '" = Valide'."\n";
}
else 
{
     echo '"' . $email . '" = Invalide'."\n";
}
echo "<br>";
//language leet
$texte = "Le message a traduire en language leet";
$texte = str_replace('a','4',$texte);
$texte = str_replace('e','3',$texte);
$texte = str_replace('o','0',$texte);
$texte = str_replace('s','5',$texte);
$texte = str_replace('\n','<br>',$texte);
$texte = str_replace('i','1',$texte);
echo $texte;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$textTitle";?></title>
</head>
<body>
    <h3><?php echo "$text";?></h3>
    <p>Lorem, ipsum <?php echo "$text";?> sit amet consectetur adipisicing elit. Debitis optio, quam laboriosam nostrum illo similique dolorem vel et sint voluptates consectetur possimus consequatur. Delectus ab eos minus omnis officia sint.
    </p>
    <form action="ex11.php" method="post">
        Nom: <input type="text" name="nom" /><br>

        <input type="submit" value="Envoyer" />
    </form>
    <form action="ex12.php" method="post">
    Nom: <input type="text" name="nom" /><br>
    Prenom: <input type="text" name="prenom" /><br>

    <input type="submit" value="Envoyer" />
</form>
</body>
</html>
<?php
//detection navigateur
echo "Your User Agent is :" . $_SERVER ['HTTP_USER_AGENT'];
/*
//Exercice 15
$url = "https://amoureux-du-monde.com/";
$html2 = file_get_contents($url);
echo "<pre>" . htmlspecialchars($html2) . "</pre>";
*/
//dernière modification
$current_file_name = basename($_SERVER['PHP_SELF']);
$file_last_modified = filemtime($current_file_name); 
echo "Dernière modification " . date("F d Y H:i:s.", $file_last_modified)."\n";
//compte les nombres de lignes dans un fichier
$nomfichier = "example.txt";
$nblignes = 0;

$fichier = fopen($nomfichier, "r");
if ($fichier) {
    while (($ligne = fgets($fichier)) !== false) {
        $nblignes++;
    }
    fclose($fichier);
    echo "Le fichier $nomfichier contient $nblignes lignes.<br>";
} else {
    echo "Impossible d'ouvrir le fichier $nomfichier.<br>";
}
echo "<br>";
//ecrire la version
echo PHP_VERSION;
echo "<br>";
//plus grand que
$num = 25;
$a = ($num > 10) ? 'supérieur à 10' : '';
$a = ($num > 20) ? 'supérieur à 20' : $a;
$a = ($num > 30) ? 'supérieur à 30' : $a;
echo $a;
echo "<br>";
//serveur local?
if($_SERVER['REMOTE_ADDR']=='::1') echo 'en local';
echo "<br>";
//ecrire les mots en chiffre
$correspondance = array(
    "zéro" => 0,
    "un" => 1,
    "deux" => 2,
    "trois" => 3,
    "quatre" => 4,
    "cinq" => 5,
    "six" => 6,
    "sept" => 7,
    "huit" => 8,
    "neuf" => 9
);

$entree = "zéro;trois;cinq;six;huit;un";
$mots = explode(";", $entree);

$sortie = "";
foreach ($mots as $mot) {
    $chiffre = $correspondance[$mot];
    $sortie .= $chiffre;
}

echo $sortie;
echo "<br>";
//enleve les doubles
$d=[1,1,2,2,3,4,5,5];
function noDouble($d){
    $uniqueNb=array_unique($d);
    return $uniqueNb;      
}
print_r(noDouble($d));
echo "<br>";
//mesure la taille d'un fichier
if (file_exists($nomfichier)) {
    $taille = filesize($nomfichier);
    echo "La taille du fichier $nomfichier est de $taille octets.<br>";
} else {
    echo "Le fichier $nomfichier n'existe pas.<br>";
}
echo "<br>";
//multiplication jusqua 6*6
echo "<table border=1>";

for ($i = 1; $i <= 6; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 6; $j++) {
        $produit = $i * $j;
        echo "<td>$produit</td>";
    }
    echo "</tr>";
}

echo "</table>";
echo "<br>";
//presque egal
function presque_egal($nbr1, $nbr2, $epsilon = 0.001)
{
   echo (abs($nbr1 - $nbr2) < $epsilon) ? 1 : 0;

}

presque_egal(9.0, 9.00001);

echo "<br>";

presque_egal(10.0, 15.0, 2);
echo "<br>";
//supprime jean et ajoute 24 a $id
$exemple = "Jean24";
$id = str_replace("Jean", "", $exemple);

echo "La chaîne d'origine est : $exemple<br>";
echo "La chaîne sans 'Jean' est : $id<br>";
//cree une page html avec liens hypertext
$nomfichier = "URLs.txt";

if (file_exists($nomfichier)) {
    $contenu = file_get_contents($nomfichier);
    $urls = explode("\n", $contenu);

    echo "<html><head><title>Liens</title></head><body>";
    foreach ($urls as $url) {
        echo "<a href='$url'>$url</a><br>";
    }
    echo "</body></html>";
} else {
    echo "Le fichier $nomfichier n'existe pas.<br>";
}
//formulaire avec vérification d'identité
// Définir les informations de login et de mot de passe pour chaque utilisateur
$utilisateurs = array(
    "paul" => "69fc0e98cc31c372fc8b1d56b90e450b", // mot de passe "pass"
    "Joe" => "2b2c0b6423aefd903c64531b175a1a7c", // mot de passe "truc"
);

// Vérifier si le formulaire a été soumis
if (isset($_POST["login"]) && isset($_POST["motdepasse"])) {
    // Récupérer les valeurs soumises par l'utilisateur
    $login = $_POST["login"];
    $motdepasse = $_POST["motdepasse"];

    // Obfusquer le mot de passe soumis avec une fonction de hachage non réversible
    $motdepasse_obfusque = md5($motdepasse);

    // Vérifier si l'utilisateur est reconnu
    if (isset($utilisateurs[$login]) && $utilisateurs[$login] == $motdepasse_obfusque) {
        // Afficher un message d'accueil si l'utilisateur est reconnu
        echo "Bienvenue $login<br>";
    } else {
        // Afficher le formulaire à nouveau si l'utilisateur n'est pas reconnu
        echo "Identifiant ou mot de passe incorrect<br>";
        afficher_formulaire();
    }
} else {
    // Afficher le formulaire par défaut si aucune valeur n'a été soumise
    afficher_formulaire();
}

// Définir une fonction pour afficher le formulaire
function afficher_formulaire() {
    echo "<form method='post'>";
    echo "Login : <input type='text' name='login'><br>";
    echo "Mot de passe : <input type='password' name='motdepasse'><br>";
    echo "<input type='submit' value='Se connecter'>";
    echo "</form>";
}
?>