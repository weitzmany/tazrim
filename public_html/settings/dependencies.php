<?

$container['db'] = function($c){
    
    return DB::CON();
    
};

$container['view'] = function($c){

    $v = new view;
    return $v;

};

$directories = [
    'app/models',
    'app/controllers',
    'app/helpers',
];

foreach($directories as $dir){
    foreach(glob($dir . "/*.php") as $file){
        include $file;
        $filename = pathinfo( $file )[ 'filename' ];
        $container[ $filename ] = function($c) use ( $filename ) {
            return new $filename($c);
        };
    }
}