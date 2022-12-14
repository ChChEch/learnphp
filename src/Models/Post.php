<?php

namespace App\Models;

use App\DB;


class Post extends Model {

    public static $table = 'posts';

    public $id;
    public $title;
    public $body;

    public function snippet(){
        return substr($this->body, 0, 50);
    }

    public function save(){
        $db = new DB();
        $fields = get_object_vars($this);
        foreach ($fields as $key => $field){
            if($field === NULL){
                unset($fields[$key]);
            }
        }
        $db->insert(static::$table, $fields);
    }

    public static function find($id){
        $db = new DB();
        return $db->find($id, static::$table, static::class);
    }
}