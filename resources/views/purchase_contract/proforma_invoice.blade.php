<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('public/logo', $general_setting->site_logo)}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Proforma Invoice</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }
    .company-info h2{
            margin-bottom: 20px;
            font-weight: bold;
            font-family: initial;
            text-transform: uppercase;
        }
    .company-info p{
            font-weight: bold;
        }
    .vendor h2{
            font-size: 16px;
            font-weight: bold;
            text-transform: capitalize;
        }
    .company-address{
        margin: 0px;
        padding: 0px;
        font-size: 14px;
        min-height:20px;
        text-transform: uppercase;
        background-color: #d7d8da;
        font-weight: bold;
    }
    .company-address p{
       padding-top:0px;
    }
    .revised{
        margin: 0px;
        padding: 0px;
        font-size: 14px;
        min-height:10px;
        width: 25%;
        float: right;
        text-transform: uppercase;
        background-color: #d7d8da;
        font-weight: bold;
    }
    .right{
       float:right;
       font-weight: bold !important;
       color:black !important;
       margin: 0px;
       padding: 0px;
    }
    .left{
        float:left;
        font-weight: bold !important;
        color:black !important;
    }
        .logo{
            float:right;
        }
        .logo img{
            width: 40%;
            float: right;
        }
        .vendor p{
            margin: 0px;
            text-transform: uppercase;
            font-size:12px;
        }
        .vendor h4{
            margin: 0px;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
        }

        .company-info p{
            margin: 0px;
            padding: 0px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .amount_table p{
        margin: 0px;
        }
        .amount_table th,td,p{
            text-transform: uppercase;
            font-family: initial;
            font-size:12px;
        }
        .customer{
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .title{
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
            margin:0px;
        }
        .description{
            text-align: center;
        }
        .signature{
            min-height: 80px;
            margin-top: 80px;
        }
        .signature h4{
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            margin-top: 100px;
            background-color: #cdcad2;
            padding: 5px;
            margin-bottom: 0px;
        }
        .signature h2,p{
            text-transform: uppercase;
            font-weight: bold;
            font-size: 12px;
            margin: 0px;
            padding: 0px;
        }
        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }
        .footer-left{
        background-color: #969191;
        color: black;
    }
    .footer-right{
        background-color: #0c0c0c;
        color: white;
        text-align: right;
    }
    .footer-left h2{
        font-weight: bold;
        font-size: 12px;
        padding: 0px 20px;
        padding-top: 5px;
        margin-bottom: 0px;
    }
    .footer-left h4{
        font-size: 12px;
        padding: 0px 20px;
        padding-bottom: 5px;
    }
    .footer-right h2{
        font-size: 12px;
        padding: 0px 16px;
        padding-top: 5px;
        margin-bottom: 0px;
        color:white;
    }
    .footer-right h4{
        font-size: 12px;
        padding: 0px 16px;
        padding-bottom: 5px;
        color:white;
    }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }
        small{font-size:11px;}

        .page-header {
        height: 150px;
    }
    .page-header-space {
        height: 150px;
    }

    .page-footer, .page-footer-space {
        height: 100px;
    }
    .page-footer {
        position: fixed;
        bottom: 0;
        width: 82%;
        margin-top:30px; /* for demo */
    }
    .page-header {
        position: fixed;
        width: 80%;
    }

    .page {
        page-break-after: always;
    }

    @media print {
        *{
            font-size:14px;
            line-height: 20px;
        }
        .hidden-print {
            display: none !important;
        }
        .page-header {
            position: fixed;
            width: 90%;
            height: 100px;
        }
        .page-footer {
            position: fixed;
            bottom: 0;
            width: 90%;
            height: 100px;
    }
        thead {display: table-header-group;}
        tfoot {display: table-footer-group;}
        button {display: none;}
        body {margin: 0;}
        @page {
            /* margin: 50px 0px; */
            /* margin-top: 0px; */
        }
        body { margin-top: 1.0cm ; margin-bottom:1.0cm; -webkit-print-color-adjust: exact !important; }
    }
    </style>
  </head>
