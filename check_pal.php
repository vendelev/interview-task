<?php

// Проверка палиндрома

function check($str) {
    print $str ."\n";
    $len = mb_strlen($str);
    if ($len < 2) {
        return false;
    }

    $first = 0;
    $last = $len - 1;

    while ($first < $last) {
        if (mb_strtolower(mb_substr($str, $first, 1)) != mb_strtolower(mb_substr($str, $last, 1))) {
            return false;
        }

        $first++;
        $last--;
    }

    return true;
}

var_dump(check(''));
var_dump(check('oo'));
var_dump(check('наворован'));
var_dump(check('mamam'));
var_dump(check('weedew'));