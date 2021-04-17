<?

class view {

    protected $args;
    protected $layout;
    protected $js;
    protected $css;
    protected $sections;
    protected $buffer;

    public function render($path, $args = []){

        $this->args = new arrayObj($args);
        $this->js = new arrayObj();
        $this->css = new arrayObj();
        $this->sections = new arrayObj();
        $this->buffer = new arrayObj();
        $R = $this;

        include(VIEW_PATH . $path . '.php');

        include $this->layout;

    }

    public function v($key){

        return array_get($this->args,$key);

    }

    public function getPart(){


    }

    public function layout($path,$assets = []){

        $this->layout = LAYOUTS_PATH . '/' .$path . '.php';

        if(isset($assets['css'])){
            foreach ($assets['css'] as $css){
                $this->addCss($css);
            }
        }

        if(isset($assets['js'])){
            foreach ($assets['js'] as $js){
                $this->addJs($js);
            }
        }

    }

    public function suply($name){
        return $this->sections[$name];
    }

    public function section($name){
        
        $this->buffer->offsetSet(null,$name);
        ob_start();

    }

    public function stop(){

        $content = ob_get_contents();
        ob_clean();
        $name = $this->buffer->offsetUnset();
        $this->sections->offsetSet($name,$content);

    }

    public function addCss($css){

        if (!filter_var($css, FILTER_VALIDATE_URL)) {
            $css = CSS_PATH . '/' . $css;
        }

        if($ext = substr(strrchr($css, '.'), 0) != '.css'){
            $css.='.css';
        }

        $this->css->offsetSet(null,$css);
    }

    public function addJs($js){

        if (!filter_var($js, FILTER_VALIDATE_URL)) {
            $js = JS_PATH . '/' .  $js;
        }

        if($ext = substr(strrchr($js, '.'), 0) != '.js'){
            $js.='.js';
        }

        $this->js->offsetSet(null,$js);
    }

    public function getAssets($type){

        if(!in_array($type,['js','css'])) return [];

        return $this->$type->offsetGet();

    }

}