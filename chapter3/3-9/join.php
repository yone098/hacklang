<?hh

namespace async\awaitable\join;

async function get_html(string $url): Awaitable<string> {
  return await \HH\Asio\curl_exec($url);
}

function run(): void {
  $result = \HH\Asio\join(get_html("http://yone098.com"));
  var_dump(substr($result, 0, 64));
}

\async\awaitable\join\run();

