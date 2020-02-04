<?php
// https://tproger.ru/problems/write-a-function-which-swaps-the-values-of-variables-without-temporary-variables/

function changeA($v1, $v2) {
    print $v1. ' '. $v2 .' => ';

    $v1 = $v1 - $v2;
    $v2 = $v1 + $v2;
    $v1 = $v2 - $v1;

    print $v1. ' '. $v2 ."\n";
}

function changeB($v1, $v2) {

    print $v1. ' '. $v2 .' => ';

    $v1 = $v1 ^ $v2;
    $v2 = $v1 ^ $v2;
    $v1 = $v1 ^ $v2;

    print $v1. ' '. $v2 ."\n";
}


changeA(3, 5);
changeA(5, 5);
changeA(-33, 5);

changeB(3, 5);
changeB(5, 5);
changeB(-336, 5);
changeB('-reg', 'v5e');
changeB('-ыва', 'стит');