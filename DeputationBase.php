<?php
function diverseDeputation($m) {
    $mans =  range(1, $m);
    $combinations = [];

    if(empty($combinations)){
        foreach ($mans as $man){
            $combinations[] = [$man];
        }
    }

    for($key = 0, $finich = 0; $finich !== 1; $key++)
    {
        foreach ($mans as $man){
            if(!in_array($man, $combinations[$key])){
                $newCombination = array_merge($combinations[$key], [$man]);
               sort($newCombination);
                if(!in_array($newCombination, $combinations)){
                    $combinations[] = $newCombination;
                }
            }
        }
        if(in_array($mans, $combinations)){
            $finich = 1;
        }
    }

    return $combinations;
}

$m = 4;

$result = diverseDeputation($m);
var_dump($result);

