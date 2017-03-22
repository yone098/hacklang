<?hh

namespace attributes\ovreride;

class A {
  protected function foo(): void {}
}

class B extends A {
  <<__Override>>
  protected function foo(): void {}
}

class C extends A {
  //<<__Override>>
  protected function baz(): void {}
}
