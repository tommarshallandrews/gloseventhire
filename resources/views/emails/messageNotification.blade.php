<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        
        <h2>Notification of message</h2>

        <div>
            <strong>You have a new message. Details below:</strong><br><br>

            Email: {{ $email }}<br><br>
            Name: {{ $name }}<br><br>
            {{ $enquiry }}<br><br>
            {{ URL::to('/admin/enquiry/' . $id) }}.



        </div>

    </body>
</html>