<?

$R->layout('base',[
    'css' => [
        'accounts.css'
    ],
    'js' => [
        'accounts.js'
    ]
]);


$R->section('content');

    echo $R->v('form');

$R->stop();