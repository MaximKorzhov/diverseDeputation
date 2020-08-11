<?php
function diverseDeputation($m, $w) {
    $mans =  range(1, $m);
    $womans = range(sizeof($mans)+1, sizeof($mans) + $w);
    $humans = array_merge($mans, $womans);
    $combinations = [];

    if(empty($combinations)){
        foreach ($mans as $man){
            $combinations[] = [$man];
        }
        foreach ($womans as $woman){
            $combinations[] = [$woman];
        }
    }

    for($key = 0, $finich = 0; $finich !== 1; $key++)
    {
        foreach ($humans as $human){
            if(!in_array($human, $combinations[$key])) {
                $newCombination = array_merge($combinations[$key], [$human]);
                if (array_intersect($newCombination, $mans) && array_intersect($newCombination, $womans)) {
                    sort($newCombination);
                    if (!in_array($newCombination, $combinations)) {
                        $combinations[] = $newCombination;
                    }
                }
            }
        }
        if(in_array($humans, $combinations)){
            $finich = 1;
        }
    }

    return array_slice($combinations, sizeof($humans));
}

$m = 3;

$w = 1;

$result = diverseDeputation($m, $w);
var_dump($result);

