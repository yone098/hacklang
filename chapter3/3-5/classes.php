<?hh

namespace generics\entities\classes;

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
}

function run(): void {
  $s = new Stack(0);
  $s->push(5);
  $s->push(10);
  $s->push(100);
  echo 'pop => ' . $s->pop() . PHP_EOL;
  echo 'pop => ' . $s->pop() . PHP_EOL;
  echo 'pop => ' . $s->pop() . PHP_EOL;

  $s = new Stack("A");
  $s->push("B");
  echo 'pop => ' . $s->pop() . PHP_EOL;
}

\generics\entities\classes\run();
