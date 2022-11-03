@extends('layout.main') @section('content')
<section>
    <div class="container-fluid">
        <a href="{{route('forwarding-letter.create')}}" class="btn btn-info"><i class="dripicons-plus"></i> Add forwarding-letter</a>
    </div>
    <div class="table-responsive">
        <table id="employee-table" class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>LC No</th>
                    <th>Amount</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forwardLetters as $forwardLetter)
                <tr>
                    <td>{{$forwardLetter->date}}</td>
                    <td>{{$forwardLetter->account->name}}</td>
                    <td>{{$forwardLetter->export->lc_number}}</td>
                    <td>{{$forwardLetter->export->invoice_value}}</td>
                    <td>{{$forwardLetter->export->invoice_no}}</td>
                    <td>{{$forwardLetter->export->date}}</td>                  
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <a href="{{route('forwarding-letter.show',$forwardLetter->id)}}" class="btn btn-link"><i class="fa fa-eye"></i> View</a>
                                </li>
                                <li><a href="#" 
                                 class="EditFwd btn btn-link" 
                                  data-id="{{$forwardLetter->id}}" 
                                  data-date="{{$forwardLetter->date}}"
                                  data-account_id="{{$forwardLetter->account_id}}"
                                  data-export_id="{{$forwardLetter->export_id}}"
                                   data-toggle="modal"
                                    data-target="#updateFwd">
                                    <i class="dripicons-document-edit"></i> Edit</a></li>
                                
                                <li class="divider"></li>
                                {{ Form::open(['route' => ['forwarding-letter.destroy', $forwardLetter->id], 'method' => 'DELETE'] ) }}
                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</button>
                                </li>
                                {{ Form::close() }}
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="updateFwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        {!! Form::open(['route' => ['forwarding-letter.update', $forwardLetter->id], 'method' => 'post']) !!}
                        @csrf
                        @method('put')
                        <input type="hidden" id="up_id" name="id">  
                        <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Date *</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Account *</label>
                                    <select name="account_id" id="account_id" class="form-control">
                                        <!-- <option value="">Select Account</option> -->
                                        <!-- <option selected="selected" value="">Select ghnh</option> -->
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Lc No *</label>
                                    <select name="export_id" id="export_id" class="form-control">
                                            <option value="">Select Lc No</option>
                                        @foreach ($exports as $export)
                                            <option value="{{ $export->id }}">{{ $export->lc_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice amount *</label>
                                    <input type="number" name="value" id="value" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Number *</label>
                                    <input type="text" name="invoice_no" id="invoice-no" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date" id="invoice-date" class="form-control" readonly>
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                        </div>
                        {{ Form::close() }}
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
  $(document).on('click','.EditFwd',function(){
       let id = $(this).data('id')
       let date = $(this).data('date')
       let account_id = $(this).data('account_id')
       let export_id = $(this).data('export_id')
       $('#up_id').val(id)
       $('#date').val(date)
       $('#account_id').val(account_id)
        // $("#account_id option").each(function(){
        //     if($(this).val()==account_id){ // EDITED THIS LINE
        //         $(this).attr('selected','selected');    
        //     }
        // });
        $("#account_id").select2(account_id, "0");
        $("#account_id").select2().find(":selected").data(account_id);
        console.log(account_id);
       $('#export_id').val(export_id)
   });
    $(document).on('click','.updatechange',function(){
        let id = $('#up_id').val()
        let date = $('#date').val()
        let account_id = $('#account_id').val()
        let export_id = $('#export_id').val()
    $.ajax({
        url:"forwarding-letter/"+id,
        method:'put',
        data:{id:id,date:date,account_id:account_id,export_id:export_id},
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
