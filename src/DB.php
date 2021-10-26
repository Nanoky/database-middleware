<?php

    namespace Bakangoa\Middleware\Database;

    class DB
    {
        const SGBD_SQLITE = "sqlite";
        const SGBD_MYSQL = "mysql";

        /**
         * @param array $config Database configs. Must contains at least 'sgbd' field
         */
        public function __construct(Array $config)
        {
            try {
                switch ($config['sgbd']) {
                    case DB::SGBD_SQLITE:
                        $this->db = new \PDO($config['sgbd'] . ":" . $config['file']);
                        break;

                    case DB::SGBD_MYSQL:
                        $this->db = new \PDO($config['sgbd'] . ":host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['username'], $config['password']);
                        break;
                    
                    default:
                        throw new \Exception("SGBD specified in config is not supported", 1);
                        break;
                }
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\Exception $th) {
                throw $th;
            }
        }

        /**
         * Function to make a select request
         * @param String $query SQL query
         * @param Array $data Array which contains the data
         */
        public function select(String $query, Array $data = [])
        {
            try {
                $statement = $this->db->prepare($query);

                foreach ($data as $key => $value) {
                    $statement->bindParam(":" . $key, $data[$key]);
                }

                $statement->execute();

                return $statement->fetchAll();

            } catch (\Exception $th) {
                throw $th;
            }
        }

        /**
         * Function to make a insert, update or delete request
         * @param String $query SQL query
         * @param Array $data Array which contains the data
         */
        public function set(String $query, Array $data)
        {
            try {
                $statement = $this->db->prepare($query);

                foreach ($data as $key => $value) {
                    $statement->bindParam(":" . $key, $data[$key]);
                }

                $statement->execute();

                return true;

            } catch (\Exception $th) {
                throw $th;
            }
            
            return false;
        }

        public function getLastId()
        {
            return $this->db->lastInsertId();
        }
    }

?>
