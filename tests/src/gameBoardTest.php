<?php

use PHPUnit\Framework\TestCase;
use \ConnectFour\GameBoard;

/**
 * @covers GameBoard
 */
final class GameBoardTest extends TestCase {

    public function testGetTotalHoles() {
        $board = new GameBoard();
        $this->assertEquals($board->getTotalHoles(), '42');

        $board = new GameBoard(8,9); 
        $this->assertEquals($board->getTotalHoles(), '72');
    }

    public function testDropPiece() { 
        $board = new GameBoard();
    }
}
