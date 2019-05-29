<?php
/* Configuration Info */

// DATABASE Information
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio-7');
define('DB_USER', 'root');
define('DB_PASS', '');

define('DB_HOST_LIVE', 'localhost');
define('DB_NAME_LIVE', 'kazkoks_...');
define('DB_USER_LIVE', 'kazkoks_...');
define('DB_PASS_LIVE', 'kazkoks_...');

define('DB_CHARSET', 'utf8');


// SALT Information
define('SITE_KEY', 'QJsxGjOIdej#OT3EhtIVLEabZMrxm!%4ZHJWnXAjxbPt4mYGtyb!@$%&^%VCpxqC5Bu6KSOJM$$##VJV9jLF5uWiiFXm1G');
define('NONCE_SALT', 'fxmAMC5TiP35N48t3Oeh2DfbOOX4*&F73lVbTaoOpaOlLydef#_+kvusgY2_)(dggm8KZNgafnuujTPdazfzqpDy');
define('AUTH_SALT', 'g)(*)Um9SX*&RfA7Umlmy4ZvH04rCqWaAoMdbyLNuRdvH(gwL0WvSDm6&^&k3iwMqPghWzTgqMSiy)(&2xjp7KH2ahNNc');


// PROJECT Information
include_once 'global-variables.php';

if ( $_SERVER["SERVER_NAME"] === 'localhost' ) {
    $DOMAIN = 'http://localhost/portfolio/';
    $LOCALHOST = true;
    $VERSION = 'dev_'.time();
    if ( sizeof($DEV_LANG_LIST) > 0 ) {
        $LANG_LIST = array_merge( $LANG_LIST, $DEV_LANG_LIST );
    }
}

define('HOME_URL', $DOMAIN);
define('ASSET', $VERSION);

if ( $LOCALHOST === false ) {
    // Security headers
    header('Strict-Transport-Security:max-age=2628000');

    // //CSP only works in modern browsers Chrome 25+, Firefox 23+, Safari 7+
    // $headerCSP = 'Content-Security-Policy:'.
    //         'connect-src "self";'. // XMLHttpRequest (AJAX request), WebSocket or EventSource.
    //         'default-src "self";'. // Default policy for loading html elements
    //         'frame-ancestors "self";'. //allow parent framing - this one blocks click jacking and ui redress
    //         'frame-src "none";'. // valid sources for frames
    //         // 'media-src "self" *.example.com;'. // vaid sources for media (audio and video html tags src)
    //         'object-src "none"; '. // valid object embed and applet tags src
    //         // 'report-uri https://example.com/violationReportForCSP.php;'. //A URL that will get raw json data in post that lets you know what was violated and blocked
    //         'script-src "self" "unsafe-inline" uxfix.com https://ssl.google-analytics.com ;'. // allows js from self, jquery and google analytics.  Inline allows inline js
    //         'style-src "self" "unsafe-inline" uxfix.com;';// allows css from self and inline allows inline css
    // //Sends the Header in the HTTP response to instruct the Browser how it should handle content and what is whitelisted
    // //Its up to the browser to follow the policy which each browser has varying support
    // header($headerCSP);

    //X-Frame-Options is not a standard (note the X- which stands for extension not a standard)
    //This was never officially created but is supported by a lot of the current browsers in use in 2015 and will block iframing of your website
    header('X-Frame-Options: SAMEORIGIN');

    header("X-XSS-Protection: 1; mode=block");

    header("X-Content-Type-Options: nosniff");

    header("Referrer-Policy: no-referrer");
}

?>