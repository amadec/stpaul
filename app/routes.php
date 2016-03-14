<?php

// Home page
$app->get('/', function () use ($app) {
    $sejours = $app['dao.sejour']->findAll();
    return $app['twig']->render('index.html.twig', array('sejours' => $sejours));
});


$app->match('/simul', function ( Request $request) use ($app) {
    $simul = new Simul();
    return $app['twig']->render('simul.html.twig', array( 'simul' => $simul));
})->bind('simul');

?>