<?hh

namespace generics\entities\method;

class StackUnderflowException extends \Exception {}

class Stack<T> {
  private array<T> $stack;
  private int $stackPtr;

  public function __construct(T $v) {
    $this->stackPtr = 0;
    $this->stack = array();
  }

  public function push(T $value): void {
    $this->stack[$this->stackPtr++] = $value;
  }

  public function pop(): T {
    if ($this->stackPtr > 0) {
      return $this->stack[--$this->stackPtr];
    } else {
      throw new StackUnderflowException();
    }
  }
  
  public function put<Tv>(Tv $msg): void {
    var_dump($msg);
  }
}

function run(): void {
  $s = new Stack(0);
  $s->put("yone098");

  $s = new Stack("A");
  $s->put(12.345);
}

\generics\entities\method\run();
