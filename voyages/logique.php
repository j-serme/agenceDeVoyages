<?php

session_start();

$voyages = [

    [
        "destination" => "Canada",
        "prix" => 3455,
        "duree" => 19,
        "image" => "canada.jpg",
        "personnes" => 2,
        "transport" => "avion"
    ],
    [
        "destination" => "Mexique",
        "prix" => 2500,
        "duree" => 12,
        "image" => "mexique.jpg",
        "personnes" => 3,
        "transport" => "avion"
    ],
    [
        "destination" => "Pragues",
        "prix" => 1321,
        "duree" => 15,
        "image" => "pragues.jpg",
        "personnes" => 4,
        "transport" => "train"
    ],
    [
        "destination" => "Danemark",
        "prix" => 2672,
        "duree" => 12,
        "image" => "danemark.jpg",
        "personnes" => 4,
        "transport" => "avion"
    ],
    [
        "destination" => "Italie",
        "prix" => 854,
        "duree" => 10,
        "image" => "italie.jpg",
        "personnes" => 1,
        "transport" => "bus"
    ],


];

$users = [

    [
        "username" => "michel",
        "password" => "blabla"
    ],
    [
        "username" => "etienne",
        "password" => "bidule"
    ],
];


$isLoggedIn = false;

if (isset($_POST['logout'])) {
    unset($_SESSION['isLoggedIn']);
}

foreach ($users as $user) {
    if (
        isset($_POST['username']) && ($_POST['username'] == $user['username'])

        &&

        (isset($_POST['password'])) && ($_POST['password'] == $user['password'])

    ) {

        $isLoggedIn = true;
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = $user['username'];
    }
}


if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    $isLoggedIn = true;
}

$username = $_SESSION['username'] ?? "";
