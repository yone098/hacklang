<?hh

namespace type_system\shapes6;

type Point = shape('x' => int, 'y' => int);

class C {
  // All the right hand side expressions are shape literals

  // Can't have a shape as a constant value
  // Fatal error: Arrays are not allowed in class constants in /home/yone098/hacklang/samples/type_system/shapes6.php on line 11
  //const Point ORIGIN = shape('x' => 0, 'y' => 0);   // initializer rejected

  public static Point $p2 = shape('x' => 0, 'y' => 5);   // initializer okay
  public Point $p3 = shape('x' => 0, 'y' => 5);    // initializer okay
}

function createPoint(int $x = 0, int $y = 0): Point {
  return shape('y' => $y, 'x' => $x); // shape literal, no compile-time constant
}

function run(): void {
  echo "===== start shapes5 Shapes: Literals =====" . PHP_EOL;
  var_dump(createPoint(9, 3));
  var_dump(new C());
}

\type_system\shapes6\run();
