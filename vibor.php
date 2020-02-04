<?php

// Сортировка выбором

function sortData(array $data)
{
    $first = 0;
    $last = count($data) - 1;
    $iter = 0;

    while ($first < $last) {
        $minPos = $first;
        $maxPos = $last;

        for ($index = $first; $index <= $last; $index++) {
            if ($data[$minPos] > $data[$index]) {
                $minPos = $index;
            }

            if ($data[$maxPos] < $data[$index]) {
                $maxPos = $index;
            }

            $iter++;
        }

        if ($first !== $minPos) {
            list($data[$first], $data[$minPos]) = [$data[$minPos], $data[$first]];
        }

        if ($last !== $maxPos && $maxPos !== $first) {
            list($data[$last], $data[$maxPos]) = [$data[$maxPos], $data[$last]];
        }


        $first++;
        $last--;
    }

    print "Итераций: $iter \n";
    print(implode(', ', $data) ."\n");

}

sortData([0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
sortData([2, 1, 3, 5, 11, 9, 7, 8, 6, 3, 0, 4]);
sortData([2, 1, 3, 5, 9, 7, 8, 6, 3, 0, 4]);
sortData([11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]);
//sortData([6, 3]);