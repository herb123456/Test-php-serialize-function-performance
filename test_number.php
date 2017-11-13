<?php
require_once('./helpers.php');

define('ARRAY_SIZE', 300);
define('MIN_NUM', 0);
define('MAX_NUM', 1000000);
define('TEST_TIME', 100);

$data = [];
for ($i = 0; $i < ARRAY_SIZE; $i++) {
    $data[] = generateNum(MIN_NUM, MAX_NUM);
}

runTest('serialize', function () use ($data) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        serialize($data);
    }
});

$sData = serialize($data);
runTest('unserialize', function () use ($sData) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        unserialize($sData);
    }
});

runTest('json_encode', function () use ($data) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        json_encode($data);
    }
});

$sData = json_encode($data);
runTest('json_decode', function () use ($sData) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        json_decode($sData);
    }
});

runTest('igbinary_serialize', function () use ($data) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        igbinary_serialize($data);
    }
});

$sData = igbinary_serialize($data);
runTest('igbinary_unserialize', function () use ($sData) {
    for ($i = 0; $i < TEST_TIME; $i++) {
        igbinary_unserialize($sData);
    }
});
