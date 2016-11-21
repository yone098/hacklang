<?hh

namespace type_system;

class Box<T> {

  private array<T> $contents;

  public function __construct() {
    $this->contents = array();
  }

  public function put(T $x): void {
    $this->contents[] = $x;
  }

  public function get(): array<T> {
    return $this->contents;
  }
}

function gift<T>(Box<T> $box, T $item): void {
  $box->put($item);
}

function ts_generics_1(): array<arraykey> {
  $box = new Box();
  gift($box, "Hello");
  gift($box, "Goodbye");
  gift($box, 3);
  return $box->get();
}

function ts_generics_2(): array<arraykey> {
  $box = new Box();
  gift($box, "Hello");
  gift($box, "Goodbye");
  gift($box, 3);
  return $box->get();
}

function run(): void {
  var_dump(ts_generics_1());
  var_dump(ts_generics_2());
}

run();
