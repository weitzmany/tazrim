<?

$app->get('/',function($app){

    return $app->view->render('/index/index');

});

$app->get('/accounts/new',function($app){

    return $app->Accounts->new();

});

$app->post('/accounts/new',function($app){

    return $app->Accounts->create();

});