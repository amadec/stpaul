<?php


function getSejour($bdd)
{
    return $bdd->query('select * from sejour order by sejno');
}

?>