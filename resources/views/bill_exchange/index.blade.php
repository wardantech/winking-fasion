@extends('layout.main') @section('content')
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<style>
    .table,th{
        vertical-align: text-top !important;
    }
    .table,td{
        vertical-align: text-top !important;
    }
    .daterangepicker.opened{
        display: block !important;
    }
</style>
<section>
    <div class="container-fluid">
        <a href="{{route('bill-exchange.create')}}" class="btn btn-info"><i class="dripicons-plus"></i> Add Commercial-Invoice</a>
    </div>
    <div class="table-responsive proTable">
        <table id="expense-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported">Sl</th>
                    <th style="min-width: 65px !important;"> Drwan Under</th>
                    <th style="min-width: 65px !important;">Export L/C</th>
                    <th style="min-width: 65px !important;">Export Date</th>
                    <th >Invoice No</th>
                    <th>Invoice Date</th>
                    <th>Amount</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill_exchanges as $bill_exchange)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bill_exchange->drawn_under}}</td>
                    <td>{{$bill_exchange->export}}</td>
                    <td>{{$bill_exchange->export_date}}</td>
                    <td>{{$bill_exchange->invoice_no}}</td>
                    <td>{{$bill_exchange->invoice_date}}</td>
                    <td>{{$bill_exchange->amount}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <a href="{{route('bill-exchange.edit', $bill_exchange->id )}}" class="btn btn-link"><i class="fa fa-edit"></i> Edit</a>
                                   
                                <li>
                                    <a href="{{route('bill-exchange.show', $bill_exchange->id )}}" class="btn btn-link"><i class="fa fa-eye"></i> View</a>
                                </li>
                                                          
                                                                <li class="divider"></li>
                               
                                <li>
                                    <form action="{{ route('bill-exchange.destroy', $bill_exchange->id )}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> Delete</button>
                                </li>
                                </form>
                             </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="tfoot active">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</section>
<!-- Button trigger modal -->


<!-- Modal -->

<!-- ====================== -->
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
// =================update ================
  $(document).on('click','.editBill',function(){
       let id = $(this).data('id')
       let drawn_under = $(this).data('drawn_under')
       let exportLc = $(this).data('export')
       let export_date = $(this).data('export_date')
       let invoice_no = $(this).data('invoice_no')
       let invoice_date = $(this).data('invoice_date')
       let amount = $(this).data('amount')
      var text = $(this).find('option:selected').text();
       $('#up_id').val(id)
       $('#drawn_under').val(drawn_under)
       $('#export').val(exportLc)
       $('#export_date').val(export_date)
       $('#invoice_no').val(invoice_no)
       $('#invoice_date').val(invoice_date)
       $('#amount').val(amount)
   });
    $(document).on('click','.updatechange',function(){
        let id = $('#up_id').val()
        let drawn_under = $('#drawn_under').val()
        let exportLc = $('#export').val()
        let export_date = $('#export_date').val()
        let invoice_no = $('#invoice_no').val()
        let invoice_date = $('#invoice_date').val()
        let amount = $('#amount').val()
    $.ajax({
        
        url:"bill-exchange/"+id,
        method:'put',
        data:{id:id,drawn_under:drawn_under,export:exportLc,export_date:export_date,invoice_no:invoice_no,invoice_date:invoice_date,amount:amount},
        success:function (res) {
           if(res.success = 200){
            $(".modal").modal('hide')
            $(".billEditForm")[0].reset()
            $(".proTable").load(location.href+' .proTable')
           }
        },error:function(err){
            let error = err.responseJSON
            console.log(error)
            $.each(error.errors,function(index, value){
                $('#upmsgcontainer').append("<p style='color:red'>"+value+"</p>");
            })
        }
    })
  });
});
</script>
@endsection
