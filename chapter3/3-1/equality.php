<?hh

namespace chapter3\collections\equality;

function run(): void {
  echo "===== start collection equality sample =====" . PHP_EOL;
  $vecA = Vector {1, 2, 3};
  $vecB = Vector {1, 2, 3};
  $vecC = Vector {4, 5, 6};
  $vecD = Vector {2, 1, 3};
  $setA = Set {1, 2, 3};
  $setB = Set {3, 2, 1};
  $mapA = Map {1 => 'A', 2 => 'B'};
  $mapB = Map {2 => 'B', 1 => 'A'};

  var_dump($vecA == $vecB); // true
  var_dump($vecA == $vecC); // false, 値が異なる
  var_dump($vecA == $vecD); // false, 値は同じだが順序が異なる
  var_dump($setA == $setB); // true, 値が全て同じ。順序は不問。
  var_dump($mapA == $mapB); // true, キーと値が全て同じ。順序は不問。
}

\chapter3\collections\equality\run();
