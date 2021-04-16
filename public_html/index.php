<?

$directories = [
  'includes',
  'app/includes',
  'services',
  'classes',
];

foreach($directories as $dir){
  foreach(glob($dir . "/*.php") as $filename){
      include $filename;
  }
}

$container = new container();

include 'settings/dependencies.php';
include 'app/settings/dependencies.php';

$app = new app($container);

include 'settings/routes.php';
include 'app/settings/routes.php';

