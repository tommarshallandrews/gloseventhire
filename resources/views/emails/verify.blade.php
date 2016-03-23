<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            <strong>Thanks for creating an account with {{ Config::get('app.companyName') }}.</strong><br><br>
            Please follow the link below to verify your email address<br/><br/>
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/><br/>
            Many thanks and have fun!

        </div>

    </body>
</html>