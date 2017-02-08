<?hh

namespace shapes\literals;

type Point = shape('x' => int, 'y' => int);

class C {
  // 定数値として shape は設定出来ないためエラー
  //const Point ORIGIN = shape('x' => 0, 'y' => 0);

  // 初期化 OK
  public static Point $p1 = shape('x' => 0, 'y' => 0);

  // 初期化 OK
  public Point $p2 = shape('x' => 0, 'y' => 0);
}

function create_point(int $x, int $y): Point {
  // 定義と順序が異なっても OK
  return shape('y' => $y, 'x' => $x);
}

function run(): void {
  echo "===== start shapes literals sample =====" . PHP_EOL;
  var_dump(create_point(100, 200));
  var_dump(new C());
}

\shapes\literals\run();
