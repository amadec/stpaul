<?php

$bdd = new PDO('mysql:host=localhost;dbname=bdstpaul;charset=utf8', 'root');

include_once "model.php";

$sejours = getSejour($bdd);

include_once "view.php";

?>


