@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $name }} &nbsp;&nbsp;&nbsp;&nbsp; {{$email}}</div>

                <div class="card-body" id="board">

                </div>


                <div class="card-body mt-3 ">
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                                <input type="hidden" value="{{$to}}" id="to">
                            <input type="hidden" value="{{$name."/".$email}}" id="customer">

                            <textarea  class="w-100 form-control my-editor" name="talk" id="talk">

                                </textarea>


                        </div>

                    </div>


                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 ">
                            <button type="button" class="btn btn-primary" id="send">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mt-1">
                        <div class="col-md-8 ">
                            <button type="button" class="btn btn-primary" id="save">
                                {{ __('Save') }}
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
        var history=[];
        var socket = new WebSocket("ws://159.203.191.85:1215");
        socket.onopen = function (event) {
            console.log("Connection open ...");
            let msg={
                "event": "login",
                "data": {
                    "uid": {{ Auth::user()->id }},
                }
            };
            socket.send(JSON.stringify(msg))

        }

        socket.onclose = function (event) {
            console.log("Connection closed ...");
        }

        socket.onmessage = function(e){
           let data = JSON.parse(e.data)
            console.log(data);
            if(data.event=="receive"){
                if(data.data.user==$("#to").val()){
                    $("#board").append(generateTalking(data.data.content,true))
                    history.push($("#customer").val() +": "+data.data.content)

                }
                else if(data.data.user==parseInt({{ Auth::user()->id }})){

                }
                else{
                    if (confirm("You have a new Customer")) {
                        window.open("/manager_talking/"+data.data.user);
                    }
                    else{
                        window.open("/manager_talking/"+data.data.user);
                    }
                }


            }

            //$("#board").append(generateTalking($("#talk").val(),false))
        }


        $("#send").click(function () {
            id=$("#to").val()
            let msg={
                "event": "client_send",
                "data": {
                    "content": $("#talk").val(),
                    "user": {{ Auth::user()->id }},
                    "to":id,
                }
            };
            socket.send(JSON.stringify(msg))
            $("#board").append(generateTalking($("#talk").val(),false))
            history.push("me: "+$("#talk").val())

        })
        $("#save").click(function () {
            let json=JSON.stringify(history)
            window.location.href="/save_talking/"+json;
        })
    })






    function generateTalking(word,if_receiving){
        if(if_receiving==true){

            return"<div class='row'>"
                    +"<div class='col-12'>"
                        +"<div class='receiving mt-2 md-2'>"+word+"</div>"+
                    "<div>"
                 +"<div>"

        }
        else{
            return"<div class='row'>"
                +"<div class='col-12'>"
                +"<div class='talking mt-2 md-2'>"+word+"</div>"+
                "<div>"
                +"<div>"
        }

    }


</script>
@endsection
