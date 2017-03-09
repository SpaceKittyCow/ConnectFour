<?php 
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/hello2/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/play/{color}/', function($color) use($app) {
$gameBoard = new ConnectFour\GameBoard();
$color = $app->escape($color);
$user = new ConnectFour\Users($gameBoard, 'unknown', $color);
var_dump($user); 
$state = $user->SetPiece('6');
var_dump(json_encode($state));
});



$app->run();
