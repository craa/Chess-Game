<?php

require('library/GamesChesscomStandard.php');

$startTime = microtime(true);

for ($i=0; $i<10; $i++) {

    $moveList = 'mCYIgvZRfH5ZegWOHZ6ZlBIBdB!TcM3VMT2Tbs0Sad?!sm46kA90jr7GBlGldlZQmw!EpxE!vB89BQ6Qfd92gp!6wmXHAHOHmBQcdc6cBHcQiy29pw98wE8ZnDQIHBVNEFTLFNLCNE1LENIJNUCultJBtuBDowDCuvRJxFJBFNCuvDuwU1BtNVwxDB0RyGSKGOxVBtKCOWV?tx?41ULDULCu';

    $chessGame = new GamesChesscomStandard();
    $chessGame->resetGame();
    // nice_print($chessGame->toArray());

    while(strlen($moveList) > 0) {
      $currentMove = substr($moveList, 0, 2);
      $strMoveFromSquare = GamesChesscomStandard::GetMoveFromSquare($currentMove);
      $strMoveToSquare = GamesChesscomStandard::GetMoveToSquare($currentMove);
      if($chessGame->isPawn($chessGame->_board[$strMoveFromSquare])) {
        $strPromotionPiece = GamesChesscomStandard::GetPromotionPiece($currentMove);
      }
      $result = $chessGame->moveSquare($strMoveFromSquare, $strMoveToSquare, $strPromotionPiece);
      $moveList = substr($moveList,2);
        // nice_print($chessGame->toArray());
    }
    
}

$endTime = microtime(true);

echo "Processing Time: " . ($endTime - $startTime) . " seconds\n";

/*
// print_r($chessGame->toArray());
$moves = $chessGame->getMoveList();
$startTime = microtime(true);
for ($i=0; $i<10; $i++) {
    $chessGame = new GamesChesscomStandard();
    $chessGame->resetGame();
    // nice_print($chessGame->toArray());
    foreach ($moves as $move) {
        // var_dump($move);
        $chessGame->moveSAN($move[0]);
        // nice_print($chessGame->toArray());
        $chessGame->moveSAN($move[1]);
        // nice_print($chessGame->toArray());
    }
}
$endTime = microtime(true);

echo "Processing Time: " . ($endTime - $startTime) . " seconds\n";

  */
function nice_print($board)
{
    $i = 0;
    foreach ($board as $cell)
        echo (empty($cell)? ' ': $cell) . (++$i%8? '': PHP_EOL);
    echo '--------'.PHP_EOL;
}