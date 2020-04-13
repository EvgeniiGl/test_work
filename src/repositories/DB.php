<?php

class DB
{
    protected $dbh;

    public function __construct(array $config)
    {
        $db_conf   = $config['db'];
        $dsn       = $db_conf['dsnParams']['type'] . ':host=' . $db_conf['dsnParams']['host'] . ';dbname=' . $db_conf['dsnParams']['dbname'];
        $this->dbh = new PDO($dsn, $db_conf['usr'], $db_conf['pass']);
    }

    public function query($sql, $params = null)
    {
        if (!$sth = $this->dbh->prepare($sql)) {
            $err_arr = $this->dbh->errorInfo();
            $err_msg = sprintf("SQLSTATE ERR: %s<br />\nmySQL ERR: %s<br />\nMessage: %s<br />\n", $err_arr[0],
                $err_arr[1], $err_arr[2]);
            throw new Exception($err_msg);
        }
        if (!$sth->execute($params)) {
            $err_arr = $sth->errorInfo();
            $err_msg = sprintf("SQLSTATE ERR: %s<br />\nmySQL ERR: %s<br />\nMessage: %s<br />\n", $err_arr[0],
                $err_arr[1], $err_arr[2]);
            throw new Exception($err_msg);
        }
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}
