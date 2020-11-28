<?php

    /*
    * PDO Database Class
    * Connect to Database
    * Create prepared statement
    * Bind Values
    * Return rows and results
    * isolate query preparing process
    */
    class Database
    {
        private static $host = DB_HOSTNAME;
        private static $user = DB_USERNAME;
        private static $pass = DB_PASSWORD;
        private static $charset = DB_CHARSET;
        private static $dbname = DB_NAME;
        private static $dbh;
        private static $stmt;
        private static $error;


        public function __construct()
        {
            if(self::$dbh == null) {
                $dsn = 'mysql:host=' . self::$host . ';charset=' . self::$charset . ';dbname=' . self::$dbname;
                $options = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_LOWER
                );

                try {
                    self::$dbh = new PDO($dsn, self::$user, self::$pass, $options);
                } catch (PDOException $e) {
                    self::$error = $e->getMessage();
                    echo self::$error;
                }
            }
        }

        public function query($sql)
        {
            self::$stmt = self::$dbh->prepare($sql);
        }

        public function bind($param, $value, $type = null)
        {
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            self::$stmt->bindValue($param, $value, $type);
       }

       public function execute()
       {
           return self::$stmt->execute();
       }

       public function resultSet(){
           $this->execute();
           return self::$stmt->fetchAll();
       }

       public function single(){
           $this->execute();
           return self::$stmt->fetch();
       }

       public function rowCount(){
           return self::$stmt->rowCount();
       }

    }