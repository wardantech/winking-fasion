@extends('layout.main') @section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Generate Salary Sheet</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['salary-sheet.generate'], 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.H. Rent')}} *</label>
                                    <input type="number" name="h_rent" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Medical')}} *</label>
                                    <input type="number" name="medical" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.T.Port')}} *</label>
                                    <input type="number" name="t_port" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Allowed Leave')}} *</label>
                                    <input type="number" name="allowed_leave" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Leave Taken')}} *</label>
                                    <input type="number" name="leave_taken" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Worked Days')}} *</label>
                                    <input type="number" name="worked_days" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Gross Pay')}} *</label>
                                    <input type="number" name="gross_pay" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Deduction')}} *</label>
                                    <input type="number" name="deduction" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Net Amount')}} *</label>
                                    <input type="number" name="net_amount" step="any" required class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{trans('file.Status')}} *</label>
                                    <input type="number" name="status" step="any" required class="form-control">
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
</section>
@endsection
