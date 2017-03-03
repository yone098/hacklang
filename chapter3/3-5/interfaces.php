<?hh

namespace generics\entities\interfaces;

interface MyCollection<T> {
  public function put(T $item): void;
  public function get(): ?T;
}

class MyStack<T> implements MyCollection<T> {
  private Vector<T> $storage;

  public function __construct() {
    $this->storage = Vector{};
  }

  public function put(T $item): void {
    $this->storage[] = $item;
  }

  public function get(): ?T {
    return $this->storage->count() > 0 
      ? $this->storage[$this->storage->count() - 1] : null;
  }
}

function run(): void {
  $a = new MyStack();
  $a->put(3);
  $a->put(6);
  $a->put(9);
  echo 'get() -> ' . $a->get() . PHP_EOL;
}

\generics\entities\interfaces\run();
