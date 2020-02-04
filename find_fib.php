<?php

// Число фибоначи

function fib($num, $level, $prev1, $prev2) {
    print ' ' . $prev2;

    if ($num >= $level) {
        return fib($num, ++$level, $prev2, $prev1 + $prev2);
    }

    return $prev2;
}

function find($num)
{
    switch ($num) {
        case 0:
            print "0\n";
            return 0;
    }

    print '0';
    $result = fib($num, 2, 0, 1);
    print "\n";

    return $result;
}

find(0);
find(1);
find(4);
find(30);