<?hh

namespace xhp\validations;

require __DIR__ . '/vendor/autoload.php';

function run(): void {
  echo
    <div class="man">
      <span class="foo">XHP samples</span>
    </div> . PHP_EOL;
}

\xhp\validations\run();
