<?hh

namespace chapter3\collections\semantics;

function mod_vector(Vector<int> $vec): void {
  $vec[1] = 20;
}

function mod_array(array<int> $arr): void {
  $arr[1] = 20;
}

function reference_semantics(): void {
  echo "===== reference semantics =====" . PHP_EOL;
  $vec = Vector{ 1, 2, 3 };
  $cp_vec = $vec; // 2つの Vector は同じ参照を持つ
  $vec[0] = 10;   // $vec に加えた変更は $cp_vec にも影響する
  var_dump($vec);
  var_dump($cp_vec);
  mod_vector($vec);
  var_dump($cp_vec); // 関数呼出し後も参照に影響
}

function value_semantics(): void {
  echo "===== value semantics =====" . PHP_EOL;
  $arr = array( 1, 2, 3 );
  $cp_arr = $arr; // 2つの配列は同じ値を持つがコピーでは無い
  $arr[0] = 10;   // $cp_arr は影響を受けない
  var_dump($arr);
  var_dump($cp_arr);
  mod_array($arr);
  var_dump($cp_arr); // 関数呼び出し後も $cp_arr は影響を受けない
}

function run(): void {
  echo "===== start collection semantics sample =====" . PHP_EOL;
  reference_semantics();
  value_semantics();
}

\chapter3\collections\semantics\run();
