<?hh

namespace generics\variance\covariance;

class C<+T> {
  public function __construct(private T $t) {
  }
}

class Animal{}

class Dog extends Animal{}

class Car{}

function f(C<Animal> $p): void {
  var_dump($p);
}

function run(): void {
  f(new C(new Animal()));
  f(new C(new Dog()));
  //f(new C(new Car()));
}

\generics\variance\covariance\run();
