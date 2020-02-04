<?php

// Бинарный поиск рекурсивный

function searchData($data, $first, $last, $value)
{
    if ($first > $last) {
        return false;
    }

    $key = (int)ceil($first + ($last - $first) / 2);

    if ($data[$key] == $value) {
        return $key;
    }

    if ($data[$key] > $value) {
        return searchData($data, $first, $key - 1, $value);
    }

    if ($data[$key] < $value) {
        return searchData($data, $key + 1, $last, $value);
    }

    return false;
}

function search(array $data) {
    print(implode(', ', $data) ."\n");
    var_dump(searchData($data, 0, count($data) - 1, 2));
}

search([]);
search([2]);
search([-1, 0, 1, 2]);
search([2, 3, 4, 5, 6]);
search([1, 3, 4, 5, 6]);
search([0, 1, 2, 2.5, 3, 3, 4, 5, 6, 7, 8, 9, 11]);
search([0, 2, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);

search([-100, -10, -11, 2]);
search([-1000, -500, 2, 1000, 2000, 3000, 10000]);