<?php

    require 'abstractBox.php';

    class FileBox extends AbstractBox {

        private static $instance;

        private function __construct(){}

        private function __clone(){}

        private function __wakeup(){}

        public static function getInstance(): FileBox {
            if(self::$instance === null){
                self::$instance = new self();
            }

            return self::$instance;
        }


        public function load(){
            $this->value = json_decode(file_get_contents('data.json'), TRUE);
        }

        public function save(){
            $json = json_decode(file_get_contents('data.json'), TRUE);
            $json[$this->key] = [$this->value];
            file_put_contents('data.json',json_encode($json));
        }

    }