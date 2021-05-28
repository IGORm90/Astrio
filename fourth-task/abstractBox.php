<?php

    require 'interfaceBox.php';

    abstract class AbstractBox implements InterfaceBox {

        public function setData($key, $value){
            $this->key = $key;
            $this->value = $value;
        }

        public function getData($key){
            return $this->value[$key];
        }

        public function load(){
            
        }

        public function save(){

        }

    }