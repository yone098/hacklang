<?hh

namespace chapter3\collections\modifying;

function run(): void {
  echo "===== start collection modifying sample =====" . PHP_EOL;
  $vec = Vector {'A', 'B', 'C'};
  try {
    foreach ($vec as $val) {
      if ($val == 'B') {
        $vec[] = 'D';
      }
      echo "$val:" . $val . PHP_EOL;
    }
  } catch (\InvalidOperationException $ex) {
    var_dump($ex->getMessage());
  }


  $set = Set{1, 2, 3, 4};
  try {
    foreach ($set as $val) {
      if ($val == '3') {
        $set->remove(3);
      }
      echo "$val:" . $val . PHP_EOL;
    }
  } catch (\InvalidOperationException $ex) {
    var_dump($ex->getMessage());
  }
  
}

\chapter3\collections\modifying\run();
