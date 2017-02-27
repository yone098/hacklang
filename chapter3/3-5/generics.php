<?hh

namespace generics\examples;

class Box<T> {
  public T $value;
  public function __construct(T $v) {
    $this->value = $v;
  }
}

function run(): void {
  $a = new Box("A");
  var_dump($a);
  
  $b = new Box(100);
  var_dump($b);
}

\generics\examples\run();
