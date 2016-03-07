<?php


function getAllSejours()
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdstpaul;charset=utf8', 'root');
    return $bdd->query('select * from sejour order by sejno');
}

?>