<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<style>
    * {
        -webkit-print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    @page {
        size: auto;
        margin: 0rem;
    }

    body {
        margin-top: 20px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
        font-family: SansSerif;
    }

    .container {
        max-width: 900px;
        margin: auto;
    }

    .invoice-container {
        padding: 1rem;
    }

    .invoice-container .invoice-header .invoice-logo {
        margin: 0.8rem 0 0 0;
        display: inline-block;
        font-size: 1.6rem;
        font-weight: 700;
        color: #2e323c;
    }

    .invoice-container .invoice-header .invoice-logo img {
        max-width: 130px;
    }

    .invoice-container .invoice-header address {
        font-size: 0.8rem;
        color: #9fa8b9;
        margin: 0;
    }

    .invoice-container .invoice-details {
        margin: 1rem 0 0 0;
        padding: 1rem;
        line-height: 180%;
        background: #f5f6fa;
    }

    .invoice-container .invoice-details .invoice-num {
        text-align: right;
        font-size: 0.8rem;
    }

    .invoice-container .invoice-body {
        padding: 1rem 0 0 0;
    }

    .invoice-container .invoice-footer {
        text-align: center;
        font-size: 0.7rem;
        margin: 5px 0 0 0;
    }

    .invoice-status {
        text-align: center;
        padding: 1rem;
        background: #ffffff;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .invoice-status h2.status {
        margin: 0 0 0.8rem 0;
    }

    .invoice-status h5.status-title {
        margin: 0 0 0.8rem 0;
        color: #9fa8b9;
    }

    .invoice-status p.status-type {
        margin: 0.5rem 0 0 0;
        padding: 0;
        line-height: 150%;
    }

    .invoice-status i {
        font-size: 1.5rem;
        margin: 0 0 1rem 0;
        display: inline-block;
        padding: 1rem;
        background: #f5f6fa;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
    }

    .invoice-status .badge {
        text-transform: uppercase;
    }

    @media (max-width: 767px) {
        .invoice-container {
            padding: 1rem;
        }
    }


    .custom-table {
        border: 1px solid #e0e3ec;
    }

    .custom-table thead {
        background: #007ae1;
    }

    .custom-table thead th {
        border: 0;
        color: #ffffff;
    }

    .custom-table > tbody tr:hover {
        background: #fafafa;
    }

    .custom-table > tbody tr:nth-of-type(even) {
        background-color: #ffffff;
    }

    .custom-table > tbody td {
        border: 1px solid #e6e9f0;
    }


    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }

    .text-success {
        color: #00bb42 !important;
    }

    .text-muted {
        color: #9fa8b9 !important;
    }

    .custom-actions-btns {
        margin: auto;
        display: flex;
        justify-content: flex-end;
    }

    .custom-actions-btns .btn {
        margin: .3rem 0 .3rem .3rem;
    }
