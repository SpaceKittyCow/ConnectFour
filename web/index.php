<?php 
require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function() use($app) { 
$filepath = __DIR__ '../README');
$file = file_get_contents($filepath, true);
return $file; 
}


$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/start/{name}/{color}/{column}', function($color, $name, $column) use($app) {
    $gameBoard = new ConnectFour\GameBoard();
    $user = new ConnectFour\Users($gameBoard, $app->escape($name), $app->escape($color));
    $state = $user->SetPiece($app->escape($column));
    return json_encode($state);
});


//array("state"=>array(), name => string, color => string, column => int);
$app->post('/play', function(Request $request) {
    $data =json_decode($request->getContent(), true);
    $gameBoard = new ConnectFour\GameBoard($data['state']);
    $user = new ConnectFour\Users($gameBoard, $data['name'], $data['color']);
    $column = $data['column'];
    if ($user->getName() == "Computer") {
       $column = $user->decideForMe();
    }
    var_dump($column);
    $state = $user->SetPiece($column);
    return json_encode($state);

});

$app->run();
