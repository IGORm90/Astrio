<?php

    require 'abstractBox.php';
    require 'Db.php';

    class DbBox extends AbstractBox {

        public $db;
        private static $instance;

        private function __construct(){
            $this->db = new Db;
        }

        private function __clone(){}

        private function __wakeup(){}

        public static function getInstance(): DbBox {
            if(self::$instance === null){
                self::$instance = new self();
            }

            return self::$instance;
        }

        //Загрузка данных
        public function load(){
            $dbData = $this->db->selectData('SELECT * FROM data');
            $this->value = [];
            foreach($dbData as $dv){
                $this->value[$dv['data_key']][] = $dv['data_value']; 
            }
        }

        //Метод сохраняющий как массив, так и скалярное значение
        public function save(){
            $this->db->deleteData('DELETE FROM data WHERE data_key = (?)', (string)$this->key);
            if(is_array($this->value)){
                for($i = 0; $i < count($this->value); $i++){
                    $this->db->insertData('INSERT INTO data (data_key, data_value) VALUES (?,?)', ['key' => (string)$this->key, 'value' => (string)$this->value[$i]]);
                }
            } else {
                $this->db->insertData('INSERT INTO data (data_key, data_value) VALUES (?,?)', ['key' => (string)$this->key, 'value' => (string)$this->value]);
            } 
        }

    }