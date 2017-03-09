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

    //Integration Test?
}
