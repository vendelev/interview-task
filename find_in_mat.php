<?php
//https://tproger.ru/problems/algorithm-to-search-an-element-in-a-sorted-array/
// Поиск в матрице

function find($data, $num) {
    $len = count($data) - 1;
    $subLen = count($data[0]) - 1;

    if ($data[0][0] > $num) {
        return false;
    }

    if ($data[$len][$subLen] < $num) {
        return false;
    }

    $row = $len;
    $col = 0;

    while ($row >= 0 && $col <= $subLen) {
        if ($data[$row][$col] == $num) {
            return $row .' '. $col;
        }

        if ($data[$row][$subLen] == $num) {
            return $row .' '. $col;
        }

        if ($data[$row][$col] > $num) {
            $row--;
        } else {
            $col++;
        }
    }

    return false;
}

$data = [
 [15, 16, 40, 85],
 [20, 35, 80, 95],
 [30, 55, 95, 105],
 [35, 56, 111, 118],
 [117, 119, 119, 120],
];

var_dump(find($data, 30));
var_dump(find($data, 55));
var_dump(find($data, 80));
var_dump(find($data, 57));
var_dump(find($data, 10));
var_dump(find($data, 130));
var_dump(find($data, 111));
