<?php

    namespace App\Table;

    use App\App;

    class Table{

        protected static $table = null;

        public static function find($id){
            return static::query(
                'SELECT * FROM ' . static::$table . ' WHERE id = ?;',
                [$id],
                true
            );
        }

        public static function query($statement, $attributs = null, $one = false){
            if($attributs){
                return App::getDb()->prepare($statement, $attributs, get_called_class(), $one);
            }else{
                return App::getDb()->query($statement, get_called_class(), $one);
            }
        }

        public static function all(){
            return App::getDb()->query(
                'SELECT * FROM ' . static::$table . ';',
                get_called_class()
            );
        }

        public function __get($key){
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }

    }

?>