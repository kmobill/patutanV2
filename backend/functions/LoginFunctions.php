<?php
require_once('../services/generalQuery.php');
function login($user, $pass)
{
  $query = "select * from usuarios where usuario = '" . $user . "'";
  $queryResult = db_query($query);
  $result['signIn'] = false;
  if (gettype($queryResult) == 'array' && count($queryResult) > 0 && (array_key_exists('contraseña', $queryResult[0]))) {
    if ($queryResult[0]['contraseña'] == $pass) {
      $result['signIn'] = true;
    }
  } else {
    $result['error'] = 'something went wrong';
  }
  echo json_encode($result);
}
