<?hh

namespace type_system\tuples2;



function run(): void {
  echo "===== tuples samples =====" . PHP_EOL;
  $t = tuple (3, "str", array(1, 2));
  var_dump($t);
  $t[0] = 4;
  $t[1] = "hi";
  $t[2] = array("hello", 1000);
  //$t[1] = 100; // type error since [1] is originally a string
/*
Catchable fatal error: Hack type error: Invalid assignment at /home/yone098/hacklang/samples/type_system/tuples2.php line 14
*/
  var_dump($t);

  echo "===== tuples reading samples =====" . PHP_EOL;
  $t = tuple (3, "str", array(1, 2));
  var_dump($t[1]); // literal syntax
  list($i, $s, $arr) = $t; // list assignment
  var_dump($i);
  var_dump($s);
  var_dump($arr);

}



\type_system\tuples2\run();
