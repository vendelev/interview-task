<?php

// Быстрая сортировка

function req(array &$data, $first, $last, &$iter)
{
    if ($last - $first <= 1) {
        return false;
    }

    $key = (int)ceil(($first + $last) / 2);
    $ind1 = $first;
    $ind2 = $last;

    while ($ind1 < $ind2) {
        while ($data[$ind1] < $data[$key]) {
            $iter++;
            $ind1++;
        }

        while ($data[$ind2] > $data[$key]) {
            $iter++;
            $ind2--;
        }

        if ($ind1 < $ind2) {
            list($data[$ind1], $data[$ind2]) = [$data[$ind2], $data[$ind1]];
            $ind1++;
            $ind2--;
        }
    }

    if ($ind1 < $last) {
        req($data, $first, $ind1, $iter);
    }

    if ($ind2 > $first) {
        req($data, $ind2, $last, $iter);
    }

    return true;
}


function sortData(array $data)
{
    $iter = 0;

    req($data, 0, count($data) - 1, $iter);

    print "Итераций: $iter \n";
    print(implode(', ', $data) ."\n");

}

sortData([0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
sortData([2, 1, 3, 5, 11, 9, 7, 8, 6, 3, 0, 4]);
sortData([2, 1, 3, 5, 9, 7, 8, 6, 3, 0, 4]);
sortData([11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]);