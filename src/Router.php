<?php

namespace App;

class Router {
    private static $routes = [];
    private $path;
    private $method;


    public function __construct($method, $path){
        $this->method = $method;
        $this->path = parse_url($path)['path'];
    }

    public function match(){
        foreach(self::$routes as $route) {
            if($route['method'] === $this->method && $route['path'] === $this->path){
                return $route;
            }
        }
        echo "404";
    }

    


    public static function addRoute($method, $path, $action){
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action
        ];
    }

    public static function get($path, $action){
        self::addRoute('GET' , $path, $action);
    }

    public static function post($path, $action){
        self::addRoute('POST' , $path, $action);
    }
}