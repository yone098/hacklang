<?hh

namespace type_system\methcaller;

class Foo {
  public function __construct(
    private string $content,
  ) {
  }

  public function getContent(): string {
    return $this->content;
  }
}

function run() {
  $in = Vector {
    new Foo('herp'),
    new Foo('derp'),
  };

  $out = $in->map(meth_caller(Foo::class, 'getContent'));
  var_dump($out);
}



\type_system\methcaller\run();
