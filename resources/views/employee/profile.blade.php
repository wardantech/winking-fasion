@extends('layout.main') @section('content')
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section>
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                      <img class="card-img-top" src="{{url('public/images/employee',$employee->image)}}" alt="Card image cap" width="180px !importent;">
                      <div class="card-body">
                        <h5 class="card-title">{{$employee->name}}</h5></h5>
                      </div>
                </div>
           </div>

           <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-body" style="padding-top:0px;">
                       <table id="example1" class="table table-bordered table-striped">
                           <tbody>
                                <tr>
                                    <td width="25%">Employee Name</td>
                                    <td width="75%">{{$employee->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td>{{ $employee->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{isset($employee->department->name) ? $employee->department->name : 'No department found'}}</td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                    <td>{{ $employee->address}}
                                        @if($employee->city){{ ', '.$employee->city}}@endif
                                        @if($employee->state){{ ', '.$employee->state}}@endif
                                        @if($employee->postal_code){{ ', '.$employee->postal_code}}@endif
                                        @if($employee->country){{ ', '.$employee->country}}@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permanent Address</td>
                                    <td>{{ $employee->address2}}</td>
                                </tr>
                                <tr>
                                    <td>NID Number</td>
                                    <td>{{ $employee->nid_number}}</td>
                                </tr>
                                <tr>
                                    <td>Joining Date</td>
                                    <td>{{ $employee->joining_date}}</td>
                                </tr>
                                <tr>
                                    <td>Joining Salary</td>
                                    <td>{{ $employee->joining_salary}} BDT</td>
                                </tr>
                                <tr>
                                    <td>Present Salary</td>
                                    <td>{{ $employee->present_salary}} BDT</td>
                                </tr>

                            </tbody>
                       </table>
                  </div>

                </div>
           </div>
        </div>
    </div>
</section>



<script type="text/javascript">

    $("ul#hrm").siblings('a').attr('aria-expanded','true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

</script>
@endsection
