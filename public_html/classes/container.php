<?
class container extends arrayObj implements ArrayAccess {



    public function __construct($array = []) {
        $this->container = $array;
    }

    public function offsetSet($offset, $value) {
        return parent::offsetSet($offset, $value);
    }

    public function offsetExists($offset) {
        return parent::offsetExists($offset);
    }

    public function offsetUnset($offset = null) {
        parent::offsetUnset($offset);
    }

    public function offsetGet($offset = null) {
        return parent::offsetGet($offset);
    }

    public function getContainer($key = false){
        return $key ? $this->container[$key]($this) : $this->container;
    }

    
}