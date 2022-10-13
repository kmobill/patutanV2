<?php
date_default_timezone_set('America/Guayaquil');
require_once('./connection.php'); //db_connect();
function get_results($obj_from_db)
{
  $rows = array();
  while ($row = mysqli_fetch_assoc($obj_from_db)) {
    $rows[] = $row;
  }
  return $rows;
}

function db_query($query)
{
  // Connect to the database
  $connection = db_connect();
  // Query the database
  // if (array_key_exists('error', $connection)) {
  //   return false;
  // } else {
  $result = mysqli_query($connection, $query);
  // }


  if (gettype($result) == 'boolean') {
    return $result;
  } else if (gettype($result) == 'object') {
    return get_results($result);
  }
}
