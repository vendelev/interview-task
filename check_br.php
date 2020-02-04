<?php

// Проверка скобок

function check($str) {
    $map = [
        '[' => ']',
        '{' => '}',
        '(' => ')',
    ];

    $len = strlen($str);
    $stek = [];

    for ($ii = 0; $ii < $len; $ii++) {
        $key = array_search($str[$ii], $map);
        if ($key && $key !== array_pop($stek)) {
            return false;
        }

        if (array_key_exists($str[$ii], $map)) {
            $stek[] = $str[$ii];
        }
    }

    return empty($stek);
}

var_dump(check('sfgsdfg[(wert[t]wewt{ywrty[ywrty]ywe})] '));
var_dump(check(' {[}]'));
var_dump(check(']{}['));