<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        
        <h2>Notification of order </h2>

        <div>

            Please follow the link below to verify your email address<br/><br/>
            {{ URL::to('/admin/order/' . $order->id) }}.


        </div>

    </body>
</html>