</style>
<body onload="window.print()">
<div class="container">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="invoice-logo">
                                        Brother's
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right">
                                        Borther's Ltd. Gouripur,
                                        Mymensingh.<br>
                                        01722879377
                                    </address>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <address>
                                            {{$data->customer->name}}<br>
                                            {{$data->customer->address}}
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Invoice - #00{{$data->id}}</div>
                                            <div>{{date('i-F, Y',strtotime($data->created_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->order_items as $item)

                                                <tr>
                                                    <td>
                                                        {{$item->product_name}}
                                                    </td>
                                                    <td class="text-right">{{$item->product_price}} &#2547;</td>
                                                    <td class="text-right">{{$item->product_qty}}</td>
                                                    <td class="text-right">{{$item->product_price * $item->product_qty}}
                                                        &#2547;
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="2">
                                                    <p>
                                                        Subtotal<br>
                                                        Shipping &amp; Handling<br>
                                                        Tax<br>
                                                    </p>
                                                    <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                </td>
                                                <td class="text-right">
                                                    <p>
                                                        {{$data->amount}} &#2547;<br>
                                                        100 &#2547;<br>
                                                        00 &#2547;<br>
                                                    </p>
                                                    <h5 class="text-success"><strong>{{$data->amount + 100}}
                                                            &#2547;</strong></h5>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="4"><span
                                                        style="color:darkgreen;">Total amount in word : </span><span
                                                        style="color:purple;">{{ucfirst(convert_number_to_words($data->amount + 100))}} Taka Only.</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-footer">
                            Thank you for your Business.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="invoice-logo">
                                        Brother's
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right">
                                        Borther's Ltd. Gouripur,
                                        Mymensingh.<br>
                                        01722879377
                                    </address>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <address>
                                            {{$data->customer->name}}<br>
                                            {{$data->customer->address}}
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Invoice - #00{{$data->id}}</div>
                                            <div>{{date('i-F, Y',strtotime($data->created_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->order_items as $item)

                                                <tr>
                                                    <td>
                                                        {{$item->product_name}}
                                                    </td>
                                                    <td class="text-right">{{$item->product_price}} &#2547;</td>
                                                    <td class="text-right">{{$item->product_qty}}</td>
                                                    <td class="text-right">{{$item->product_price * $item->product_qty}}
                                                        &#2547;
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="2">
                                                    <p>
                                                        Subtotal<br>
                                                        Shipping &amp; Handling<br>
                                                        Tax<br>
                                                    </p>
                                                    <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                </td>
                                                <td class="text-right">
                                                    <p>
                                                        5000 &#2547;<br>
                                                        100.00 &#2547;<br>
                                                        49.00 &#2547;<br>
                                                    </p>
                                                    <h5 class="text-success"><strong>5150.99 &#2547;</strong></h5>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="4"><span
                                                        style="color:darkgreen;">Total amount in word : </span><span
                                                        style="color:purple;">{{ucfirst(convert_number_to_words($item->product_price * $item->product_qty))}} Taka Only.</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-footer">
                            Thank you for your Business.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

@php

    function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
    0                   => 'zero',
    1                   => 'one',
    2                   => 'two',
    3                   => 'three',
    4                   => 'four',
    5                   => 'five',
    6                   => 'six',
    7                   => 'seven',
    8                   => 'eight',
    9                   => 'nine',
    10                  => 'ten',
    11                  => 'eleven',
    12                  => 'twelve',
    13                  => 'thirteen',
    14                  => 'fourteen',
    15                  => 'fifteen',
    16                  => 'sixteen',
    17                  => 'seventeen',
    18                  => 'eighteen',
    19                  => 'nineteen',
    20                  => 'twenty',
    30                  => 'thirty',
    40                  => 'fourty',
    50                  => 'fifty',
    60                  => 'sixty',
    70                  => 'seventy',
    80                  => 'eighty',
    90                  => 'ninety',
    100                 => 'hundred',
    1000                => 'thousand',
    1000000             => 'million',
    1000000000          => 'billion',
    1000000000000       => 'trillion',
    1000000000000000    => 'quadrillion',
    1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
    return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
    // overflow
    trigger_error(
    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
    E_USER_WARNING
    );
    return false;
    }

    if ($number < 0) {
    return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
    list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
    case $number < 21:
    $string = $dictionary[$number];
    break;
    case $number < 100:
    $tens   = ((int) ($number / 10)) * 10;
    $units  = $number % 10;
    $string = $dictionary[$tens];
    if ($units) {
    $string .= $hyphen . $dictionary[$units];
    }
    break;
    case $number < 1000:
    $hundreds  = $number / 100;
    $remainder = $number % 100;
    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
    if ($remainder) {
    $string .= $conjunction . convert_number_to_words($remainder);
    }
    break;
    default:
    $baseUnit = pow(1000, floor(log($number, 1000)));
    $numBaseUnits = (int) ($number / $baseUnit);
    $remainder = $number % $baseUnit;
    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
    if ($remainder) {
    $string .= $remainder < 100 ? $conjunction : $separator;
    $string .= convert_number_to_words($remainder);
    }
    break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
    $string .= $decimal;
    $words = array();
    foreach (str_split((string) $fraction) as $number) {
    $words[] = $dictionary[$number];
    }
    $string .= implode(' ', $words);
    }

    return $string;
    }
@endphp
