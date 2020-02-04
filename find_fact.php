<?php

// Факториал числа

function fact($num, $level, $prev) {
    print $level;

    if ($num > $level) {
        print '*';
        return fact($num, ++$level, $prev*$level);
    }

    return $prev;
}

function find($num)
{
    print $num.'!=';
    switch ($num) {
        case 0:
            print "1\n";
            return 1;
    }

    print '='. fact($num, 1, 1);
    print "\n";
}

find(0);
find(1);
find(4);
find(5);
find(20);