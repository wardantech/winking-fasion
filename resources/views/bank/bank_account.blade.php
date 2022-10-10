@extends('layout.main') @section('content')
@if($errors->has('name'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('title') }}</div>
@endif
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

<section>
    <div class="container-fluid">
        <button class="btn btn-info" data-toggle="modal" data-target="#createModal"><i class="dripicons-plus"></i> Add Bank Account</button>&nbsp;
        {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#importBrand"><i class="dripicons-copy"></i> {{trans('file.Import Brand')}}</button> --}}
    </div>
    <div class="table-responsive">
        <table id="biller-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Bank Account</th>
                    <th>Bank Name</th>
                    <th>Branch Name</th>
                    <th>Address</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</section>

<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        {!! Form::open(['route' => 'bank_branches.store', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">Add Brand</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
          <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
            <div class="form-group">
                <label>Bank Account No *</label>
                <input type="text" name="account_no" required class="form-control" placeholder = "Type bank account no...">
            </div>
            <div class="form-group">
                <label>Bank Name</label>
                <select name="bank_id" id="bank_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins">
                    <option value="0">Select Bank Name</option>
                    @foreach($lims_bank_account as $bank)
                          <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Branch *</label>
                <select name="branch_id" id="para" class="form-control" required >

                </select>

            </div>
            <div class="form-group">
              <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
</div>

<div id="importBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        {!! Form::open(['route' => 'brand.import', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Import Brand')}}</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
            <p>{{trans('file.The correct column order is')}} (title*, image [file name]) {{trans('file.and you must follow this')}}.</p>
            <p>{{trans('file.To display Image it must be stored in')}} public/images/brand {{trans('file.directory')}}</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('file.Upload CSV File')}} *</label>
                        {{Form::file('file', array('class' => 'form-control','required'))}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{trans('file.Sample File')}}</label>
                        <a href="public/sample_file/sample_brand.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  {{trans('file.Download')}}</a>
                    </div>
                </div>
            </div>
            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
        </div>
        {{ Form::close() }}
      </div>
    </div>
</div>

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
        {{ Form::open(['route' => ['bank_branches.update', 1], 'method' => 'PUT', 'files' => true] ) }}
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title"> Update Bank Branch</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
      </div>
      <div class="modal-body">
        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
        <div class="form-group">
            <label>Bank *</label>
            <select name="bank_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Bank Name ...">

            </select>
        </div>
        <div class="form-group">
            <label> Branch Name *</label>
            {{Form::text('name',null, array('required' => 'required', 'class' => 'form-control'))}}
        </div>
        <input type="hidden" name="bank_branch_id">
        <div class="form-group">
            <label>address *</label>
            <textarea name="address" rows="3" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>


<script type="text/javascript">

    $("ul#bank").siblings('a').attr('aria-expanded','true');
    $("ul#bank").addClass("show");
    $("ul#bank #bank-account-menu").addClass("active");

    var bank_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "#select_all" ).on( "change", function() {
        if ($(this).is(':checked')) {
            $("tbody input[type='checkbox']").prop('checked', true);
        }
        else {
            $("tbody input[type='checkbox']").prop('checked', false);
        }
    });

    $( "#bank_id" ).on( "change", function() {
        var bank_id = this.value;
        var url = "get_branches/";
        url = url.concat(bank_id);

        $.ajax({
        type: "get",
        dataType: "json",
        url: url,
        data: { },
        success: function( response )
        {
           if(response){
            // for (var i = 0; i < response.branch.length; ++i) {
            //         console.log(response.branch[i].id);
            //         $('#example').append('<option value="'+response.branch[i].id+'">'+response.branch[i].id+'</option>');
            //     }
            $.each(response.branch, function(index,branch){
                console.log(branch.name);
                $('#para').append('<option value="'+branch.id+'">'+branch.name+'</option>');
            });

           }
        },
        error: function( error )
        {
            alert( error );
        }
        });
    });


    $("#export").on("click", function(e){
        e.preventDefault();
        var brand = [];
        $(':checkbox:checked').each(function(i){
          brand[i] = $(this).val();
        });
        $.ajax({
           type:'POST',
           url:'/exportbrand',
           data:{

                brandArray: brand
            },
           success:function(data){
            alert('Exported to CSV file successfully! Click Ok to download file');
            window.location.href = data;
           }
        });
    });

    $(document).ready(function() {
        $('.open-EditbankDialog').on('click', function() {
            var url = "bank_branches/"
            var id = $(this).data('id').toString();
            url = url.concat(id).concat("/edit");
            $.get(url, function(data) {
                console.log(data);
                $("#editModal input[name='name']").val(data['name']);
                $("#editModal input[name='bank_branch_id']").val(data['id']);
                $("#editModal select[name='bank_id']").val(data['bank_id']);
                $("#editModal textarea[name='address']").val(data['address']);
                $('.selectpicker').selectpicker('refresh');
            });
        });
    });

    $('#biller-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 1,]
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                   return data;
                },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '{{trans("file.PDF")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
                customize: function(doc) {
                    for (var i = 1; i < doc.content[1].table.body.length; i++) {
                        if (doc.content[1].table.body[i][0].text.indexOf('<img src=') !== -1) {
                            var imagehtml = doc.content[1].table.body[i][0].text;
                            var regex = /<img.*?src=['"](.*?)['"]/;
                            var src = regex.exec(imagehtml)[1];
                            var tempImage = new Image();
                            tempImage.src = src;
                            var canvas = document.createElement("canvas");
                            canvas.width = tempImage.width;
                            canvas.height = tempImage.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(tempImage, 0, 0);
                            var imagedata = canvas.toDataURL("image/png");
                            delete doc.content[1].table.body[i][0].text;
                            doc.content[1].table.body[i][0].image = imagedata;
                            doc.content[1].table.body[i][0].fit = [30, 30];
                        }
                    }
                },
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    format: {
                        body: function ( data, row, column, node ) {
                            if (column === 0 && (data.indexOf('<img src=') !== -1)) {
                                var regex = /<img.*?src=['"](.*?)['"]/;
                                data = regex.exec(data)[1];
                            }
                            return data;
                        }
                    }
                },
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                text: '{{trans("file.delete")}}',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                   // if(user_verified == '1') {
                        bank_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                bank_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(bank_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'brand/deletebyselection',
                                data:{
                                    brandIdArray: bank_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!bank_id.length)
                            alert('No brand is selected!');
                    // }
                    // else
                    //     alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            },
        ],
    } );

</script>
@endsection
