<?php

    function connect()
    {
        $pdoConn=false;
        try {
            $pdoConn = new PDO(DB_DSN, DB_USER, DB_PASSWD, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (PDOException $e)
        {
            die("Error al conectar con la base de datos. Configura conf.php.");
        }
        return $pdoConn;
    }
    
