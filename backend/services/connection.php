<?php
function db_error()
{
  $connection = db_connect();
  return mysqli_error($connection);
}
function db_connect()
{
  static $connection; // Define connection as a static variable, to avoid connecting more than once

  if (!isset($connection)) { // Try and connect to the database, if a connection has not been established
    $config = parse_ini_file('../config.ini'); //load configuration as an array 
    $connection = mysqli_connect($config['hostname'], $config['username'], $config['password'], $config['dbname']);
  }
  if ($connection == false or $connection == null) {
    $res['message'] = 'connection failed';
    $res['error'] = mysqli_connect_error();
    return $res;
  }
  $connection->set_charset("utf8");
  return $connection;
}
