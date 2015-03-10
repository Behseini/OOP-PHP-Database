<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This is Calss to create Singlton Connection
 *
 * @author Behrouz Hosseini
 */
class AppDB {
    private $host = "localhost";
    private $user     = "root";
    private $password = "";
    private $db       = "test";
    protected $_mysql;
    protected $_query;
    
    public static $instance;
            
    public static function  getInstance(){
       if (!isset(self::$instance)) {
           self:: $instance = new AppDB();
       }
       return self:: $instance;
    }
    
    public function __construct(){
      $this->_mysql = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->_mysql->connect_error){
            die($this->_mysql->connect_error);
        }
    }
    public function query($sql){
        $this->_query = filter_var($sql, FILTER_SANITIZE_STRING);
        $stmt = $this->_prepareQuery();
        $stmt->execute();
        $results = $this->_dynamicBindResults($stmt);
        return $results;
    }
   
    public function get($tableName, $numRows = NULL){
        
    }
    
    public function insert($tableName, $insertData){
        
    }    
 
    public function update($tableName, $tblData){
        
    }
    
    public function delete($tableName){
        
    }    
    public function where($wProp, $wValue){
        
    } 
    
      protected function _dynamicBindResults($stmt) 
   {
      $parameters = array();
      $results = array();

      $meta = $stmt->result_metadata();

      while ($field = $meta->fetch_field()) {
         $parameters[] = &$row[$field->name];
      }

      call_user_func_array(array($stmt, 'bind_result'), $parameters);

      while ($stmt->fetch()) {
         $x = array();
         foreach ($row as $key => $val) {
            $x[$key] = $val;
         }
         $results[] = $x;
      }
      return $results;
   }
   
    protected function _prepareQuery(){
        if (!$stmt = $this->_mysql->prepare($this->_query)){
            trigger_error('There is Problem On Preparing Query', E_USER_ERROR); 
        }
        return $stmt;
    }

    public function __destruct() {
        
    }
}
