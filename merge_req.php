<?php

// Сортировка слиянием рекурсивная

function req(array $data, &$iter)
{
    $count = count($data);

    if (!$count || $count === 1) {
        return $data;
    }

    if ($count === 2) {
        if ($data[0] > $data[1]) {
            list($data[1], $data[0]) = [$data[0], $data[1]];
        }

        return $data;
    }

    $key = (int)round($count / 2);
    $ar1 = array_slice($data, 0, $key);
    $ar2 = array_slice($data, $key);

    $ar1 = req($ar1, $iter);
    $ar2 = req($ar2, $iter);

    $i1 = 0;
    $i2 = 0;
    $c1 = count($ar1);
    $c2 = count($ar2);
    $data = [];
    while ($i1 < $c1 || $i2 < $c2) {

        $iter ++;

        if (array_key_exists($i1, $ar1) && array_key_exists($i2, $ar2)) {
            if ($ar1[$i1] < $ar2[$i2]) {
                $data[] = $ar1[$i1];
                $i1++;
            } else {
                $data[] = $ar2[$i2];
                $i2++;
            }
        } elseif (array_key_exists($i1, $ar1)) {
            $data[] = $ar1[$i1];
            $i1++;
        } elseif (array_key_exists($i2, $ar2)) {
            $data[] = $ar2[$i2];
            $i2++;
        } else {
            break;
        }
    }

    return $data;
}


function sortData(array $data)
{
    $iter = 0;

    $data = req($data, $iter);

    print "Итераций: $iter \n";
    print(implode(', ', $data) ."\n");

}


sortData([0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
sortData([2, 1, 3, 5, 11, 9, 7, 8, 6, 3, 0, 4]);
sortData([2, 1, 3, 5, 9, 7, 8, 6, 3, 0, 4]);
sortData([11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]);