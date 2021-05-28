<?php 

    interface InterfaceBox{

        public function setData($key, $value);

        public function getData($key);

        public function load();

        public function save();

    }