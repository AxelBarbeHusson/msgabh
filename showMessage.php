<?php
session_start();
require('inc/pdo.php');
require('function/function.php');

$sql = "SELECT * FROM Contact";
$query = $pdo->prepare($sql);
$query->execute();
$msginfos = $query->fetchAll();
//debug($msginfos);
//echo sizeof($msginfos)?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
        <li class="nav-item active"><a href="index.php" class="nav-link">Formulaire</a></li>
    </ul>
</nav>
    <table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Message</th>
        <th scope="col">Created-At</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($msginfos as $msginfo) {
    echo '<tr>';
    echo '<th scope="row">' . $msginfo->id . '</th>';
    echo '<td>' . $msginfo->message . '</td>';
    echo '<td>' . $msginfo->createdAt . '</td>';
    echo '</tr>';
}
