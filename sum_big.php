<?php

//Сумма больших чисел

function sum($str)
{
    [$str1, $str2] = explode(' ', $str);

    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $max = max($len1, $len2);
    $itog = '';
    $rest = 0;

    if ($len1 < $len2) {
        $str1 = sprintf('%0' . $max . 's', $str1);
    } elseif ($len2 > $len1) {
        $str2 = sprintf('%0' . $max . 's', $str2);
    }


    for ($ii = $max - 1; $ii >= 0; $ii--) {
        $sum = $str1[$ii] + $str2[$ii] + $rest;

        if ($sum > 9) {
            $rest = 1;
            $sum -= 10;
        } else {
            $rest = 0;
        }

        $itog = $sum . $itog;
    }

    if ($rest) {
        $itog = $rest . $itog;
    }

    var_dump($str1, $str2, 'Итого:');
    var_dump($itog, '-----------------');
}

sum('9028374509827345809723405 2093847509823475098273848484840589');
sum(' 2098347509283475092837450982734509823');