@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8 ">
                                <button type="button" class="btn btn-primary w-100" operation="1">
                                    On
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-danger w-100" operation="0">
                                    Off
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-outline-danger w-100" operation="2">
                                     Up
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-outline-info w-100" operation="3">
                                    Down
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
<script>

    $(document).ready(function () {
        var socket = new WebSocket("ws://159.203.191.85:1215");
        socket.onopen = function (event) {
            console.log("Connection open ...");
        }

        socket.onclose = function (event) {
            console.log("Connection closed ...");
        }


        $(".btn").click(function () {
            console.log("hehehe")
            let msg={
                "event": "web_operation",
                "data": {
                    "operation": $(this).attr("operation")
                }
            };
            socket.send(JSON.stringify(msg))

        })
    })


</script>

@endsection
