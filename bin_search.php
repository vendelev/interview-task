<?php

// Бинарный поиск

function searchData($data, $first, $last, $value)
{
    while (true) {
        if ($first > $last) {
            return false;
        }

        $key = (int)ceil($first + ($last - $first) / 2);

        if ($data[$key] == $value) {
            return $key;
        }

        if ($data[$key] > $value) {
            $last = $key - 1;
            continue;
        }

        if ($data[$key] < $value) {
            $first = $key + 1;
            continue;
        }

        return false;
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
search([0, 2, 2, 2, 3, 3, 4, 5, 6, 7, 8, 9, 11]);