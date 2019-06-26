<?php
class Route
{
    public static function get($uri, $action)//uri = namespace //action -> method del controller
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && self::checkURI($uri)) {
            $params = self::getParams($uri);
            self::callFunction($action, $params);
        }
    }

    public static function post($uri, $action)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && self::checkURI($uri)) {
            $params = self::getParams($uri);
            self::callFunction($action, $params);
        }
    }

    private static function getPathInfo(){
        if(!empty($_SERVER['PATH_INFO'])){
            return $_SERVER['PATH_INFO'];
        }else{
            return "/";
        }
    }

    private static function checkURI($uri)
    {
        // priprav vzor na porovnanie
        $pattern = '/{([a-zA-Z0-9-]+)}/i';
        $replacement = '([a-zA-Z0-9-]+)';
        $pattern1 = preg_replace($pattern, $replacement, $uri);
        $pattern = "/^" . str_replace('/', "\\/", $pattern1) . "$/i";

        // porovnaj
        return preg_match($pattern, self::getPathInfo());
    }

    private static function getParams($uri)
    {
        // vyber hodnoty z URL
        $uriArray = explode('/', $uri);
        $pathInfoArray = explode('/', self::getPathInfo());

        $params = [];
        foreach ($pathInfoArray as $key => $value) {
            if ($value != $uriArray[$key]) {
                $paramKey = trim($uriArray[$key], "{}");
                $params[$paramKey] = $value;
            }
        }

            $params["data"] = $_REQUEST;

        return $params;
    }

    private static function callFunction($function, $params)
    {
        $type = gettype($function);

        if($type == "object"){
            call_user_func_array($function, $params);
            die;
        }

        if($type == "string"){
            $functionArray = explode('@',$function);
            if(class_exists($functionArray[0])){
                $class = new $functionArray[0];
                if(method_exists($class, $functionArray[1])){
                    call_user_func_array(array($class, $functionArray[1]), $params);
                    die;
                }
            }
        }

        throw new Error("no esxite clase funcion!");
    }

    public static function link($route){
        return $_SERVER['SCRIPT_NAME'].$route;
    }

    public static function resource($entity, $controller){
        Route::get($entity,"$controller@index");
        Route::get("$entity/create","$controller@create");
        Route::post("$entity/store","$controller@store");
        Route::get("$entity/{id}","$controller@show");
        Route::get("$entity/{id}/edit","$controller@edit");
        Route::post("$entity/{id}/update","$controller@update");
        Route::get("$entity/{id}/delete","$controller@delete");
    }
}