<body>

<div class="container">
<div>
    @if(preg_match('~[0-9]~', url()->previous()))
        @php $url = '../'; @endphp
    @else
        @php $url = url()->previous(); @endphp
    @endif
    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="{{$url}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{trans('file.Back')}}</a> </td>
                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> {{trans('file.Print')}}</button></td>
            </tr>
        </table>
        <br>
    </div>

    <div id="receipt-data">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border:none;">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border:none;">
                                        <div class="card-body" style="padding:0px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="company-info">
                                                        <h2>PURCHASE CONTRACT</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="logo">
                                                          <img src="{{url('public/logo', $general_setting->site_logo)}}" alt="Side Image">
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12" style="height:22px;">
                                                    <div class="company-address">
                                                        <P class="left">CONTRACT NO : {{ $lims_contract_data->contract_no }}</P>
                                                        <P class="right">DATE : {{ date('d F, Y', strtotime($lims_contract_data->created_at)) }}</P>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="revised">
                                                        <P class="right">REVISED DATE : {{ date('d F, Y', strtotime($lims_contract_data->revised_date)) }}</P>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table width="100%">
                            <thead>
                                <tr>
                                  <td>
                                    <!--place holder for the fixed-position header-->
                                    <div class="page-header-space"></div>
                                  </td>
                                </tr>
                              </thead>

                            <tbody>
                              <tr>
                                <td>
                                   <div class="page">
                                    <div class="row" style="margin-top:30px;">
                                        <div class="col-md-6">
                                            <div class="vendor">
                                                <h2>TO</h2>
                                                <div class="vendor">
                                                    <h4>{{ $lims_contract_data->invoiceTo->name }}</h4>
                                                    <p>{{ $lims_contract_data->invoiceTo->address }}, {{ $lims_contract_data->invoiceTo->city }}, {{ $lims_contract_data->invoiceTo->country }}  </p>
                                                    <p>Tel: {{ $lims_contract_data->invoiceTo->phone }}, {{ $lims_contract_data->invoiceTo->mobile }} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        </div>
                                     </div>


                                     <div class="row" style="margin-top:20px;margin-bottom:20px;">
                                        <div class="col-md-12">
                                            <div class="vendor">
                                                <h2 style="font-size: 12px;text-transform: uppercase;font-weight: bold;">ATTN : {{$lims_contract_data->customer}}</h2>
                                                <div class="description">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>VPO</th>
                                                                <th>STYLE</th>
                                                                <th>ITEM DESCRIPTION</th>
                                                                <th>WASH/COLOR</th>
                                                                <th>ORDER QTY</th>
                                                                <th>UNIT PRICE</th>
                                                                <th>TOTAL VALUE</th>
                                                                <th>DELIVERY DATE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($details as $key=>$detail)
                                                            <tr>
                                                                <td>{{ $detail->vpo }}</td>
                                                                <td>{{ $detail->style }}</td>
                                                                <td>{{ $detail->item_description }}</td>
                                                                <td>{{ $detail->color }}</td>
                                                                <td>{{ $detail->quantity }}</td>
                                                                <td>$ {{ number_format((float)$detail->unit_price_client, 2, '.', '') }}</td>
                                                                <td>$ {{ number_format((float)$detail->total_value_client, 2, '.', '') }}</td>
                                                                <td>{{date('d-m-Y',strtotime($lims_contract_data->delivery_date))}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>{{ $lims_contract_data->total_qty }}</th>
                                                                <th></th>
                                                                <th>$ {{ number_format((float)$lims_contract_data->total_amount_client, 2, '.', '') }}</th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top:30px;">

                                            <div class="vendor">
                                                <h2>TERMS AND CONDITIONS</h2>
                                            </div>

                                            <table width="100%" class="amount_table">
                                                <tr>
                                                    <td width="20%"><b>Order Value</b></td>
                                                    <td width="3%"><b>:</b></td>
                                                    <th width="77%"><b>$ {{ number_format((float)$lims_contract_data->total_amount_client, 2, '.', '') }}</b></th>
                                                </tr>
                                                <tr>
                                                    <td width="20%"><b>Payment Terms</b></td>
                                                    <td width="3%"><b>:</b></td>
                                                    <th width="77%">{{ $lims_contract_data->payment_terms }}</th>
                                                </tr>
                                                <tr>
                                                    <td width="20%">LC Terms</td>
                                                    <td width="3%">:</td>
                                                    <th width="77%">{{ $lims_contract_data->lc_terms }}</th>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Last date of shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ date('d F, Y', strtotime($lims_contract_data->shipment_date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">last date of expiry</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ date('d F, Y', strtotime($lims_contract_data->expire_date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">quantity</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">as above ({{ $lims_contract_data->acceptable_amount }}% more or less is acceptable in correct prepack ratio per color)</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">amount</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">as above ({{ $lims_contract_data->acceptable_amount }}% more or less is acceptable)</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Port of Loading</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->port_of_loading }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Port of Destination</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->port_of_destination }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Mode of Shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->mode_of_shipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Transshipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->transshipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Partial Shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->partial_shipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Terms of Sales</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->sale_terms }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Beneficiary Name & Address</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">
                                                        <h2 class="title">WINKING FASHION</h2>
                                                        <p>HOUSE # 128, ROAD # 01, BARIDHARA DOHS </p>
                                                        <p>DHAKA-1206, BBANGLADESH </p>
                                                        <p>TEL: +88 02 841 9355 </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Beneficiary Bank & Address</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%"><b>{!! $lims_contract_data->applicant_bank !!}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">LC</td>
                                                    <td width="3%">:</td>
                                                    <td width="20%">lc should be irrevocable and transferrable</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">LC</td>
                                                    <td width="3%">:</td>
                                                    <td width="20%">lc should be issued with <b>UPAS</b> clause</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">inspection certificate</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">inspection certificate will be issued & purportedly signed by <span><b style="text-transform: uppercase;">{{$lims_contract_data->inspection_author}}</b></span> of winking fashion or consignee.</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                           <div class="signature">
                                               <P style="text-align:center;">ON BEHALF OF</P>
                                               <h2 style="text-align:center;">WINKING FASHION</h2>
                                               <h4>AUTHORIZED SIGNATURE</h4>
                                            </div>
                                        </div>
                                    </div>
                                   </div>
                                </td>
                              </tr>
                            </tbody>

                            <tfoot>
                              <tr>
                                <td>
                                  <div class="page-footer-space"></div>
                                </td>
                              </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-footer">
            <div class="row" style="margin-top:10px;">
                <div class="col-md-6">
                    <div class="footer-left">
                        <h2>WINKING FASHION</h2>
                        <h4>House 128, Road 01, Baridhara DOHS, Dhaka-1206, Bangladesh</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-right">
                        <h2>Tel : 88-02-84109355</h2>
                        <h4>Email : info@winkingfashion.com</h4>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
<script type="text/javascript">
    function auto_print() {
        window.print()
    }
    setTimeout(auto_print, 1000);
</script>

</body>
</html>






{{--

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('public/logo', $general_setting->site_logo)}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Purchase Contract</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style type="text/css">
    * {
        font-size: 14px;
        line-height: 24px;
        font-family: 'Ubuntu', sans-serif;
        text-transform: capitalize;
        color:black;
    }
    .company-info h2{
        margin-bottom: 20px;
        font-weight: bold;
        /* font-family: initial; */
        text-transform: uppercase;
    }
    .company-address{
        margin: 0px;
        padding: 0px;
        font-size: 14px;
        min-height:20px;
        text-transform: uppercase;
        background-color: #d7d8da;
        font-weight: bold;
    }
    .company-address p{
       padding-top:0px;
    }
    .revised{
        margin: 0px;
        padding: 0px;
        font-size: 14px;
        min-height:10px;
        width: 25%;
        float: right;
        text-transform: uppercase;
        background-color: #d7d8da;
        font-weight: bold;
    }
    .right{
       float:right;
       font-weight: bold !important;
       color:black !important;
       margin: 0px;
       padding: 0px;
    }
    .left{
        float:left;
        font-weight: bold !important;
        color:black !important;
    }
    .vendor h2, .ship h2{
        margin-top: 20px;
        font-weight: bold;
        /* font-family: initial; */
        font-size:14px;
        text-transform: uppercase;
    }
    .company-info p, .vendor p, .ship p{
        margin: 0px;
        padding: 0px;
        font-size: 14px;
        text-transform: uppercase;
        color:black !important;
    }
    .logo{
        float:right;
    }
    .logo img{
        width: 40%;
       float: right;
    }
    .amount_table p{
       margin: 0px;
    }
    .amount_table th,td{
        text-transform: uppercase;
        /* font-family: initial; */
        font-size:14px;
        padding: 4px 0px;
    }
    .amount_table th,td,p{
        text-transform: uppercase;
        /* font-family: initial; */
        font-size:14px;
        padding: 4px 0px;
    }
    .title{
        text-align: center;
        margin-top: 30px;
        font-size: 15px;
        padding: 10px 0px;
        text-transform: uppercase;
    }
    .description{
        text-align: center;
    }
    .signature{
        min-height: 80px;
        margin-top: 120px;
    }
    .signature h4{
        font-size: 14px;
        font-weight: bold;
        margin-top: 100px;
        padding: 5px;
        margin-bottom: 0px;
        text-decoration: overline;
    }
    .footer-left{
        background-color: #969191;
        color: black;
    }
    .footer-right{
        background-color: #0c0c0c;
        color: white;
        text-align: right;
    }
    .footer-left h2{
        font-weight: bold;
        font-size: 12px;
        padding: 0px 20px;
        padding-top: 5px;
        margin-bottom: 0px;
    }
    .footer-left h4{
        font-size: 12px;
        padding: 0px 20px;
        padding-bottom: 5px;
    }
    .footer-right h2{
        font-size: 12px;
        padding: 0px 16px;
        padding-top: 5px;
        margin-bottom: 0px;
        color:white;
    }
    .footer-right h4{
        font-size: 12px;
        padding: 0px 16px;
        padding-bottom: 5px;
        color:white;
    }
    .page-header {
        height: 150px;
    }
    .page-header-space {
        height: 150px;
    }

    .page-footer, .page-footer-space {
        height: 100px;
    }
    .page-footer {
        position: fixed;
        bottom: 0;
        width: 82%;
        margin-top:30px; /* for demo */
    }
    .page-header {
        position: fixed;
        width: 80%;
    }

    .page {
        page-break-after: always;
    }

    @media print {
        *{
            font-size:14px;
            line-height: 20px;
        }
        .hidden-print {
            display: none !important;
        }
        .page-header {
            position: fixed;
            width: 90%;
            height: 100px;
        }
        .page-footer {
            position: fixed;
            bottom: 0;
            width: 90%;
            height: 100px;
    }
        thead {display: table-header-group;}
        tfoot {display: table-footer-group;}
        button {display: none;}
        body {margin: 0;}
        @page {
            /* margin: 50px 0px; */
            /* margin-top: 0px; */

        }
        body { margin-top: 1.0cm ; margin-bottom:2.6cm; }
    }
    </style>
  </head>
<body>

<div class="container">
<div>
    @if(preg_match('~[0-9]~', url()->previous()))
        @php $url = '../'; @endphp
    @else
        @php $url = url()->previous(); @endphp
    @endif
    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="{{$url}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{trans('file.Back')}}</a> </td>
                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> {{trans('file.Print')}}</button></td>
            </tr>
        </table>
        <br>
    </div>

    <div id="receipt-data">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border:none;">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border:none;">
                                        <div class="card-body" style="padding:0px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="company-info">
                                                        <h2>PURCHASE CONTRACT</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="logo">
                                                          <img src="{{url('public/logo', $general_setting->site_logo)}}" alt="Side Image">
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12" style="height:22px;">
                                                    <div class="company-address">
                                                        <P class="left">CONTRACT NO : {{ $lims_contract_data->contract_no }}</P>
                                                        <P class="right">DATE : {{ date('d F, Y', strtotime($lims_contract_data->created_at)) }}</P>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="revised">
                                                        <P class="right">REVISED DATE : {{ date('d F, Y', strtotime($lims_contract_data->revised_date)) }}</P>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table width="100%">
                            <thead>
                                <tr>
                                  <td>
                                    <!--place holder for the fixed-position header-->
                                    <div class="page-header-space"></div>
                                  </td>
                                </tr>
                              </thead>

                            <tbody>
                              <tr>
                                <td>
                                   <div class="page">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="vendor">
                                                <h2 style="text-decoration: underline;">APPLICAT (1ST BENEFICIARY) NAME & ADDRESS :</h2>
                                                <div class="">
                                                    <h2>WINKING FASHION</h2>
                                                    <p>HOUSE # 128, ROAD # 01, BARIDHARA DOHS </p>
                                                    <p>DHAKA-1206, BBANGLADESH  </p>
                                                    <p>TEL: +88 02 841 9355 </p>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="ship">
                                                <h2 style="text-decoration: underline;">VENDOR (2ND BENEFICIARY) NAME & ADDRESS :</h2>
                                                <div class="vendor">
                                                    <h2>{{ $lims_contract_data->vendor->name }}</h2>
                                                    <p>{{ $lims_contract_data->vendor->address }}, {{ $lims_contract_data->vendor->city }}, {{ $lims_contract_data->vendor->country }}  </p>
                                                    <p>Tel: {{ $lims_contract_data->vendor->phone }}, {{ $lims_contract_data->vendor->mobile }} </p>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="row" style="margin-top:30px;">
                                        <div class="col-md-6">
                                            <div class="vendor">
                                                <h2 style="text-decoration: underline;">APPLICAT BANK NAME & ADDRESS :</h2>
                                                <div class="">
                                                    <P>{!! $lims_contract_data->applicant_bank !!}</P>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="ship">
                                                <h2 style="text-decoration: underline;">VENDOR BANK NAME & ADDRESS :</h2>
                                                <div class="vendor">
                                                    <P>{!! $lims_contract_data->applicant_bank !!}</P>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="row" style="margin-top:30px;">
                                        <div class="col-md-6">
                                            <div class="vendor">
                                                <h2 style="text-decoration: underline;">CONSIGNEE & NOTIFY PARTY</h2>
                                                <div class="vendor">
                                                    <h2>{{ $lims_contract_data->invoiceTo->name }}</h2>
                                                    <p>{{ $lims_contract_data->invoiceTo->address }}, {{ $lims_contract_data->invoiceTo->city }}, {{ $lims_contract_data->invoiceTo->country }}  </p>
                                                    <p>Tel: {{ $lims_contract_data->invoiceTo->phone }}, {{ $lims_contract_data->invoiceTo->mobile }} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        </div>
                                     </div>

                                     <div class="row" style="margin-top:30px;">
                                        <div class="col-md-6">
                                            <table width="100%" class="amount_table">
                                                    <tr>
                                                        <th>AMOUNT</th>
                                                        <td>:</td>
                                                        <th>USD {{ $lims_contract_data->total_amount }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td>DRAFT AT</td>
                                                        <td>:</td>
                                                        <td>{{ $lims_contract_data->draft_at }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TRAMS OF DELIVERY</td>
                                                        <td>:</td>
                                                        <td>{{ $lims_contract_data->delivery_terms }}</td>
                                                    </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-12">
                                            <h2 class="title">" {{$lims_contract_data->notice}} "</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="vendor">
                                                <h2 style="text-decoration: underline;">DESCRIPTION OF THE MERCHANDISES :</h2>
                                                <div class="description">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>VPO</th>
                                                                <th>STYLE</th>
                                                                <th>ITEM DESCRIPTION</th>
                                                                <th>WASH/COLOR</th>
                                                                <th>ORDER QTY</th>
                                                                <th>UNIT PRICE</th>
                                                                <th>TOTAL VALUE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($details as $key=>$detail)
                                                            <tr>
                                                                <td>{{ $detail->vpo }}</td>
                                                                <td>{{ $detail->style }}</td>
                                                                <td>{{ $detail->item_description }}</td>
                                                                <td>{{ $detail->color }}</td>
                                                                <td>{{ $detail->quantity }}</td>
                                                                <td>$ {{ number_format((float)$detail->unit_price, 2, '.', '') }}</td>
                                                                <td>$ {{ number_format((float)$detail->total_value, 2, '.', '') }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>{{ $lims_contract_data->total_qty }}</th>
                                                                <th></th>
                                                                <th>$ {{ number_format((float)$lims_contract_data->total_amount, 2, '.', '') }}</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="vendor">
                                                <h2 style="text-decoration: underline;">TERMS AND CONDITIONS :</h2>
                                            </div>

                                            <table width="100%" class="amount_table">
                                                <tr>
                                                    <td width="20%">Payment Terms</td>
                                                    <td width="3%">:</td>
                                                    <th width="77%">{{ $lims_contract_data->payment_terms }}</th>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Port of Loading</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->port_of_loading }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Port of Destination</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->port_of_destination }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Mode of Shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->mode_of_shipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Transshipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->transshipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Partial Shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->partial_shipment }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Terms of Sales</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ $lims_contract_data->sale_terms }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Last date of shipment</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ date('d F, Y', strtotime($lims_contract_data->shipment_date_fty)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">last date of expiry</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">{{ date('d F, Y', strtotime($lims_contract_data->expire_date_fty)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">quantity</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">as above ({{ $lims_contract_data->acceptable_amount }}% more or less is acceptable in correct prepack ratio per color)</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">amount</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">as above ({{ $lims_contract_data->acceptable_amount }}% more or less is acceptable)</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">documents required</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%" style="text-transform: uppercase;">{!! $lims_contract_data->document !!}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">inspection certificate</td>
                                                    <td width="3%">:</td>
                                                    <td width="77%">inspection certificate will be issued & purportedly signed by <span><b style="text-transform: uppercase;">{{$lims_contract_data->inspection_author}}</b></span> of winking fashion or consignee.</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:30px;">
                                        <div class="col-md-6">
                                            <div class="signature">
                                                <h4>AUTHORIZED SIGNATURE</h4>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="signature">
                                               <h4 style="text-align: right;">BENEFICIARY SIGNATURE</h4>
                                            </div>
                                        </div>
                                    </div>
                                   </div>
                                </td>
                              </tr>
                            </tbody>

                            <tfoot>
                              <tr>
                                <td>
                                  <div class="page-footer-space"></div>
                                </td>
                              </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-footer">
            <div class="row" style="margin-top:10px;">
                <div class="col-md-6">
                    <div class="footer-left">
                        <h2>WINKING FASHION</h2>
                        <h4>House 128, Road 01, Baridhara DOHS, Dhaka-1206, Bangladesh</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-right">
                        <h2>Tel : 88-02-84109355</h2>
                        <h4>Email : info@winkingfashion.com</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function auto_print() {
        window.print()
    }
    setTimeout(auto_print, 1000);
</script>

</body>
</html>




--}}

