<?hh

namespace shapes\func\idx;

class A {
  const int KEY_X = 100;
  const int KEY_Y = 200;
}

function run(): void {
  echo "===== Shapes::idx() =====" . PHP_EOL;

  $s = shape('x' => 10, 'y' => 20);
  $v = Shapes::idx($s, 'x');
  var_dump($v);
  $v = Shapes::idx($s, 'z');
  var_dump($v);

  $s = shape(A::KEY_X => 10, A::KEY_Y => 20);
  $v = Shapes::idx($s, A::KEY_Y);
  var_dump($v);
  
  // 存在しないキーでデフォルト値指定
  $v = Shapes::idx($s, 'z', -99);
  var_dump($v);
}

\shapes\func\idx\run();
