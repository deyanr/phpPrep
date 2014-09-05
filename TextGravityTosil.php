<?php
 
$text = $_GET['text'];
$lineLength = $_GET['lineLength'];
$textLenght = strlen($text);
$rowsLenght = ceil($textLenght/$lineLength); //round up the number of rows
$textindex = 0;
 
//insert the data into $matrix
for($row = 0; $row < $rowsLenght; $row++){
    for($column = 0; $column < $lineLength; $column++){
        if ($textindex < $textLenght) {
            $matrix[$row][$column] = $text[$textindex];
        }
        else $matrix[$row][$column] = ' ';
        $textindex++;
    }
 
 
    }
 
//now 'gravity' for
for($row = $rowsLenght-1; $row > 0; $row--){ //for all the rows reverse
    for($column = 0; $column < $lineLength; $column++){
 
        if ($matrix[$row][$column] == ' ') {
            //swap values
            //find next char upstream and swap
 
            for($rowswap = $row; $rowswap >= 0; $rowswap--){ //get the first char upstream and swap it
                if ($matrix[$rowswap][$column] != ' ') {
                    $matrix[$row][$column] = $matrix[$rowswap][$column];
                    $matrix[$rowswap][$column] = ' ';
                    break;
                }
            }
 
        }
 
 
    }
}
 
 
printTable($matrix);
 
//from Nakov SampleExam lol
function printTable($matrix) {
    echo '<table>';
    for ($row = 0; $row < count($matrix); $row++) {
        echo '<tr>';
        for ($col = 0; $col < count($matrix[$row]); $col++) {
            echo '<td>' . htmlspecialchars($matrix[$row][$col]) . '</td>';
        }
        echo '</tr>';
    }
    echo '<table>';
}
