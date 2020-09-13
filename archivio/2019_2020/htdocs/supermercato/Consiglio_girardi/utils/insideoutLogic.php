<?php
include 'utils/classes.php';
// function simulate_people($peopleStack)
// {
//     $modified = clone $peopleStack;
//     // $modified becomes the active stack
//     if (rand(0, 9) % 2 == 0) {
//         $modified->push("👦");
//         $modified->shuffle();
//         console_log("someone got in");
//     } else if ($modified->isempty() == False){        
//         $modified->pop();
//         $modified->shuffle();
//         console_log("someone got out");
//     } else {console_log("pop sull'array vuoto");}
    
//     return $modified;
// }

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}