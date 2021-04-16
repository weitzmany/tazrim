<?

class Accounts extends controller {

    protected function init(){
        $this->object = getContainer('Account');
    }

    public function new(){

        $args['title'] = 'headings';
        return $this->view->render('/accounts/new',$args);

    }

    public function create(){

    }

}