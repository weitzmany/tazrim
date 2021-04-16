<?

class model {

    protected $object;
    protected $db;

    public function __construct(){
        $this->db = getContainer('db');
    }

    /**
     * select all objects of a type
     */
    public function index(){
        
    }

    /**
     * select one object
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
     * @param data (object)
     */
    public function create($data){
        
    }

    /**
     * prepare object to update
     * @param data (object)
     */
    public function edit($data){
        
    }

    /**
     * update object in the DB
     * @param data (object)
     */
    public function update(){
        
    }

    /**
     * delete object from db (usualy mark as deleted)
     */
    public function delete(){
        
    }

}