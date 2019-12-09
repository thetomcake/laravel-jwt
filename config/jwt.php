<?php

    /*
    |--------------------------------------------------------------------------
    | GENERAL WARNING. DO NOT USE THIS PACKAGE WITHOUT READING THIS.
    |--------------------------------------------------------------------------
    |
    | It's 2017. JWT are a (not so much) new and simple way of authenticating your
    | users either you're building a SPA + API or Mobile + API app.
    |
    | It's great you took interest in this package, but you should take real care
    | about the following things:
    |
    | As I was saying. It's 2017. JWT SHOULD NOT BE USED on a API WITHOUT HTTPS.
    | By HTTP, I mean TLS 1.1+.
    | SSL 3.0 and lower are proven insecure actually a couple of years ago.
    |
    | With that in mind, enjoy this. It was made with love with minimalism in mind.
    */

return [

    /*
    |--------------------------------------------------------------------------
    | JWT Secret
    |--------------------------------------------------------------------------
    |
    | This package uses HMAC-SHA265 as default signature mechanism.
    | HMAC-256 is pretty secure and straightforward when using a 32 bytes long key.
    | Since this package aims to be really simple, the crypt algorithm and key length
    | will be hardcoded instead of configurable.
    |
    | This will be like this by design, it will provide strong security for any API
    | while preventing people from making a mess and turning JWT less secure.
    |
    | NOTICE: ONLY USE KEYS GENERATED BY THE COMMAND
    |
    | php artisan jwt:generate
    |
    | If you don't, don't blame me latter.
    |
    | P.S. Don't blame me in any case :).
    */

    'secret'   => env('JWT_SECRET', null),

    /*
    |--------------------------------------------------------------------------
    | JWT Time to live (TTL)
    |--------------------------------------------------------------------------
    |
    | Use an Integer value in minutes.
    |
    | This will set how long will take for a key to be considered expired.
    | In other words, this is the amount of time, in minutes, that will be
    | added to the current time that the token is being issue and set
    | ont the 'exp' claim.
    |
    */
    'ttl'  => 60,

    /*
    |--------------------------------------------------------------------------
    | Expired Token Refresh Limit
    |--------------------------------------------------------------------------
    |
    | Use an Integer value in minutes.
    |
    | This will set how long after the expiration date a token can be refreshed.
    | You can set it to 0 if you DO NOT want expired tokens to refreshed.
    |
    | The default limit of 7200 (minutes) takes in account mobile apps where the
    | logged used may take a few days before using your "app" again.
    |
    | In those cases, the token would have been expired but a new one could still
    | be issued, unless the limit configured here has already passed.
    |
    | If you're considering a not secure client platform, short values here reduces
    | the odds of a leaked token be used to generate a new one.
    |
    */

    'refresh_limit' => 7200,

    /*
    |--------------------------------------------------------------------------
    | Auto Guard Binding By Middleware Match
    |--------------------------------------------------------------------------
    |
    | Useful when your application has more than 1 guard, and the JWT powered one
    | is not the default.
    |
    | If your application is a API only, you can safely set this to false.
    |
    | Setting it to false without having JWT guard as default will make
    | mandatory using the suffix :guardName when using the 'auth' middleware.
    |
    */

    'middleware_match' => true,


    /*
    |--------------------------------------------------------------------------
    | Token detection from request methods
    |--------------------------------------------------------------------------
    |
    | Use an array of strings including: parameter, header
    |
    | Header will check the request for the Authorization: Bearer TOKEN header
    | Parameter will check for the token the request body "token" parameters
    |
     */
    'token_detections' => [
        'parameter',
        'header'
    ]

];