<?php

use PHPUnit\Framework\TestCase;
use \ConnectFour\GamePieces;

/**
 * @covers GamePieces
 */
final class GamePiecesTest extends TestCase {

    public function testGetLeftPiecesCount() {
        $gamepieces = new GamePieces(42); 
        $this->assertEquals($gamepieces->getLeftPiecesCount(), (42/2));
    }

    public function testUsePiece() {
        $gamepieces = new GamePieces(42);
        $gamepieces->UsePiece();
        $this->assertEquals($gamepieces->getLeftPiecesCount(), (42/2)-1);
   

        for ( $i=0; $i < ((42/2)-1); $i++) {
            $gamepieces->UsePiece();
        }

        $this->expectExceptionMessage($gamepieces::NOMOREPIECES); 
        $gamepieces->UsePiece();
    }

    public function testGetNumberOfPieces() {
        $board = new GamePieces(42);
        $this->assertEquals($board->getNumberOfPieces(42), '21');

        $board = new GamePieces(49); 
        $this->assertEquals($board->getNumberOfPieces(48), '24');
    }


}
