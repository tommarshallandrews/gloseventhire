<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{ $name }}, thanks for you message</h2>

        <div>
            <strong>The team at {{ Config::get('app.companyName') }} have received your enquiry.</strong><br><br>
            We will be in touch shortly. If its urgent you can always phone us on  <strong>01452 750400</strong><br><br>

        </div>

    </body>
</html>