@extends('layout.main')
@section('content')
<style>
        .header{
            text-align: center;
        }
        p{
            letter-spacing: 2px;
            word-spacing: 5px;
            text-transform: uppercase;
        }
        @media print(){
            .printbutton{
                display:none;
            }
        }
    </style>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="printTable" class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 style="margin-right:10px;">Bill Exchange</h4> 
                        <button  class="btn btn-info printbutton">Print</button>
                    </div>
                    <div class="card-body">
                    <header class="header">
        <h1>Bill Exchange</h1>
        <h1 style="font-size: 52px;">1</h1>
    </header>
    <table width="100%">
        <tr>
            <td style="text-transform:uppercase;padding-bottom:20px;" colspan="2"><strong>DRAWN UNDER:</strong> {{$bill_exchange->bank->name}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td><strong>EXPORT L/C NO:</strong> {{$bill_exchange->export_id}}</td>
            <td style="text-align: right;"><strong>DATE: </strong> {{$bill_exchange->export_date}}</td>
        </tr>
        <tr>
            <td><strong>INVOICE NO: </strong> {{$bill_exchange->invoice_no}}</td>
            <td style="text-align: right;"><strong>DATE: </strong> {{$bill_exchange->invoice_date}}</td>
        </tr>
    </table>
    <P>Lorem Ipsum is <STRONG>{{$bill_exchange->amount}}</STRONG> text of the printing and <strong style="font-size:36px"><i>FIRST</i></strong> industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</P>

    <p style="margin-bottom:0px;">TO</p>
    <p style="margin:0px;"><strong>{{$bill_exchange->bank->name}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('.printbutton').on('click',function(){
printData();
})
</script>

@endsection
