
<?php
session_start();
require 'connexion.php';
// require 'login.php';

//if (!empty($_SESSION['id'])) {
   // $erreur = "t2eked mn les donnee";
  //header('Location: index.php');
 //  exit();
//} else {
      // echo "bonjouuur";
  //  }


$erreur = '';
$succes = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']?? '');
    $mdp = $_POST['mdp'];
    
    $stmt = $connexion->prepare("SELECT * FROM etudiants WHERE email like ?");
    $stmt->execute([$email]);
    $etudiant = $stmt->fetch();


        if ($etudiant== null || !password_verify($mdp,$etudiant['mot_de_passe'])) {
             $erreur = "khoya sir b7alk";
        } 
        else {
            session_regenerate_id(true);
            $_SESSION['id'] = $etudiant['id'];
          header("Location: /index.php");
          exit();
        }
       

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>

<body>

    

    <?php if ($erreur): ?>
        <p style="color:red;">
            <?= htmlspecialchars($erreur) ?>
        </p>
    <?php endif; ?>

    <?php if ($succes): ?>
        <p style="color:green;">
            <?= htmlspecialchars($succes) ?>
        </p>
    <?php endif; ?>

    <h2>Login</h2>

    <form method="POST">


        <label>Email :</label>
        <input type="email" name="email" value="" required>
        <br>

        <label>mot de passe :</label>
        <input type="password" name="mdp" pattern="{6,}" minlength="6" required >
        <br>


        <button type="submit">Login</button>

    </form>

</body>
</html>
