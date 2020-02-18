<?php
// Знаменитость и фанаты
// Найти пользователя (знаменитость), который не имеет связь ни с одним другим пользователем, а все остальные (фанаты) имеют связь с ним

ini_set("memory_limit", "1000M");

//$data = [1, 2, 3, 4, 5];
$data = [];
for ($ii = 1; $ii < 15000; $ii++) {
    $data[] = $ii;
}
print 'Всего пользователей: '. count($data) ." \n";

//$ukNow = [
//    '1,2' => true,
//    '1,3' => true,
//    '1,5' => true,
//    '2,1' => true,
//    '2,3' => true,
//    '4,3' => true,
//    '5,3' => true,
//];
$ukNow = [];
for ($ii = 1; $ii < 15000; $ii++) {
    if ($ii == 7820) {
        continue;
    }
    $ukNow[$ii .',7820'] = true;
    for ($kk = $ii; $kk < 15000; $kk+=539) {
        if ($kk == $ii || $kk == 7820) {
            continue;
        }
        $ukNow[$ii . ',' . $kk] = true;
        if ($kk % 2 == 0) {
            $ukNow[$kk . ',' . $ii] = true;
        }
    }
}
print 'Всего связей: '. count($ukNow) ." \n";

function knows($id1, $id2): bool
{
    return (bool)$GLOBALS['ukNow'][ $id1 .','. $id2];
}

function find_sel($users): int
{
    $cnt = count($users) - 1;
	$visited = [];
	$tmp = 0;

	do {
		$next = $tmp;
		$visited[$next] = 1;

		for ($ii=0; $ii <= $cnt; $ii++) {
			if (!empty($visited[$ii])) {
				continue;
			}
			if (knows($users[$next], $users[$ii]) && !knows($users[$ii], $users[$next])) {
				$tmp = $ii;
				break;
			}
		}
	} while ($next !== $tmp);

	return $users[$next];
}

$tt = microtime(true);
print "Начали \n";
var_dump(find_sel($data));
print 'Затратили: '. (microtime(true) - $tt) ."\n";
