<?php 

namespace ConnectFour;

class GameBoard {

    private $rows;

    private $columns;

    private $board = array();

    function __construct($rows = 6, $columns = 7) {
       $this->rows = $rows;
       $this->columns = $columns;
       $this->initalizeGameBoard();
    } 

    public function initalizeGameBoard () { 
        for ($i = 0; $i >= $this->rows; $i++) {
            $this->board[]= $array();
	}
    }

    public function getTotalHoles() {
       return ($this->rows * $this->columns);
    }

    public function DropPiece($column, $color) {

    } 

    public function GetWholeBoard() {

    }

} 
