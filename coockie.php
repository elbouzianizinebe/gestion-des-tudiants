<?php 
$etudiant = $connexion->query(
    "SELECT id, nom, prenom, email, deleted FROM etudiants WHERE deleted = 0"

)->fetchall();
function creercoockies(array $etudiant) {  
          $succes = 'bonjour MS entre mar7baaaa biiik chi kass dyal atay la ??';
          setcookie("isADMIN", $etudiant['id'], [  
        "expires"  => time() + 3600,
        "path"     => "/",
        "httponly" => true]);
          header("Location: /index.php");
  } 


function lireCookieUser() {
    return $_COOKIE[''] ?? '';
}

function supprimerCookieUser() {
    setcookie("dernier_user", "", time() - 3600, "/");
}      
?>