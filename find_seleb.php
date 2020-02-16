<?php
// Знаменитость и фанаты
// Найти пользователя (знаменитость), который не имеет связь ни с одним другим пользователем, а все остальные (фанаты) имеют связь с ним

ini_set("memory_limit", "1000M");

$data = [1, 2, 3, 4, 5];
//$data = [];
//for ($ii = 1; $ii < 4000; $ii++) {
//    $data[] = $ii;
//}
print 'Всего пользователей: '. count($data) ." \n";

$ukNow = [
    '1,2' => true,
    '1,3' => true,
    '1,5' => true,
    '2,1' => true,
    '2,3' => true,
    '4,3' => true,
    '5,3' => true,
];
//$ukNow = [];
//for ($ii = 1; $ii < 4000; $ii++) {
//    if ($ii == 3820) {
//        continue;
//    }
//    $ukNow[$ii .',3820'] = true;
//    for ($kk = $ii; $kk < 4000; $kk+=39) {
//        if ($kk == $ii || $kk == 3820) {
//            continue;
//        }
//        $ukNow[$ii . ',' . $kk] = true;
//        if ($kk % 2 == 0) {
//            $ukNow[$kk . ',' . $ii] = true;
//        }
//    }
//}
print 'Всего связей: '. count($ukNow) ." \n";

function know($id1, $id2): bool
{
    return (bool)$GLOBALS['ukNow'][ $id1 .','. $id2];
}

function find_sel($users): int
{
    $sub = 0;
    $cache = [];
    $cnt = count($users) - 1;
    for ($ii=0; $ii <= $cnt; $ii++) {
        if (!array_key_exists($users[$ii], $cache)) {
            $cache[$users[$ii]] = ['out' => 0, 'in' => 0, 'skip' => false];
        }

        if ($cache[$users[$ii]]['out'] > 0) {
            $cache[$users[$ii]]['skip'] = true;
            continue;
        }

        $sub++;

        for ($kk=0; $kk <= $cnt; $kk++) {
            if (!array_key_exists($users[$kk], $cache)) {
                $cache[$users[$kk]] = ['out' => 0, 'in' => 0, 'skip' => false];
            }

            if (know($users[$ii], $users[$kk])) {
                $cache[$users[$ii]]['out']++;
                $cache[$users[$kk]]['in']++;
            }

            if (($cache[$users[$kk]]['skip'] || $kk >=$ii) && know($users[$kk], $users[$ii])) {
                $cache[$users[$kk]]['out']++;
                $cache[$users[$ii]]['in']++;
            }
        }

        if ($cache[$users[$ii]]['out'] == 0 && $cache[$users[$ii]]['in'] == $cnt) {
            print "Кол-во подциклов: $sub \n";
            print 'Кол-во в кеше: '. count($cache) ."\n";
            return $users[$ii];
        }
    }

    return 0;
}

$tt = microtime(true);
print "Начали \n";
var_dump(find_sel($data));
print 'Затратили: '. (microtime(true) - $tt) ."\n";
