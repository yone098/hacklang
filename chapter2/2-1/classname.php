<?hh

namespace type_system\classname;

<<__ConsistentConstruct>>
interface I {
  abstract const int A_CONST;
  public static function staticMeth(): void;
  public function meth(): void;
}

class C implements I {
  const int A_CONST = 10;
  public static function staticMeth(): void { echo "staticMeth\n"; }
  public function meth(): void { echo "meth\n"; }
  public function methOnlyInC(): void { echo "methOnlyInC\n"; }
}

class D {}

// With the classname<T> built-in type alias, the typechecker can now
// understand all these constructs!
function check_classname(classname<I> $cls, mixed $value): void {
  $const = $cls::A_CONST; 
  $cls::staticMeth(); 
  invariant($value instanceof $cls, "Bad if not");
  $value->meth(); 
}

function run(): void {
  echo "===== start classname sample =====" . PHP_EOL;
  $c = new C();
  $d = new D();
  check_classname(C::class, $c);
  var_dump(C::class);
  //check_classname('C', $c); // error! only C::class is a classname
  //check_classname(D::class, $d); // error! a D is not an I
}

\type_system\classname\run();
