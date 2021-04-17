<?

class Accounts extends controller {

    protected function init(){
        $this->model = getContainer('Account');
    }

    public function new(){

        $args['form'] = $this->model->getForm();
        echo '<pre>';
        print_r($args);die;
        return $this->view->render('/accounts/new',$args);

    }

    public function create(){

    }

    public function newType(){


        return $this->view->render('/accounts/newType');
        
    }

    public function createType($args){

        $this->model->createType($args);

    }

}