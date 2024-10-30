<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        .font{
            font-size: 15px;
        }
        .authority {
            /*text-align: center;*/
            float: right
        }
        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }
        .thanks p {
            color: green;;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
            <h2 style="color: green; font-size: 26px;"><strong>Hotel</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Hotel Head Office
               Email:support@hotel.com <br>
               Mob: 1245454545 <br>
               Gaza 1207,Pal:#{{$booking->code}} <br>

            </pre>
        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;"></table>

<table width="100%" style="background: #F7F7F7; padding:0 5px;" class="font" border="none">
        <thead>
            <tr>
                <th  style="padding: 10px">Room Type</th>
                <th  style="padding: 10px">Rooms</th>
                <th  style="padding: 10px">Price</th>
                <th  style="padding: 10px">Check In/Out</th>
                <th  style="padding: 10px">Nights</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th  style="padding: 10px">{{$booking->roomType->name}}</th>
                <th  style="padding: 10px">{{$booking->number_of_rooms}} Room(s)</th>
                <th  style="padding: 10px">{{$booking->actual_price}}$</th>
                <th  style="padding: 10px">
                    <div>{{$booking->check_in->format('d M, Y')}}/</div>
                    <div>{{$booking->check_out->format('d M, Y')}}</div>
                </th>
                <th  style="padding: 10px">{{$booking->total_night}} Night(s)</th>
            </tr>
        </thead>
</table>

<br/>

<table class="table" style="float:right;" border="none" width="30%">
    <tr >
        <td  style="padding: 5px; font-size: 16px">SubTotal :</td>
        <td  style="padding: 5px; font-size: 16px">{{$booking->sub_total}}$</td>
    </tr>
    <tr>
        <td  style="padding: 5px; font-size: 16px">Discount :</td>
        <td  style="padding: 5px; font-size: 16px">{{$booking->roomType->discount}}%</td>
    </tr>
    <tr>
        <td  style="padding: 5px; font-size: 16px">Total :</td>
        <td  style="padding: 5px; font-size: 16px">{{$booking->total_price}}$</td>
    </tr>
</table>


<div class="thanks mt-3">
    <p>Thanks For Your Booking..!!</p>
</div>
<div class="authority float-right mt-5" style="margin-top: 60px">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
</div>
</body>
</html>
