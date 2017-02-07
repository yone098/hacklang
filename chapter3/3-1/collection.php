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

  // 削除
  $fruits->removeKey(1);
  foreach ($fruits as $fruit) {
    echo "fluits: " . $fruit . PHP_EOL;
  }
}

function use_map(): void {
  echo "===== Map sample =====" . PHP_EOL;
  $map = Map{ 1 => 'yone098', 2 => 'mopemope' };
  foreach ($map as $id => $name) {
    echo "id " . strval($id) . " is " . $name . PHP_EOL;
  }
  // remove 
  $map->removeKey(2);
  var_dump($map);
}

function use_set(): void {
  echo "===== Set sample =====" . PHP_EOL;
  $set = Set{ 0, 1, 2, 3 };
  // 追加
  $set->add(100);
  var_dump($set);

  // remove
  $set->remove(2);
  var_dump($set);
}


function run(): void {
  echo "===== start collection sample =====" . PHP_EOL;
  use_vector();
  use_map();
  use_set();
}

\chapter3\collections\run();
