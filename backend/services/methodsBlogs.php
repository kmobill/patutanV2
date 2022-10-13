<?php
header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('./generalQuery.php');
// $options2 = json_decode($_POST['options'], true);
function getInfoMultipleFilters($table, $ops, $values)
{
  $query = "select * from " . $table . " where ";
  for ($i = 0; $i < count($ops); $i++) {
    if ($i == (count($ops) - 1)) {
      $query .= $ops[$i] . ' = "' . $values[$i] . '";';
    } else {
      $query .= $ops[$i] . ' = "' . $values[$i] . '" and ';
    }
  }
  // return $query;
  // $query = "select * from blogs where " . $opcion . " = '" . $value . "';";
  $queryResult = db_query($query);
  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    return $queryResult;
  } else {
    return false;
  }
  // return $query;
}
function getInfoBlog($opcion, $value)
{
  $query = "select * from blogs where " . $opcion . " = '" . $value . "';";
  $queryResult = db_query($query);
  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    return $queryResult;
  } else {
    return false;
  }
}


function login($user, $pass)
{
  $query = "select * from usuarios where usuario = '" . $user . "'";
  $queryResult = db_query($query);
  // echo json_encode($query);
  // echo json_encode($queryResult[0]['cedula']);
  $result['signIn'] = false;
  if (gettype($queryResult) == 'array' && count($queryResult) > 0 && (array_key_exists('contraseña', $queryResult[0]))) {
    if ($queryResult[0]['contraseña'] == $pass) {

      // Store a string into the variable which
      // need to be Encrypted
      $simple_string = $user . ":" . $pass;

      // Store the cipher method
      $ciphering = "AES-128-CTR";

      // Use OpenSSl Encryption method
      $iv_length = openssl_cipher_iv_length($ciphering);
      $options = 0;

      // Non-NULL Initialization Vector for encryption
      $encryption_iv = '1234567891011121';

      // Store the encryption key
      $encryption_key = "KMBkeyPatutan";

      // Use openssl_encrypt() function to encrypt the data
      $encryption = openssl_encrypt(
        $simple_string,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
      );

      // Non-NULL Initialization Vector for decryption
      // $decryption_iv = '1234567891011121';

      // Store the decryption key
      // $decryption_key = "KMBkeyPatutan";

      // Use openssl_decrypt() function to decrypt the data
      // $decryption = openssl_decrypt(
      //   $encryption,
      //   $ciphering,
      //   $decryption_key,
      //   $options,
      //   $decryption_iv
      // );
      $result['token'] = $encryption;
      // $result['decryption'] = $decryption;
      $result['signIn'] = true;
    }
  } else {
    $result['error'] = 'something went wrong';
  }
  echo json_encode($result);
}

function verifyToken($token)
{
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "KMBkeyPatutan";

  // Use openssl_decrypt() function to decrypt the data
  $decryption = openssl_decrypt(
    $token,
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  $result = explode(":", $decryption);
  return $result;
}

function getBlogs()
{
  $query = "select * from blogs";
  $queryResult = db_query($query);
  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    $result['blogs'] = $queryResult;
  } else {
    $result['error'] = 'something went wrong';
  }
  echo json_encode($result);
}
// function getInfoBlog($id)
// {
//   $query = "select * from blogs where id = " . $id;
//   $queryResult = db_query($query);

//   if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
//     $result['info'] = $queryResult;
//   } else {
//     $result['error'] = 'something went wrong';
//   }
//   echo json_encode($result);
// }

function getGalleryBlog($id)
{
  $query = "select * from blogimages where blogId = " . $id;
  $queryResult = db_query($query);

  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    $result['blogImages'] = $queryResult;
  } else {
    $result['error'] = 'something went wrong';
  }
  echo json_encode($result);
}

function saveImage($base64img, $url)
{
  $aux = explode(",", $base64img);
  $img = str_replace($aux[0], '', $aux[1]);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $success = file_put_contents($url, $data);
  return gettype($success) == 'integer';
}

$options = $_POST['options'];
// echo json_encode($options);

