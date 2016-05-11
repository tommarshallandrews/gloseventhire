
<!DOCTYPE html>
<html lang="en">
  <head>

<style>
body {
  font-family: sans-serif;
  font-size: 0.7em;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 3px;

}
</style>


  </head>

 <!-- MAIN CONTENT
    ================================================== -->

<h2>
                Order #{{$order->id}}
</h2>
<h4>
                Status: {{$order->status}}<br>
                Updated: {{date('d-m-Y / h:i', strtotime($order->updated_at))}}
</h4>


<table width="100%" border="1">

@foreach($order->product as $product)


  <tr>
    <td>

                    <?php 
                    if($product->cat_id == 60)
                    {
                        echo($product->group->name . " - " . $product->pivot->colour .' - '. $product->group->collection );
                    }
                    else
                    {
                      //echo($product->group_id);
                      echo($product->name . " - " . $product->range->name);
                    } 
                    ?>

    </td>
    <td>{{$product->code }}</td>
    <td>{{$product->pivot->quantity }}</td>
    <td>

                     @if($product->pivot->hex == '#FFFFFF')
                      £{{ number_format($product->pivot->quantity * $product->price2 / 100, 2)}}
                      @else
                      £{{ number_format($product->pivot->quantity * $product->price / 100, 2)}}
                      @endif

    </td>
  </tr>

@endforeach


<tr>


              <td colspan="3">Product Total:</td>
              <td colspan="1">£{{ number_format($totalproduct/100, 2) }}</td>
</tr>
<tr>
              @if($order->return == 'clean')
              <td colspan="3">Return - Clean:</td>
              <td colspan="1">Free</td>
              @else
              <td colspan="3">Return - Dirty:</td>
              <td colspan="1">£{{ number_format($totaldirty/100, 2) }}</td>
              @endif
</tr> 

<tr>

               @if($order->distance == 0)
              <td colspan="3">Delivery - none:</td>
              <td colspan="1">Free</td>
              @else
              <td colspan="3">Delivery ({{ number_format($order->distance , 0) }} miles):</td>
              <td colspan="1">£{{ number_format($order->distance * Config::get('app.poundsPerMile'), 0) }}.00</td>
              @endif


</tr>  

<tr>

             <td colspan="3">VAT:</td>
              <td colspan="1">£{{ number_format($totalvat/100, 2) }}</td>
</tr>   
<tr>

              <td colspan="3"><strong>Grand Total:</strong></td>
              <td colspan="1"><strong>£{{ number_format($totaltotal/100, 2) }}</strong></td>

</tr>


</table>

<h3>Event Details</h3>



<table width="100%" border="1">


<tr>
    <td  width="200px">
    Start date
    </td>
    <td>
    {{ $order->start_date }}
    </td>
</tr>

<tr>
    <td  width="200px">
    End date
    </td>
    <td>
    {{ $order->end_date }}
    </td>
</tr>

<tr>
    <td  width="200px">
    Address 1
    </td>
    <td>
    {{ $order->address1 }}
    </td>
</tr>


<tr>
    <td>
    Address 2
    </td>
    <td>
    {{ $order->address2 }}
    </td>
</tr>


<tr>
    <td>
    Town
    </td>
    <td>
    {{ $order->town }}
    </td>
</tr>


<tr>
    <td>
    County
    </td>
    <td>
    {{ $order->county }}
    </td>
</tr>


<tr>
    <td>
    Postcode
    </td>
    <td>
    {{ $order->postcode }}
    </td>
</tr>

<tr>
    <td>
    Instructions
    </td>
    <td>
    {{ $order->instructions }}
    </td>
</tr>

</table>
             
<h3>Billing Address</h3>


<table width="100%" border="1">

<tr>
    <td width="200px">
    Firstname
    </td>
    <td>
    {{ $user->firstname }}
    </td>
</tr>

<tr>
    <td>
    Surname
    </td>
    <td>
    {{ $user->lastname }}
    </td>
</tr>

<tr>
    <td>
    Address 1
    </td>
    <td>
    {{ $user->address1 }}
    </td>
</tr>


<tr>
    <td>
    Address 2
    </td>
    <td>
    {{ $user->address2 }}
    </td>
</tr>


<tr>
    <td>
    Town
    </td>
    <td>
    {{ $user->town }}
    </td>
</tr>


<tr>
    <td>
    County
    </td>
    <td>
    {{ $user->county }}
    </td>
</tr>


<tr>
    <td>
    Address 1
    </td>
    <td>
    {{ $user->postcode }}
    </td>
</tr>

<tr>
    <td>
    Phone
    </td>
    <td>
    {{ $user->phone }}
    </td>
</tr>

</table>



  </body>
</html>