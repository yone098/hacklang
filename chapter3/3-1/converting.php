<?hh

namespace chapter3\collections\converting;

function add_vector(Vector<int> $vec): void {
  $vec[] = 40;
}

function add_array(array<int> $arr): void {
  $arr[] = 40;
}

function run(): void {
  echo "===== start collection converting sample =====" . PHP_EOL;
  $arr = array(1, 2, 3);
  add_array($arr);
  var_dump($arr);  // 配列 $arr は関数後に影響を受けない

  $vec = Vector{1, 2, 3};
  add_vector($vec);
  var_dump($vec);  // コレクション $vec は関数後に影響を受ける
}

\chapter3\collections\converting\run();
