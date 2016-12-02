<?hh

namespace type_system\tuples;

// You don't use the keyword tuple when annotating with one
// You do use the keyword tuple when forming one.
function q_and_r(int $x, int $y): (int, int, bool) {
  return tuple(round($x / $y), $x % $y, $x % $y === 0);
}

function find_longest_and_index(array<string> $strs): (string, int) {
  $longest_index = -1;
  $longest_str = "";
  foreach ($strs as $index => $str) {
    if (strlen($str) > strlen($longest_str)) {
      $longest_str = $str;
      $longest_index = $index;
    }
  }
  return tuple($longest_str, $longest_index);
}

function run(): void {
  // Tuples lend themselves very well to list()
  list($q, $r, $has_remainder) = q_and_r(5, 2);
  var_dump($q);
  var_dump($r);
  var_dump($has_remainder);
  
  echo "========" . PHP_EOL;

  $strs = array("ABCDE", "tjkdsfjkwewowe", "Hello, this is an intro of tuples");
  var_dump(find_longest_and_index($strs));
}


\type_system\tuples\run();
