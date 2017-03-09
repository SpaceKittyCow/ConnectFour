<?php 
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/hello2/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/colorCheck/{color}/', function($color) use($app) {
$gameBoard = new ConnectFour\GameBoard();
$color = $app->escape($color);
$user = new ConnectFour\Users($gameBoard, 'unknown', $color);
$row = $user->SetPiece('6');
return $row;
});

$app->run();
