@extends('layout.main')
@section('content')
<style>
        .no-margin{
            margin:0px;
        }
        .leter-head p{
            margin:0px;
        }
    </style>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Forwarding Letter</h4>
                    </div>
                    <div class="card-body">
                    <header class="header">
        <p><strong>No:DBL/CL/07839</strong></p>

        <div class="leter-head">
            <p>To</p>
            <p>The manager</p>
            <p>Bank: {{$forwardLetter->account->name}}</p>
            <p>Head office: uttara</p>
            <p>Uttara rajlokki, dhaka Bangladesh</p>
        </div>
        <div class="letter-subject">
            <p><strong>Subject : Request to forward the LC documents to issuing bank against export LC no. {{$forwardLetter->export->lc_number}} date - {{$forwardLetter->export->date}} value {{$forwardLetter->export->invoice_value}} as per Commercial Invoice No {{$forwardLetter->export->invoice_no}}  Dated: {{$forwardLetter->export->due_date}} (Janata Bank Ref No: Cal/34/300))</strong></p>
        </div>
        <div class="letter-body">
            <p>Dear Sir</p>
            <p>We would like to request you to forward the LC document to issuing bank aganist export LC no.  {{$forwardLetter->export->lc_number}} dated {{$forwardLetter->export->date}} value {{$forwardLetter->export->invoice_value}} as per Commercial Invoice no {{$forwardLetter->export->invoice_no}} Dated:  {{$forwardLetter->export->due_date}} </p>
            <p>Applicant: WINKING FASHION</p>
            <p>Please replace Invoice, whice i have sent you</p>
            <p style="padding-top:10px ;">Your nice corporation will be highly appreciated in this regard</p>
        </div>
        <div class="letter-footer">
            <p style="padding: 30px 0px ;">Thank you</p>

            <div class="endorse">
                <p><strong>Enclose:</strong></p>
                <ol style="margin-bottom:50px;">
                    <li>Commercial Invoice in 4 folds</li>
                    <li>Bill of Exchange</li>
                </ol>

                <div class="sil-area">
                    <p class="no-margin">for on behlf of ....</p>
                    <p class="no-margin"><strong>WINKING FASHION</strong></p>
                    <p style="margin-top:100px;">Authorized Signature</p>
                </div>
            </div>
        </div>
    </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
