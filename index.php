<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
$title = 'Page de message';
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {
$message = clean($_POST['message']);
$errors = textWalid($errors, $message, 'message', 5, 280);
if (count($errors) == 0) {
// insert avec protection des injections SQL
// requète sql pour le formulaire de contact
$sql = "INSERT INTO contact VALUES (null,:message,NOW())";
$query = $pdo->prepare($sql);
$query->bindValue(':message', $message, PDO::PARAM_STR);
$query->execute();
$success = true;
}


}
?>
<div id="balise"></div>
<img src="src/image/rtfm.png" class="img-fluid" alt="image_pour_faire_plaiz_a_ludivine">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
    <li class="nav-item active" ><a class="nav-link" href="showMessage.php">Voir message</a></li>
    </ul>
</nav>
<div class="wrap">
    <div class="contenu">
        <div class="formulaire2">
            <?php if ($success) { ?>
                <p class="success">Merci de nous avoir contacté, nous vous renverrons un mail dans les plus
                    brefs délais</p>
            <?php } else  { ?>
            <p class="h1">Contactez moi !</p>
            <div class="form-group">
                <form action="index.php" method="post" novalidate>
                    <label for="message">Message *</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                    <p class="error"><?php if (!empty($errors['message'])) {
                            echo $errors['message'];
                        } ?></p>
                    <input class="form-control" id="submit" type="submit" name="submitted" value="Envoyer" class="submite">
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <?php } ?>
