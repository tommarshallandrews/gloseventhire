<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>New order</h2>

        <div>
            <strong>You have a new order</strong><br><br>

            Customer View<br/>
            {{ URL::to('/orders/find/' . $id) }}.<br/><br/>

            Specification<br/>
            {{ URL::to('/orders/spec/' . $id) }}<br/><br/>

            Admin View<br/>
            {{ URL::to('/admin/orders/' . $id) }}

        </div>

    </body>
</html>