if ($options == 'saveBlog') {
  $defaultPathBackend = '../../assets/images/blog/portadas/';
  $defaultPathFrontend = '../assets/images/blog/portadas/';

  $data = $_POST['data'];
  $titleFront = $data['titleFront'];
  $description = $data["description"];
  $titleGallery = $data["titleGallery"];
  $isImportant = $data["isImportant"];
  $userLoader = $data["userLoader"];
  $fileNameimg = $data['imgName'];

  $base64img = $data["img"];
  $base64imgex = explode(",", $base64img);
  $img = str_replace($base64imgex[0], '', $base64imgex[1]);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $urlImageBackend = $defaultPathBackend . $fileNameimg;
  $urlImageFrontPage = $defaultPathFrontend . $fileNameimg;
  $success = file_put_contents($urlImageBackend, $data);
  $response['success'] = false;

  if (gettype($success) == 'integer') {
    $query =
      "
    INSERT 
    INTO blogs (urlImageFrontPage, description,titleFront,titleGallery,isImportant,userLoader) 
    VALUES ('" . $urlImageFrontPage . "',
    '" . $description . "',
    '" . $titleFront . "', 
    '" . $titleGallery . "',
    " . $isImportant . ",
    " . $userLoader . ");";

    $queryResult = db_query($query);
    if ($queryResult == true) {
      $response['success'] = true;
      $response['message'] = 'Blog guardado correctamente';
    } else {
      $response['error'] = 'Something went wrong while saving the blog in DB';
    }
  } else {
    $response['error'] = 'Something went wrong while saving the image locally';
  }
  echo json_encode($response);
}
if ($options == 'galleryImages') {

  $defaultPathBackend = '../../assets/images/blog/';
  $defaultPathFrontend = '../assets/images/blog/';
  $data = $_POST['data'];
  $img = $data['img'];
  $idBlog = $data['idBlog'];
  $result['save success'] = saveImage($img, $defaultPathBackend);
  $urlImage = $defaultPathFrontend . $data['imgName'];
  $userLoader = $data['userLoader'];

  $response['success'] = false;

  if ($result['save success'] == true) {
    $query = "INSERT INTO blogimages (urlImage,idBlog,userLoader) VALUES ('." . $urlImage . "'," . $idBlog . ",1);";
    $queryResult = db_query($query);
    if ($queryResult == true) {
      $response['success'] = true;
      $response['message'] = 'Blog guardado correctamente';
    } else {
      $response['error'] = 'Something went wrong while saving the blog in DB';
    }
  } else {
    $response['error'] = 'Something went wrong while saving the image locally';
  }
  echo json_encode($response);
}


if ($options == 'signIn') {
  $data = $_POST['data'];
  if (array_key_exists('user', $data) && array_key_exists('pass', $data)) {
    $user = $data['user'];
    $pass = $data['pass'];
    login($user, $pass);
  } else {
    $response['error'] = 'inserted data is not correct';
    echo  json_encode($response);
  }
}

if ($options == 'getGalleryBlog') {
  $id = $_POST['id'];
  $query = "select * from blogs where id = " . $id;
  $queryResult = db_query($query);
  // echo json_encode($queryResult);
  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    $response['blog'] = $queryResult[0];
  } else {
    $response['error'] = 'something went wrong';
  }
  echo json_encode($response);
}
if ($options == 'getGalleryImages') {
  $id = $_POST['id'];
  $query = "select * from blogimages where idBlog = " . $id;
  $queryResult = db_query($query);
  // echo json_encode($queryResult);
  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    $response['blogImages'] = $queryResult;
  } else {
    $response['error'] = 'something went wrong';
  }
  echo json_encode($response);
}
if ($options == 'getInfoBlog') {
  // $optionAux = $_POST['option'];
  // $valueAux = $_POST['value'];
  // echo json_encode(getInfoBlog($optionAux, $valueAux));
  echo json_encode(getInfoMultipleFilters('blogs', $_POST['ops'], $_POST['values']));
}

if ($options == 'getBlogs') {
  getBlogs();
}
if ($options == 'testJSON') {
  $data = [];
  if (isset($_POST['data'])) {
    $res['dataasdasd'] = $_POST['data'];
    $data = $_POST['data'];
    // echo json_encode($data);
  }
  if (isset($data['example1']) and isset($data['example2'])) {
    $res['e1']  = $data['example1'];
    $res['e2']  = $data['example2'];
    echo json_encode($res);
  } else {
    echo json_encode([$res, $_POST]);
  }
}
if ($options == 'verifyToken') {

  $token = $_POST['token'];
  $descrypted = verifyToken($token);
  $userAux = $descrypted[0];
  $passAux = $descrypted[1];

  $response['validate'] = false;

  $query = "select contraseña from usuarios where usuario = '" . $userAux . "'";
  $queryResult = db_query($query);

  if (gettype($queryResult) == 'array' && count($queryResult) > 0) {
    array_key_exists('contraseña', $queryResult[0]) ? $passDB = $queryResult[0]['contraseña'] : $passDB = '';
    if ($passAux == $passDB) {
      $response['validate'] = true;
    }
  } else {
    $response['error'] = 'something went wrong';
  }
  // $response['password'] = $passAux;
  // $response['user'] = $userAux;
  // $response['query'] = $queryResult;
  // $response['contraseñaDB'] = $passDB;
  // $response['descrypted'] = $descrypted;

  echo json_encode($response);
}
// } catch (Exception $e) {
//   $result['error'] = $e;
//   $result['body'] = $_POST;
//   echo json_encode($result);
// }
