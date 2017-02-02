<?hh

namespace type_system\shapes5;

class C {

  public function __construct(
    private shape('real' => float, 'imag' => float) $prop) {}

  public function setProp(shape('real' => float, 'imag' => float) $val): void {
    $this->prop = shape('real' => $val['real'], 'imag' => $val['imag']);
  }

  public function getProp(): shape('real' => float, 'imag' => float) {
    return $this->prop;
  }
}

function run(): void {
  // Shapes Without Type Aliases
  // A shape does not have to have a type alias associated with it. Here is an example of just using the literal shape syntax in all places.
  echo "===== start shapes5 Shapes Without Type Aliases. =====" . PHP_EOL;
  $c = new C(shape('real' => -2.5, 'imag' => 1.3));
  var_dump($c);
  $c->setProp(shape('real' => 2.0, 'imag' => 99.3));
  var_dump($c->getProp());
}

\type_system\shapes5\run();
