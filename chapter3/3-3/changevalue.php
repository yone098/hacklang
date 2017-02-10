<?hh

namespace tuples\changevalue;


function run(): void {
  echo "===== tuples samples =====" . PHP_EOL;
  $t = tuple (100, "yoe098", array(1, 2));
  $t[0] = 2;
  $t[1] = "mopemope";
  $t[2] = array("foo", 1000);
  //$t[1] = 100; // 型を変えて更新するとエラー
  var_dump($t);
}

\tuples\changevalue\run();
