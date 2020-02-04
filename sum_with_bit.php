<?php
// https://tproger.ru/problems/write-a-function-summation-of-two-numbers-without-using-the-and-other-arithmetic-operators/

function sum($v1, $v2, $first = false) {
    if ($first) {
        print $v1. ' '. $v2 .' => ';
    }

    if ($v2 == 0 && !$first) {
        return $v1;
    }

    $xor = $v1 ^ $v2;
    $cr = ($v1 & $v2) << 1;

    $result = sum($xor, $cr);

    if ($first) {
        print $result ."\n";
    }

    return $result;
}


sum(2, 3, true);
sum(23, 34, true);
sum(759, 674, true);

