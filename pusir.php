<?php

// Пузырьковая сортировка

function sortData(array $data)
{
    $count = count($data);
    $iter = 0;

    while ($count) {
        for ($index = 1; $index < $count; $index++) {
            if ($data[$index - 1] > $data[$index]) {
                list($data[$index], $data[$index - 1]) = [$data[$index - 1], $data[$index]];
            }

            $iter++;
        }

        $count--;
    }

    print "Итераций: $iter \n";
    print(implode(', ', $data) ."\n");

}

sortData([0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
sortData([2, 1, 3, 5, 11, 9, 7, 8, 6, 3, 0, 4]);
sortData([2, 1, 3, 5, 9, 7, 8, 6, 3, 0, 4]);
sortData([11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]);