<?hh

namespace xhp\basic;

require __DIR__ . '/vendor/autoload.php';

function run(): void {
  $p = <p>Hello, yone098</p>;
  var_dump($p);
}

\xhp\basic\run();
