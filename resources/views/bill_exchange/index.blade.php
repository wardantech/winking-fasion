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
                                <li><button type="button"  class="editBill btn btn-link"  data-id="{{$bill_exchange->id}}" data-drawn_under="{{$bill_exchange->drawn_under}}" data-export="{{$bill_exchange->export}}" data-export_date="{{$bill_exchange->export_date}}" data-invoice_no="{{$bill_exchange->invoice_no}}" data-invoice_date="{{$bill_exchange->invoice_date}}" data-amount="{{$bill_exchange->amount}}" data-toggle="modal" data-target="#updateBillExchange"><i class="dripicons-document-edit"></i> Edit</button></li>
                                <li>
                                    <a href="{{route('bill-exchange.show', $bill_exchange->id )}}" class="btn btn-link"><i class="fa fa-eye"></i> View</a>
                                </li>
                                                          
                                                                <li class="divider"></li>
                                <form method="POST" action="#" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="SWo30cvOeDRtEMvOgNXUIaMbxVAubeQRDg8Z3GRI">
                                <li>
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
<div class="modal fade" id="updateBillExchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        <!-- {!! Form::open(['route' => ['bill-exchange.update', $bill_exchange->id], 'method' => 'post', 'class'=>'billEditForm']) !!} -->
                       <form class="billEditForm" method="post"  action="{{url('bill-exchange', $bill_exchange->id)}}">
                        @csrf
                        @method('put')
                        <input type="hidden" id="up_id" name="id"> 
                        <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Drawn Under *</label>
                                    <select name="drawn_under" id="drawn_under" class="form-control">
                                    @foreach($bankNames as $bankName)
                                        <option value="{{$bankName->id}}">{{$bankName->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Export L/C No *</label>
                                    <select name="export" id="export" class="form-control">
                                            <option value="">Select Lc No</option>
                                            @foreach($exports as $export)
                                                <option value="{{$export->id}}">{{$export->lc_number}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Export Date *</label>
                                    <input type="date" name="export_date" id="export_date"  class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice No *</label>
                                    <input type="text" name="invoice_no" id="invoice_no" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date" id="invoice_date"  class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount" id="amount"  class="form-control">
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary updatechange">{{trans('file.submit')}}</button>
                        </div>
                       </form>
                    </div>
      </div>
     
    </div>
  </div>
</div>
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
