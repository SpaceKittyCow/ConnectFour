<?php

use PHPUnit\Framework\TestCase;
use \ConnectFour\Users;
use \ConnectFour\GameBoard;
use \ConnectFour\GamePieces;

/**
 * @covers Users
 */
final class UsersTest extends TestCase
{
    public function testSetUserName() {
        $name = 'name';
        $gameBoard = new GameBoard();
        $user = new Users($gameBoard, $name, 'red');
        $this->assertEquals($user->getName(), $name);

        $this->expectExceptionMessage($user::NAMEERROR);
        $userFail = new Users($gameBoard,'','');
    }

   public function testSetColor() {
        $color = 'red';
        $gameBoard = new GameBoard();
        $user = new Users($gameBoard,'name', $color);
        $this->assertEquals($user->getColor(), $color); 

        $this->expectExceptionMessage($user::COLORERROR);
        $userFail = new Users($gameBoard,'name without color','');
    }
    
    public function testDecideForMe(){
        $gameBoard = new GameBoard();
        $user = new Users($gameBoard, 'Computer', 'black');
        $column = $user->decideForMe();
        $this->assertEquals($column, '1');

        for ($i = 1; $i <= 2; $i++) {
            $gameBoard->DropPiece('1', 'blue');
            $gameBoard->DropPiece('2', 'blue');
            $gameBoard->DropPiece('3', 'blue');
            $gameBoard->DropPiece('4', 'blue');
            $gameBoard->DropPiece('5', 'blue');
            $gameBoard->DropPiece('6', 'blue');
            $gameBoard->DropPiece('7', 'blue');
        }

        $column3 = $user->decideForMe(); 
        $this->assertEquals($column3, '3');
    }

    //Integration Test?
}
