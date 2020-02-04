<?php

// Сортировка слиянием

function sortData(array $data)
{
    $count = count($data);
    $iter = 0;

    while (1) {
        $ar1 = [];
        $ar2 = [];
        $aL = &$ar1;

        for ($index = 1; $index < $count; $index++) {
            $aL[] = $data[$index - 1];

            if ($data[$index-1] > $data[$index]) {
                $isSort = false;
            } else {
                $isSort = true;
            }

            if (!$isSort) {
                if ($aL == $ar1) {
                    $aL = &$ar2;
                } else {
                    $aL = &$ar1;
                }
            }

            $iter++;
        }

        $ar1[] = $data[$index - 1];

        if (count($ar2)) {
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
        } else {
            break;
        }

        if ($iter > 1000) break;
    }

    print "Итераций: $iter \n";
    print(implode(', ', $data) ."\n");

}

sortData([0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
sortData([2, 1, 3, 5, 11, 9, 7, 8, 6, 3, 0, 4]);
sortData([2, 1, 3, 5, 9, 7, 8, 6, 3, 0, 4]);
sortData([11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]);