<?hh

namespace type_system;

class Z {}


function bar(): void {
  $z = new Z();

  var_dump($z);
}

bar();
