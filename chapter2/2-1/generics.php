<?hh

namespace type_system\generics;

// generic class
class Animal<T> {
  private ?T $name;

  public function set_name(?T $name): void {
    $this->name = $name;
  }

  public function get_name(): ?T {
    return $this->name;
  }

  public function get_age(): int {
    return 1;
  }
}

// generic method
function generic_method<T>(Animal<T> $cat): ?T {
  $value = $cat->get_name();

  return $value;
}

// Constaraints
class Wanko {
  public function get_age(): int {
    return 1;
  }
}

class Dog extends Wanko {
  public function get_age(): int {
    return 2;
  }

  public function is_dog(): bool {
    return true;
  }
}

class Poodle<T> {
  private T $data;

  public function __construct(T $d) {
    $this->data = $d;
  }

  public function get(): T {
    return $this->data;
  }
}

class TeacupPoodle<T as Wanko> extends Poodle<T> {
  private int $sum = 0;

  public function __construct(T $wanko) {
    parent::__construct($wanko);
    $this->sum += $wanko->get_age();
  }
}


function run(): void {
  // Animal クラスを生成
  $dog = new Animal();
  $dog->set_name("Pochi");
  echo "dog->get_name():" . $dog->get_name() . "\n";

  // Animal クラスを生成
  $cat = new Animal();
  $cat->set_name("Mike");

  // generic_method の引数に Animal<string> を指定
  $cat_name = generic_method($cat);
  var_dump($cat_name);

  // Dog クラスを生成
  $dog = new Dog();
  echo "=== dog ===\n";
  var_dump($dog);

  // TeacupPoodle クラスを生成
  $teacup_poodle = new TeacupPoodle($dog);
  echo "=== teacup_poodle ===\n";
  var_dump($teacup_poodle);

  // TeacupPoodle<Dog as Wanko> -> get() <Dog> がコールされる
  $poodle2 = $teacup_poodle->get();
  echo "=== poodle2 ===\n";
  var_dump($poodle2);
  echo "=== poodle2->is_dog() ===\n";
  var_dump($poodle2->is_dog());
}

\type_system\generics\run();
