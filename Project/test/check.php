<?php
include_once("../library/jwt/JWT.php");
include_once("../library/User.php");
include_once("../library/TheDatabase.php");
include_once("../configs/config.php");

$action = $_REQUEST['action'];

if (!empty($_POST['username']) && !empty($_POST['password']) && $action === 'login') {

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
        $config['db']['dbName']);

    if ($database->connect()) {

        $username = htmlentities(strip_tags(trim($_POST['username'])));
        $password = htmlentities(strip_tags(trim($_POST['password'])));

        $user = new User($username, $password, "", "", $database);

        if ($user->login()) {

            $tokenId = base64_encode(random_bytes(32));
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
                    'username' => $user->getUsername(),
                ]
            ];

            $secretKey = base64_decode(SECRET_KEY);

            $jwt = JWT::encode(
                $data, //Data to be encoded in the JWT
                $secretKey, // The signing key
                ALGORITHM
            );

            //$unencodedArray = ['jwt' => $jwt];
            //echo '{"status" : "success","resp":' . json_encode($unencodedArray) . '}';

            $_SESSION["user"] = $jwt;

        } else {
            //echo '{"status" : "fail" ,"msg":"Invalid email or passowrd"}';
            //TODO HANDLE
        }

        $database->close();
    } else {
        error_log("Error connecting to DB! Time: " . time() . "\r\n", "3", "../data/log/errors.log");
    }
} else if ($action == 'authenticate') {
    try {
        $secretKey = base64_decode(SECRET_KEY);
        $decodedDataArray = JWT::decode($_GET['tokanVal'], $secretKey, array(ALGORITHM));

        echo '{"status" : "success" ,"data":' . json_encode($decodedDataArray) . ' }';
        die();

    } catch (Exception $e) {
        echo '{"status" : "fail" ,"msg":"Unauthorized " }';
        die();
    }
}

if (isset($_SESSION["user"])) {
    try {
        $secretKey = base64_decode(SECRET_KEY);
        $decodedData = JWT::decode($_SESSION["user"], $secretKey, array(ALGORITHM));

    } catch (Exception $e) {
        header("location:index.php?page=Login");
        exit();
    }
} else {
    header("location:index.php?page=Login");
    exit();
}
