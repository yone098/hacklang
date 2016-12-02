<?hh

namespace type_system\methcaller2;

class Foo {
  public function dump(): void {
    $vec = Vector { 'herp', 'derp' };
    var_dump($vec->map($in ==> $this->wrap($in)));

    // This is not allowed because inst_meth() can not access private methods
    /*
Catchable fatal error: Hack type error: This is a private method at /home/yone098/hacklang/samples/type_system/methcaller2.php line 14
    */
    var_dump($vec->map(inst_meth($this, 'wrap')));
  }

  // private or protected error
  public function wrap(string $in): string {
    return '<<<'.$in.'>>>';
  }
}

function run() {
  (new Foo())->dump();
}


\type_system\methcaller2\run();
