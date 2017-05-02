<?php

if (isset($_POST['username']) || isset($_POST['register'])) {
    include_once(LIBRARY_PATH . "jwt/JWT.php");
    include_once("Renter.php");
    include_once(LIBRARY_PATH . "TheDatabase.php");
} else if (!empty($_POST['review']) || !empty($_GET['movieid'])) {
    include_once("../configs/config.php");
    include_once("jwt/JWT.php");
    include_once("TheDatabase.php");
}

$decodedData;

//TODO CHECK IF REGISTER WORKS

echo !empty($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']);

if (!empty($_POST['username']) && !empty($_POST['password']) && isset($_POST['login'])) {

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

            $renter = new Renter("", "", "", "", "", "", $database);
            $renter->fetchU($user->getUsername());

            $data = [
                'iat' => $issuedAt,         // Issued at: time when the token was generated
                'jti' => $tokenId,          // Json Token Id: an unique identifier for the token
                'iss' => $serverName,       // Issuer
                'nbf' => $notBefore,        // Not before
                'exp' => $expire,           // Expire
                'data' => [                 // Data related to the logged user you can set your required data
                    'username' => $user->getUsername(),
                    'renterid' => $renter->getRenterID()
                ]
            ];

            $secretKey = base64_decode(SECRET_KEY);

            $jwt = JWT::encode(
                $data,
                $secretKey,
                ALGORITHM
            );

            $_SESSION["user"] = $jwt;
            setcookie("user", $jwt);

            header("location:index.php?page=All Movies");
        } else {
            echo "FAIL LOGIN";
            //TODO HANDLE
        }

        $database->close();
    } else {
        error_log("Error connecting to DB! Time: " . time() . "\r\n", "3", "../data/log/errors.log");
    }
}

if (isset($_POST['register'])) {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
            $config['db']['dbName']);

        if ($database->connect()) {
            $email = htmlentities(strip_tags(trim($_POST['email'])));
            $username = htmlentities(strip_tags(trim($_POST['username'])));
            $password = htmlentities(strip_tags(trim($_POST['password'])));

            $user = new User($username, $password, $email, "", $database);

            if ($user->register()) {

            } else {

            }

            $database->close();
        } else {
            //TODO HANDLE
        }
    }
}

function getDecodedData()
{
    if (isset($_SESSION["user"])) {
        include_once(LIBRARY_PATH . "jwt/JWT.php");
        try {
            $secretKey = base64_decode(SECRET_KEY);
            return JWT::decode($_SESSION["user"], $secretKey, array(ALGORITHM));
        } catch (Exception $e) {
            header("location:index.php?page=Login");
            exit();
        }
    }

    return false;
}

function getDecodedDataCookie($cookie)
{
    try {
        $secretKey = base64_decode(SECRET_KEY);
        return JWT::decode($cookie, $secretKey, array(ALGORITHM));
    } catch (Exception $e) {
        //FAILED AUTHORISATION
    }

    return false;
}