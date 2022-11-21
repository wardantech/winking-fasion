<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commercial Invoice </title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        .print{
            width: 100px;
            background: rgb(230, 11, 11);
            padding: 10px;
            color:#fff;
            border-radius: 7px;
            margin-top: 20px;
            margin-right:20px;
        }
        table td{
            padding:10px;
        }
        @media print {
        #printButton {
            display: none;
        }
        }
    </style>
</head>
<body>
    <div style="text-align:right;  padding-top: 20px;">
        <a class="btn print btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true" id="printButton">
            <i class="fa fa-print"></i> Print</a>
    </div>

    <div style="text-align: center;" class="heading">
        <h2>Winking Fashion</h2>
        <p>HOUSE # 128. ROAD # 01. BARIDHARA DOHS. DHAKA-1206. BANGLADESH</p>
        <p>PHONE: +88 02 841 9355</p>
    </div>

    <hr>
    <h1>COMMERCIAL INVOICE PPER</h1>
    <table border="1">
       <tr>
        <td rowspan="5">
            <P><strong>SHIPPER/EXPORTER</strong></P>
            <h4>{{ $data->export->shipper->name }}</h4>
            <P>{{ $data->export->shipper->address }} </P>
            <p></p>
        </td>
        <td>Invoice No</td>
        <td>{{ $data->export->invoice_no }}</td>
        <td>Date</td>
        <td>{{ $data->date }}</td>
       </tr>
       <tr>
        <td>LC No</td>
        <td>{{ $data->export->lc_number }}</td>
        <td>Date</td>
        <td>23-06-2022</td>
       </tr>
       <tr>
        <td>EXP NO</td>
        <td>{{ $data->exp_no }}</td>
        <td>Date</td>
        <td>23-06-2022</td>
       </tr>
       <tr>
        <td>SHIPMENT TERMS:</td>
        <td colspan="2">{{ $data->shipment_terms }}</td>
        <td></td>
       </tr>
       <tr>
        <td>PAYMENT TERMS:</td>
        <td>{{ $data->payment_terms }}</td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td rowspan="6">
            <p><strong>BENEFICIARY NAME & ADDRESS :</strong></p>
            <p><strong>WINKING FASHION</strong></p>
            <p>HOUSE # 128, ROAD # 01, BARIDHARA DOHS, DHAKA-1209, BANGLADESH</p>
        </td>
        <td>Port of loading</td>
        <td>{{ $data->port_loading }}</td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td>Port of destination</td>
        <td>{{ $data->port_destination }}</td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td>
            <p><strong>NOTIFY PARTY</strong></p>
            <p><strong>{{ $data->notify->name }}</strong></p>
            <p>{{ $data->notify->address }}</p>
        </td>
        <td colspan="4">
            <p><strong>BENEFICIARY BANK NAME & ADDRESS:</strong></p>
            <p><strong>{{ $data->bank->name }}</strong></p>
            <p>TRADE OPERATIONS DEPARTMENT.</p>
            <p>HEAD OFFICE. 220/B. ANIK TOWER, LEVEL-11. TEJGAON </p>
            <p>SWIFT CODE BRAKBDDH</p>
            <p>AIC NO. 1534204780312001</p>
        </td>
       </tr>
    </table>
    <table border="1">
        <tr>
            <td>SHIPING MARK</td>
            <td>DESCRIPTION OF GOODS</td>
            <td>CTN QTY</td>
            <td>QUANTITY IN PCS</td>
            <td>UNIT PRICE IN US $</td>
            <td>TOTAL PRICE IN US $</td>
        </tr>
        <tr>
            <td rowspan="3">
                <p><strong>{{ $data->notify->name }}</strong></p>
            <p>{{ $data->notify->address }}</p>
            </td>
            <td>Readymate Garments</td>
            <td colspan="4">POB CHITAGONJ BANGLADESH</td>
        </tr>


            @php
                $description_good = json_decode($data->description_good, true);
                $ctn_qty = json_decode($data->ctn_qty, true);
                $quantity_pcs = json_decode($data->quantity_pcs, true);
                $unit_price = json_decode($data->unit_price, true);
                $total_price = json_decode($data->total_price, true);

                $totalPrice = 0; $totalCTN = 0; $totalPCS = 0;
            @endphp

            @foreach( $description_good as $key => $value )
            <tr>
                <td>
                    <p>{{$description_good[$key]}}</p>
                </td>
                <td>{{$ctn_qty[$key]}} CTNS</td>
                <td>{{$quantity_pcs[$key]}} PCS</td>
                <td>${{ number_format($unit_price[$key], 2)}} </td>
                <td>${{ number_format($total_price[$key], 2)}}</td>
            </tr>

            @php
                $totalPCS   += $ctn_qty[$key];
                $totalCTN   += $quantity_pcs[$key];
                $totalPrice += $total_price[$key];

                $result = new \NumberFormatter(locale_get_default(), NumberFormatter::SPELLOUT );
                $ConvertWord = $result->format($totalPrice);

            @endphp

            @endforeach

        <tr>
            <td colspan="2">Total = </td>
            <td>{{$totalCTN }} CTNS</td>
            <td>{{ $totalPCS }} PCS</td>
            <td></td>
            <td>${{ number_format($totalPrice, 2)}}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td></td>
        </tr>
    </table>

    <p>{{ $ConvertWord }}</p>
    <table>
        <tr>
            <td>TOTAL QTY</td>
            <td><b>:</b> {{ $totalPCS }} PCS</td>
        </tr>
        <tr>
            <td>TOTAL CTN</td>
            <td><b>:</b> {{$totalCTN }} PCS</td>
        </tr>
        <tr>
            <td>TTL NET WEIGHT</td>
            <td>4226.26 KGS</td>
        </tr>
        <tr>
            <td>TTL GROSS WEIGHT</td>
            <td>4663.00 KGS</td>
        </tr>
        <tr>
            <td>TOTAL CBM</td>
            <td><b>:</b> 13.78 CBM</td>
        </tr>

        <tr>
            <td>** PLEASE REMIT TO:</td>
            <td>WINKING FASHION <br> HOUSE#128, ROAD#01, BARIDHARA DOHS, DHAKA-1206, BANGLADESH</BR></td>
        </tr>
        <tr>
            <td>BANK:</td>
            <td>BRAC BANK LIMITED  <br>TRADE OPERATIONS DEPARTMENT. <br>HEAD OFFICE. 220/B. ANIK TOWER, LEVEL-11. TEJGAON</td>
        </tr>
        <tr>
            <td>ACCOUNT NO:</td>
            <td>12253674890</td>
        </tr>
        <tr>
            <td>SWIFT NO:</td>
            <td>BRAKBDDH</td>
        </tr>
    </table>
</body>
</html>
