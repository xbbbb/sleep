@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send Email') }}</div>

                <div class="card-body">
                    <form method="post" action="{{url("/send_info")}}" id="contact-form">
                        @csrf
                        <div class="row clearfix">
                            <!--Form Group-->
                            <div class="form-group col-md-6 col-xs-12">
                                <input type="text" class="form-control" name="first_name" value="" placeholder="First Name" required>
                            </div>
                            <!--Form Group-->
                            <div class="form-group col-md-6 col-xs-12">
                                <input type="hidden" name="merchant" value="{{$merchant}}"  >

                                <input type="text" class="form-control" name="last_name" value="" placeholder="Last Name" required>
                            </div>
                            <!--Form Group-->
                            <div class="form-group col-md-12 col-xs-12">
                                <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
                            </div>

                            <div class="form-group col-md-12 col-xs-12">
                                <input type="text" class="form-control" name="message" value="" placeholder="Message" required>
                            </div>


                            <div class="form-group col-md-12 col-xs-12">
                                <input type="text" class="form-control" name="company" value="" placeholder="Company Name" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-12 col-xs-12">
                                <div class="text-right"><button id="email" type="submit" class="btn btn-info">Send</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
