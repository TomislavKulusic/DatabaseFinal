<?php
include_once("../library/jwt/JWT.php");
include("../library/User.php");
include("../library/TheDatabase.php");
include("../configs/config.php");

$action = $_REQUEST['action'];
define('SECRET_KEY', 'Your-Secret-Key');  /// secret key can be a random string and keep in secret from anyone
define('ALGORITHM', 'HS256');   // Algorithm used to sign the token, see

if (!empty($_POST['username']) && !empty($_POST['password']) && $action === 'login') {

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
        $config['db']['dbName']);

    if ($database->connect()) {

        $username = htmlentities(strip_tags(trim($_POST['username'])));
        $password = htmlentities(strip_tags(trim($_POST['password'])));

        $user = new User($username, $password, "", "", $database);

        if ($user->login()) {

            $tokenId = base64_encode(mcrypt_create_iv(32));
            $issuedAt = time();
            $notBefore = $issuedAt + 10;  //Adding 10 seconds
            $expire = $notBefore + 7200; // Adding 60 seconds
            $serverName = 'http://localhost/'; /// set your domain name

            $data = [
                'iat' => $issuedAt,         // Issued at: time when the token was generated
                'jti' => $tokenId,          // Json Token Id: an unique identifier for the token
                'iss' => $serverName,       // Issuer
                'nbf' => $notBefore,        // Not before
                'exp' => $expire,           // Expire
                'data' => [                 // Data related to the logged user you can set your required data
                    'username' => $user->getUsername(),       // id from the users table
                ]
            ];

            $secretKey = base64_decode(SECRET_KEY);

            $jwt = JWT::encode(
                $data, //Data to be encoded in the JWT
                $secretKey, // The signing key
                ALGORITHM
            );

            $unencodedArray = ['jwt' => $jwt];

            echo '{"status" : "success","resp":' . json_encode($unencodedArray) . '}';

        } else {
            echo '{"status" : "fail" ,"msg":"Invalid email or passowrd"}';
        }

        $database->close();
    } else {
        //TODO HANDLE
    }
} else if ($action == 'authenticate') {
    try {
        $secretKey = base64_decode(SECRET_KEY);
        $DecodedDataArray = JWT::decode($_GET['tokanVal'], $secretKey, array(ALGORITHM));

        echo '{"status" : "success" ,"data":' . json_encode($DecodedDataArray) . ' }';
        die();

    } catch (Exception $e) {
        echo '{"status" : "fail" ,"msg":"Unauthorized " }';
        die();
    }

}