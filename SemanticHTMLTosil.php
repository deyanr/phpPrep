<?php
 
foreach(explode("\n", $_GET['html']) as $line) {
 
    if (strpos($line, '<div')!== FALSE) { //if line contains <div
 
        //get id or class
        if (preg_match('/id\s+=\s+"[a-z]+"|id="[a-z]+"|id\s="[a-z]+"/', $line, $idMatch)) { //if line contains id= and get it"
 
            $idMatch = $idMatch[0];
            preg_match( '/"[a-z]+"/', $idMatch, $idTag); //get the attribute info inside quotes
            $idTag= trim($idTag[0], '"'); //trim spaces
 
        }
        if (preg_match('/class\s+=\s+"[a-z]+"|class="[a-z]+"|class\s="[a-z]+"/', $line, $classMatch)) { //if line contains class= and get it"
 
            $idMatch = $classMatch[0];
            preg_match( '/"[a-z]+"/', $idMatch, $idTag); //get the attribute info inside quotes
            $idTag= trim($idTag[0], '"'); //trim spaces
 
        }
 
        //remove id or class
        $line = str_replace( $idMatch, "", $line); //replace the whole attribute with empty
        $line = str_replace( '<div', '<'.$idTag, $line); //replace the div with the semantic tag
 
 
        //if there is no attributes remove whitespace
        // possibly pointless considering the if after this one
        if(preg_match( '/<'.$idTag.'\s+>/', $line, $onlyDiv)){
            $modded = str_replace( " ", "", $onlyDiv[0]);
            $line = str_replace($onlyDiv[0] , $modded , $line);
        }
 
        //get the whole tag
        if(preg_match( '/<'.$idTag.'(.*?)>/', $line, $match)){
            $inside = substr($match[0], strlen($idTag)+1, -1); //cut the tag and leave the attributes
            $inside_trim = trim($inside);
            $inside_trim = preg_replace('!\s+!', ' ', $inside_trim); //trim and remove multiple spaces with one
            $line = str_replace($inside , ' '.$inside_trim , $line);
 
        }
 
 
    }
    else if (strpos($line, '</div>')!== FALSE) { // if line contains </div>
 
 
        if(preg_match( '<!--(.*?)-->', $line, $match)){ //get the comment info
            $endtag =substr($match[0], 3, -2);
            $endtag = trim($endtag);
 
 
 
        }
 
        $line = str_replace('</div> ', "</$endtag>", $line); //replace with commentinfo
        $line = substr($line, 0, strpos($line, '>')+1);
    }
 
    echo "$line\n"; //print line
 
}
 
//profit
