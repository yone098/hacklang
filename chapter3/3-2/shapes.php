<?hh

namespace shapes\sample;

type customer = shape('id' => int, 'name' => string);

function create_user(int $id, string $name): customer {
  return shape('id' => $id, 'name' => $name);
}

function run(): void {
  echo "===== start shapes sample =====" . PHP_EOL;
  $c = create_user(1, "yone098");
  var_dump($c['id']);
  var_dump($c['name']);
}

\shapes\sample\run();
