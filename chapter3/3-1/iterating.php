<?hh

namespace chapter3\collections\iterating;

function run(): void {
  echo "===== start collection iterating sample =====" . PHP_EOL;
  $vec = Vector {'A', 'B', 'C'};
  $map = Map {'A' => 1, 'B' => 2};
  $set = Set {800, 900, 1000};
  $pair = Pair {'A', 'B'};

  foreach ($vec as $val) {
    echo "Vector foreach:" . $val . PHP_EOL;
  }

  foreach ($map as $key => $val) {
    echo "Map key:" . $key . " value:" . $val . PHP_EOL;
  }

  foreach ($set as $val) {
    echo "Set :" . $val . PHP_EOL;
  }

  foreach ($pair as $key => $val) {
    echo "Pair key:" . $key . " value:" . strval($val) . PHP_EOL;
  }
}

\chapter3\collections\iterating\run();
