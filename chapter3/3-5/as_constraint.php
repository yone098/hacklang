<?hh

namespace generics\entities\constraintas;

class Complex<T as num> {
  private T $a;
  private T $b;

  public function __construct(T $a, T $b) {
    $this->a = $a;
    $this->b = $b;
  }
  public static function add(Complex<T> $z1, Complex<T> $z2): Complex<num> {
    return new Complex($z1->a + $z2->a, $z1->b + $z2->b);
  }

  public function __toString(): string {
    if ($this->b === 0.0) {
      return (string) $this->a;
    } else if ($this->a === 0.0) {
      return (string) $this->b . 'i';
    } else {
      return (string) $this->a . ' + ' . (string) $this->b . 'i';
    }
  }
}

function run(): void {
  $c1 = new Complex(10.5, 5.67);
  $c2 = new Complex(4, 5);
  echo "\$c1 + \$c2 = " . Complex::add($c1, $c2) . "\n";
  $c3 = new Complex(5, 6);
  $c4 = new Complex(9, 11);
  echo "\$c3 + \$c4 = " . Complex::add($c3, $c4) . "\n";
}

\generics\entities\constraintas\run();
