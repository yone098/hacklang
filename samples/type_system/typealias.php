<?hh

namespace type_system\typealias;

newtype Point = (int, int);

function createPoint(int $x, int $y): Point {
  return tuple($x, $y);
}

function setX(Point $p, int $x): Point {
  $p[0] = $x;
  return $p;
}

function setY(Point $p, int $y): Point {
  $p[1] = $y;
  return $p;
}

function getX(Point $p): int {
  return $p[0];
}

function getY(Point $p): int {
  return $p[1];
}

function distance_between_2_Points(Point $p1, Point $p2): float {
  $dx = getX($p1) - getX($p2);
  $dy = getY($p1) - getY($p2);
  return sqrt($dx*$dx + $dy*$dy);
}

function run(): void {
  $p1 = createPoint(5, 3);
  var_dump($p1);
  $p2 = createPoint(9, -5);
  var_dump($p2);
  $dist = distance_between_2_Points($p1, $p2);
  echo "distance between points is " . $dist ."\n";
  // But we cannot pass a tuple of two ints since they are not a Point
  // This will give a Hack typechecker error
  $will_not_type_check = distance_between_2_Points(tuple(2, 3), tuple(3, 4));
  // However, the code will still run in HHVM
  echo "distance between points is " . $will_not_type_check ."\n";
}



\type_system\typealias\run();
