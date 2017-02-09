<?hh

namespace shapes\func\keyexists;

class A {
  const int KEY_X = 100;
  const int KEY_Y = 200;
  const int KEY_Z = 300;
}

function run(): void {
  echo "===== Shapes::keyexists() =====" . PHP_EOL;

  $s = shape('x' => 10, 'y' => 20);
  $v = Shapes::keyExists($s, 'x');
  var_dump($v);
  $v = Shapes::keyExists($s, 'z');
  var_dump($v);

  $s = shape(A::KEY_X => 10, A::KEY_Y => 20);
  $v = Shapes::keyExists($s, A::KEY_Y);
  var_dump($v);

  $v = Shapes::keyExists($s, A::KEY_Z);
  var_dump($v);
}

\shapes\func\keyexists\run();
