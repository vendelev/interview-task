<?php

// Проверка анаграммы

function check($str1, $str2) {
    print $str1 .' '. $str2 ."\n";
    $len = mb_strlen($str1);
    if ($len != mb_strlen($str2)) {
        return false;
    }

    $lets = [];

    for ($ii = 0; $ii < $len; $ii++) {
        $key = mb_substr($str1, $ii, 1);
        if (!array_key_exists($key, $lets)) {
            $lets[$key] = 0;
        }

        $lets[$key]++;
    }

    for ($ii = 0; $ii < $len; $ii++) {
        $key = mb_substr($str2, $ii, 1);
        if (array_key_exists($key, $lets)) {
            $lets[$key]--;

            if (!$lets[$key]) {
                unset($lets[$key]);
            }
        } else {
            return false;
        }
    }

    return empty($lets);
}

var_dump(check('abacaba', 'aaaabbc'));
var_dump(check('fgb', 'gbf'));
var_dump(check('fge', 'gfs'));
var_dump(check('кабан', 'банка'));
var_dump(check('fge', 'gfsd'));
var_dump(check('', ''));
