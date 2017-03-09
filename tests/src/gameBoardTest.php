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
        $row = $board->DropPiece('7', 'blue');
        $this->assertEquals($row, '1');

        for ($i = 1; $i <= 5; $i++) {
            $lastRow = $board->DropPiece('7', 'blue');
        }

        $this->assertEquals($lastRow, '6');
        $this->expectExceptionMessage($board::NOMOREHOLES);  
        $board->DropPiece('7', 'blue');  
    }

    public function testDropPieceColumnValidate () {

        $board2 = new GameBoard();
        $this->expectExceptionMessage($board2::NOTCOLUMN);  
        $row = $board2->DropPiece('100', 'blue');
    } 
    
}
