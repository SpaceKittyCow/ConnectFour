<?php 
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$gameBoard = new ConnectFour\GameBoard();
$user = new ConnectFour\Users($gameBoard,'unknown','red');
$computer = new ConnectFour\Users($gameBoard,'Computer','black');

$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/play/{color}/{column}', function($color, $column) use($app, $user) {
    $user->setColor($app->escape($color));
    $row = $user->SetPiece($app->escape($column));
    $colorCheck = $user->getColor();
    return $row;
});

$app->run();
