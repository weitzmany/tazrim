<?

class model {

    protected $object;
    protected $db;
    protected $table;

    public function __construct(){

        $this->init();
        $this->db = getContainer('db');

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

    /**
     * get the table structure to make a form
     */
    public function getStructure($table = null){

        $table = $table ?? $this->table;

        $results = $this->db->getAll("DESCRIBE " . $table);

        foreach($results as $result){

            if($result->Key == 'MUL'){
                $sql = "SELECT REFERENCED_TABLE_NAME as ref ,REFERENCED_COLUMN_NAME as col 
                        FROM INFORMATION_SCHEMA. KEY_COLUMN_USAGE 
                        WHERE TABLE_SCHEMA = '".DB_NAME."' 
                        AND TABLE_NAME = '".$table."' 
                        AND COLUMN_NAME = '".$result->Field."';";
                $info = $this->db->get($sql);
                $result->object = $this->getStructure($info->ref);
                $result->table = $info->ref;
            }

        }

        return $results;

    }

    /**
     * build the form
     */
    public function getForm(){

        $form = [];

        $structure = $this->getStructure();
        foreach($structure as $field){

            $input = new stdClass;
            $input->name = $field->Field;
            if($field->Key == 'MUL') {
                $input->type = 'select';
                $input->options = $this->db->getAll("SELECT `id` AS `value`, `name` AS `text` FROM " . $field->table);
            } else {
                switch($field->Type){
                    case 'int(11)':
                        $input->type = 'number';
                        break;
                    case 'varchar(32)':
                        $input->type = 'text';
                        break;
                    default: 
                        $input->type = 'text';
                            
                }
            }
            $form[] = $input;
            
        }

        return $form;
        

    }

    

}

