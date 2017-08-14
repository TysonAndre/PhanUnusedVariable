<?php
function test20(array $values) {
    $result = [];
    foreach ($values as $v) {
        [$page, $amount] = explode(':', $v);  //  False positive PhanPluginUnusedVariable Variable is never used: $page
        $result[$page] = $amount;
    }
    return $result;
}

function test20B() {
    $result = [];
    [$key, $values] = explode(':', 'key:value');
    $result[$key] = $values;  // correctly does not warn.
    return $result;
}

function test20C(array $values) {
    $result = [];
    foreach ($values as $v) {
        $arr = explode(':', $v);
        $page = $arr[0];
        $amount = $arr[1];
        $result[$page] = $amount;  // correctly does not warn.
    }
    return $result;
}
