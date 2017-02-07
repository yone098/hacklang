<?hh

namespace chapter3\collections;

function use_vector(): void {
  echo "===== Vector sample =====" . PHP_EOL;
  $fruits = Vector{ 'Apple', 'Orange' };
  $fruits[] = 'Grape';
  foreach ($fruits as $fruit) {
    echo "fluits: " . $fruit . PHP_EOL;
  }
  // 値を変更
  $fruits[1] = 'Banana';
  var_dump($fruits);
}

function run(): void {
  echo "===== start collection sample =====" . PHP_EOL;
  use_vector();
}

\chapter3\collections\run();
