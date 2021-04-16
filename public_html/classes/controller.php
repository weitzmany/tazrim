<?

class controller {

    protected $object;
    protected $view;

    public function __construct(){
        
        $this->init();
        $this->view = getContainer('view');

    }

    /**
     * placeholder for inherited class
     */
    protected function init(){}

    /**
     * select all objects of a type
     */
    public function index(){

    }

    /**
     * seelect one object
     */
    public function show(){

    }

    /**
     * prepare data to create new object
     */
    public function new(){

    }

    /**
     * create the data in the DB
     */
    public function create(){

    }

    /**
     * prepare object to update
     */
    public function edit(){

    } 

    /**
     * update object in the DB
     * @param data (object)
     */
    public function update($data){

    }

    /**
     * delete object from db (usualy mark as deleted)
     */
    public function delete(){

    }

}