<?hh

namespace type_system\shapes;

type customer = shape('id' => int, 'name' => string);

function create_user(int $id, string $name): customer {
  return shape('id' => $id, 'name' => $name);
}

function run(): void {
  echo "===== start shapes sample =====" . PHP_EOL;
  $c = create_user(4, "yone098");
  var_dump($c['id']);
  var_dump($c['name']);
}

\type_system\shapes\run();
