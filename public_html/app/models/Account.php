<?

class Account extends model {

    protected function init(){
        $this->table = 'accounts';
    }

    public function createType($args){

        $this->db->set('account_types',$args);

    }

}