<?hh

require __DIR__ . '/vendor/autoload.php';

class :yone098 extends :x:element {
  protected function render(): \XHPRoot {
    return <strong>Hello! yone098</strong>;
  }
}

class :sample-plain-str extends :x:element {
  protected function render(): \XHPRoot {
    return <x:frag>Hello!</x:frag>;
  }
}

function run(): void {
  echo <yone098 />;
  echo PHP_EOL . PHP_EOL;
  echo <sample-plain-str />;
  echo PHP_EOL;
}

run();
