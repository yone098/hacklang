<?hh

namespace async\awaitable\exceptions;

async function exception_throw(): Awaitable<void> {
  throw new \Exception("My Exception");
}

async function basic_exception(): Awaitable<void> {
  await exception_throw();
}

\HH\Asio\join(basic_exception());
