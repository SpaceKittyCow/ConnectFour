<?php 

namespace ConnectFour;

class GamePieces {

    private $totalPiecesPerPlayer;

    private $piecesUsed = 0; 

    const NOMOREPIECES = 'You have no more game pieces left';

    function __construct($totalHoles) {
    $this->totalPiecesPerPlayer = ($this->getNumberOfPieces($totalHoles)); 
    } 

    public function getLeftPiecesCount() {
        return ($this->totalPiecesPerPlayer - $this->piecesUsed);
    }

    public function UsePiece() {
       if ($this->piecesUsed >= $this->totalPiecesPerPlayer) {
            throw new \Exception (self::NOMOREPIECES);
        } 
 
        $this->piecesUsed++;
    }

    public function getNumberOfPieces($holes) {
       if ($holes % 2) {
           return (($holes-1)/2); 
       } 
       return ($holes/2);  
        
    }

}
