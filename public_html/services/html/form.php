<?

class form extends html {

    public function __construct(){

        $this->element = $this->tag('form');
        $this->method('post');

    }

    public function method($method = null){

        if(is_null($method)){
            return $this->getAttribute('method');
        }else{
            $this->setAttribute('method',$method);
        }
    }

}