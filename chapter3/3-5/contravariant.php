<?hh

namespace generics\variance\contravariant;

class C<-T> {
  public function __construct(private T $t) {
  }
  
  public function setT(T $val): void {
    $this->t = $val;
  }
}

class Animal{}

class Dog extends Animal{}

class Car{}

function run(): void {
  $animal = new Animal();
  $dog = new Dog();

  $c = new C($dog);
  $c->setT($animal);
  var_dump($c);
}

\generics\variance\contravariant\run();
