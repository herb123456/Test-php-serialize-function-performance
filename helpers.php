<?php
function generateNum($min, $max) {
    return random_int($min, $max);
}

function generateString($length) {
    $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    $r = '';
    for ($i = 0; $i < $length; $i++) {
        $r .= $char[random_int(0, strlen($char) - 1)];
    }

    return $r;
}

function generateObject($propertyNum) {
    $r = new stdClass();

    for ($i = 0; $i < $propertyNum; $i++) {
        $propertyName = generateString(3);
        $r->{$propertyName} = generateString(10);
    }

    return $r;
}

function generateDeepObject($propertyNum, $levelNum) {
    $r = new stdClass();

    $childObj = generateObject($propertyNum);
    $r->c = $childObj;
    for ($i = 0; $i < $levelNum; $i++) {
        $newChild = generateObject($propertyNum);
        $childObj->c = $newChild;

        $childObj = $newChild;
    }

    return $r;
}

