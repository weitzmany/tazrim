<?

class html {

    protected $element;
    protected $selfClosed;
    protected $selfClosedTags = [
        'image',
        'input',
    ];
    protected $content;

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

        $this->element['type'] = $type;
        $this->element['content'] = $content;
        $this->element['attributes'] = $attributes;
        return $this;

    }

    function innerHTML($content){

        $this->element['content'] = $content;
        return $this;

    }

    function setAttribute($attr,$value = true){

        $this->element['attributes'][$attr] = $value;
        return $this;

    }

    function removeAttribute($attr){

        unset($this->element['attributes'][$attr]);
        return $this;

    }

}