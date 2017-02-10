<?hh

namespace shapes\func\toarray;

class A {
  const int KEY_X = 100;
  const int KEY_Y = 200;
  const int KEY_Z = 300;
}

function run(): void {
  echo "===== Shapes::toArray() =====" . PHP_EOL;
  
  $s = shape();
  $a = Shapes::toArray($s);
  var_dump($a);

  $s = shape('x' => 10, 'y' => 20);
  $a = Shapes::toArray($s);
  var_dump($a);

  $s = shape(A::KEY_X => 10, A::KEY_Y => 20);
  $a = Shapes::toArray($s);
  var_dump($a);
}

\shapes\func\toarray\run();
