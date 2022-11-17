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
        table td{
            padding:10px;
        }
    </style>
</head>
<body>
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
        <td>0000093-23467-2022</td>
        <td>Date</td>
        <td>23-06-2022</td>
       </tr>
       <tr>
        <td>SHIPMENT TERMS:</td>
        <td>FOB ANY PORT IN BANGLADESH </td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td>PAYMENT TERMS:</td>
        <td>60 DAYS AFTER BL DATE</td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td rowspan="6">
            <p><strong>BENEFICIARY NAME & ADDRESS :</strong></p>
            <p><strong>VINKING FASHION</strong></p>
            <p>HOUSE # 128, ROAD # 01, BARIDHARA DOHS, DHAKA-1209, BANGLADESH</p>
        </td>
        <td>Port of loading</td>
        <td>Chattogram Bangladesh</td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td>Port of destination</td>
        <td>Montreal CANADA</td>
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
            <p><strong>JEANIOLOGIE INC.</strong></p>
            <p>1951, BLVD. DE LA COTE-VERTU O. 5T-LAURENT, QC H4S 1E1, CANADA</p>
        </td>
        <td colspan="4">
            <p><strong>BENEFICIARY BANK NAME & ADDRESS:</strong></p>
            <p><strong>BRAC BANK LIMITED</strong></p>
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
                <p><strong>JEANIOLOGIE INC.</strong></p>
                <p>Consignee: Jeaniologie Inc.</p>
            </td>
            <td>Readymate Garments</td>
            <td colspan="4">POB CHITAGONJ BANGLADESH</td>
        </tr>
        <tr>
            <td>
                <p>MENS PULL -ON SLM CUT CARGO CHINO</p>
                <P>STYLE:NO SL-DEAN-FST</P>
                <P>VPO NO. 1005225</P>
            </td>
            <td>160 CTNS</td>
            <td>4,800 CTNS</td>
            <td>$8.05</td>
            <td>$38,000650.00</td>
        </tr>
        <tr>
            <td>
                <p>MENS PULL -ON SLM CUT CARGO CHINO</p>
                <P>STYLE:NO SL-DEAN-FST</P>
                <P>VPO NO. 1005225</P>
            </td>
            <td>160 CTNS</td>
            <td>4,800 CTNS</td>
            <td>$8.05</td>
            <td>$38,000650.00</td>
        </tr>
        <tr>
            <td colspan="2">Total</td>
            <td>236 CTNS</td>
            <td>8400 PCS</td>
            <td></td>
            <td>$67,620</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td></td>
        </tr>
    </table>
    <p>US DOLLAR SIXTY SEVEN THOUSAND TAKA  AND SENT ZERO ONLY</p>
    <table>
        <tr>
            <td>TOTAL QTY</td>
            <td>:8,400 PCS</td>
        </tr>
        <tr>
            <td>TOTAL CTN</td>
            <td>263 PCS</td>
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
            <td>: 13.78 CBM</td>
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
