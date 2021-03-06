
<?php
class db {
    private static $instance = null;
    private function __construct() {
        $host = 'localhost';
        $name = 'datingsite';
        $username = 'root';
        $password = '';
        $this->pdo = new PDO('mysql:host=' . $host . '; dbname=' . $name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function instance() {
        if (!isset(self::$instance)) {
            self::$instance = new db();
        }
        return self::$instance;
    }
// FUNDAMENTAL QUERY FUNCTION
    public function query($sql, $params = array()) {
        $this->query = $this->pdo->prepare($sql);
        $this->query->execute($params);
        return $this->query;
    }
// CUSTOM TOOLS THAT USE QUERY-FUNCTION
    public function get($sql, $params = array()) {
        $this->result = $this->query($sql, $params);
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function count($sql, $params = array()) {
        $this->result = $this->query($sql, $params);
        return $this->result->rowCount();
    }
    public function action($sql, $params = array()) {
        $this->query = $this->pdo->prepare($sql);
        $this->query->execute($params);
    }
    public function string($sql, $key, $params = array()) {
        $this->result = $this->query($sql, $params);
        $this->result = $this->result->fetchAll(PDO::FETCH_ASSOC);
        return $this->result[0][$key];
    }
}