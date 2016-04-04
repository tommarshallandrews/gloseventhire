<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Passsword reset</h2>

        <div>
            <strong>{{ Config::get('app.companyName') }}.</strong><br><br>
            Please follow the link below to reset you password.<br/><br/>
            Click here to reset your password:<br><br>{{ url('password/reset/'.$token) }}<br/><br/>
            IMPORTANT!! If you did not request a password update please ignore this and <a href"{{ url('password/reset/'.$token) }}">contact us</a>.

        </div>

    </body>
</html>