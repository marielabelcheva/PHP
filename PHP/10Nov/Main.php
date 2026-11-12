<?php
include('Jar.php');
include('Cookie.php');
include('Luck.php');

try{
    $cookies = Cookie::generateRandomCookies(5);
    $jar = new Jar($cookies, 10);

    print("Cookies count in the jar: " . $jar->getCookiesCount() . "\n");

    print("\n1.Drawing a cookie from the jar:\n");
    print($jar->drawCookie() . "\n");

    $generatedCookies = Cookie::generateRandomCookies(3);
    foreach ($generatedCookies as $cookie) {
        $jar->addCookie($cookie);
    }

    print("Cookies count in the jar: " . $jar->getCookiesCount() . "\n");

    print("\n2.Drawing a cookie from the jar:\n");
    print($jar->drawCookie() . "\n");

    print("Cookies count in the jar: " . $jar->getCookiesCount() . "\n");

    $generatedCookies = Cookie::generateRandomCookies(10);
    foreach ($generatedCookies as $cookie) {
        $jar->addCookie($cookie);
    }

    $jar2 = new Jar([],5);
    print("Drawing a cookie from the jar:\n");
    print($jar2->drawCookie() . "\n");
    
    
} catch (Exception $e) {
    print("Error: " . $e->getMessage() . "\n");
}
?>