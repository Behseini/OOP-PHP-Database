
class AppDB {
    private $host = "localhost";
    private $user     = "root";
    private $password = "";
    private $db       = "test";
    protected $_mysql;
    
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
    public function __destruct() {
        
    }
}
