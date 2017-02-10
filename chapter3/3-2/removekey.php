<?hh

namespace shapes\func\removekey;

class A {
  const int KEY_X = 100;
  const int KEY_Y = 200;
  const int KEY_Z = 300;
}

function run(): void {
  echo "===== Shapes::removeKey() =====" . PHP_EOL;
  
  $s = shape();
  Shapes::removeKey($s, 'A'); // 存在しないキーで削除
  var_dump($s);

  $s = shape('x' => 10, 'y' => 20);
  Shapes::removeKey($s, 'x');
  var_dump($s);
  Shapes::removeKey($s, 'y');
  var_dump($s);

  $s = shape(A::KEY_X => 10, A::KEY_Y => 20);
  Shapes::removeKey($s, A::KEY_Y);
  var_dump($s);

  Shapes::removeKey($s, A::KEY_Z); // 存在しないキーで削除
  var_dump($s);
}

\shapes\func\removekey\run();
