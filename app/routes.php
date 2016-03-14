<?php

// Home page
$app->get('/', function () use ($app) {
    $sejours = $app['dao.sejour']->findAll();
    return $app['twig']->render('index.html.twig', array('sejours' => $sejours));
});



// Formulaire de simulation
$app->match('/simul', function ( Request $request) use ($app) {
    $simulFormView = null;

    $simul = new Simul();
    $simulForm = $app['form.factory']->create(new SimulType(), $simul);
    $simulForm->handleRequest($request);
    if ($simulForm->isSubmitted() && $simulForm->isValid()) {
        /** TODO les calculs */
        $sejour = $app['dao.sejour']->getSejour($simul->getSejNo());
        $simul->getSejMBI($sejour->getSejMontantMBI());
        $simul->calcul();
        return $app['twig']->render('simulR.html.twig', array('simul' => $simul, 'sejour' => $sejour));
    }
    $simulFormView = $simulForm->createView();

    return $app['twig']->render('simul.html.twig', array(
        'simul' => $simul,
        'simulForm' => $simulFormView));
})->bind('simul');


?>