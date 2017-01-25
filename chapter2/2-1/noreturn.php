<?hh

namespace type_system\primitive\noreturn;

// void 
function foo(): void {
  echo "foo(): void\n";
}

foo();

// noreturn
function main(bool $b): noreturn {
  if ($b) {
    throw new \Exception("NoReturn No Life\n");
  } else {
    die("NoReturn No Life\n");
  }
}

main(true);
