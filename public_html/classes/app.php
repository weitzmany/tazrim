<?

class app {

    private $gets;
    private $posts;
    private $pathes;
    private $url;
    private $container;
    private $method;
    public $view;

    /**
     * build the app
     * @param container c
     */
    public function __construct($c){

        $this->container = $c;

        foreach($c->getContainer() as $k => $v){
            $this->$k = $this->getContainer($k);
        }

        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    }

    /**
     * after the app is ready - perform all 
     */
    public function __destruct(){

        switch($this->method){
            case 'GET':
                $return = $this->gets[$this->url]['callback']($this);
                break;
            case 'POST':
                $return = $this->posts[$this->url]['callback']($this);
                break;
        }

        echo $return;

    }

    /**
     * get the container built in dependencies
     * @param string key
     * @return mixed 
     */
    function getContainer($key = false){

        return $key ? $this->container[$key]($this->container) : $this->container->getContainer();

    }

    /**
     * add path to routes
     * @param string path
     * @param function callback
     */
    public function get($path,$callback){

        $this->gets[$path] = ['callback' => $callback];

    }

    /**
     * add path to routes
     * @param string path
     * @param function callback
     */
    public function post($path,$callback){

        $this->posts[$path] = ['callback' => $callback];

    }

}