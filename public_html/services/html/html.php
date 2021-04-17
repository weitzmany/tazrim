<?

class html {

    protected $element;
    protected $selfClosed;
    protected $selfClosedTags = [
        'image',
        'input',
    ];
    protected $content;
    protected $attributes;
    protected $type;

    public function __construct(){

        $this->element = [];
        $this->selfClosed = false;
        $this->$selfClosedTags = [
            'image',
            'input',
        ];
        return $this;

    }

    public function tag($type, $content = '', $attributes = []){

        $this->type = $type;
        $this->content = $content;
        $this->attribute = $attributes;
        return $this;

    }

    function innerHTML($content){

        $this->content = $content;
        return $this;

    }

    function setAttribute($attr,$value = true){

        $this->attribute[$attr] = $value;
        return $this;

    }

    function getAttribute($attr){

        return $this->attribute[$attr];

    }

    function removeAttribute($attr){

        unset($this->attribute[$attr]);
        return $this;

    }

}