<?php

class Db {
        
        protected $db;

        function __construct(){
            try {
                $this->db = new PDO('mysql:host=127.0.0.1;dbname=fourth_task', 'root', 'root');
              } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
              }         
        }

        public function insertData($sql, $params){
            $stat = $this->db->prepare($sql);
            $stat->execute([$params['key'], $params['value']]);
        }

        public function selectData($sql){
            $stat = $this->db->prepare($sql);
            $stat->execute();
            return $stat->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteData($sql, $param){
            $stat = $this->db->prepare($sql);
            $stat->execute([$param]);
        }
}