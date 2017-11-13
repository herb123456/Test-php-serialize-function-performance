<?php
define('MIN_NUM', 0);
define('MAX_NUM', 1000000);
define('STR_LENGTH', 100);

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

function generateDeepArr($size, $deep, $valueType) {
    $r = [];
    for ($i = 0; $i < $size; $i++) {
        $r[$i] = generateDeepChild([], $deep, $valueType);
    }

    return $r;
}

function generateDeepChild($arr, $level, $valueType) {
    if ($level < 0) {
        return $arr;
    }
    switch ($valueType) {
        case 'int':
            $arr[] = generateNum(MIN_NUM, MAX_NUM);
            break;
       case 'str':
            $arr[] = generateString(STR_LENGTH);
            break;
      case 'both':
            $arr[] = generateNum(MIN_NUM, MAX_NUM);
            $arr[] = generateString(STR_LENGTH);
            break;
    }
    $arr[] = generateDeepChild([], $level - 1, $valueType);

    return $arr;
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

function runTest($testName, Closure $test) {
    $start = microtime(true);

    $test();

    $end = microtime(true);

    echo $testName . " time: \t\t" . ($end - $start) . " \n";
}
