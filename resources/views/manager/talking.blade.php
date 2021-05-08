@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs " id="myTab" role="tablist">

                </ul>
            </div>

        </div>
    </div>

    <div class="tab-content" id="myTabContent">

    </div>





<script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
<script>



    $(document).ready(function () {
        var talk_users=[];
        var history=[];
        var socket;
        init()

        function init() {
             socket = new WebSocket("ws://159.203.191.85:1215");
            socket.onopen = function (event) {
                console.log("Connection open ...");
                login()

            }
            setInterval(login,300000)
            function login(){
                let msg={
                    "event": "login",
                    "data": {
                        "uid": {{ Auth::user()->id }},
                    }
                };
                console.log("login ...");
                socket.send(JSON.stringify(msg))
            }

            socket.onclose = function (event) {
                console.log("Connection closed ...");
                init()
            }

            socket.onerror = function() {
                console.log('error');
                init()

            };

            socket.onmessage = function(e){
                let data = JSON.parse(e.data)
                console.log("message");
                if(data.event=="receive"){
                    if(data.data.user!=parseInt({{ Auth::user()->id }})){
                        var if_exist=false;
                        var i=0;
                        while( i<talk_users.length){
                            if(talk_users[i]==data.data.user){
                                $("#board-"+data.data.user).append(generateTalking(data.data.content,true))
                                if_exist=true;
                                history[i].push(data.data.name+":"+data.data.content)
                                break;

                            }
                            i++
                        }
                        if(if_exist==false){
                            generateBoard(data.data.name,data.data.user)
                            $("#board-"+data.data.user).append(generateTalking(data.data.content,true))
                            talk_users.push(data.data.user)
                            history.push([data.data.name+":"+data.data.content]);

                        }

                    }
                }
            }
        }


        $(document).on("click", ".send", function () {
            let id=$(this).attr("talk-to");
            let msg={
                "event": "client_send",
                "data": {
                    "content": $("#talk-"+id).val(),
                    "user": {{ Auth::user()->id }},
                    "to":id,
                }
            };
            socket.send(JSON.stringify(msg))
            $("#board-"+id).append(generateTalking($("#talk-"+id).val(),false))

            var i=0
            while(i<talk_users.length){
                if(talk_users[i]==id){
                    history[i].push("me:"+$("#talk-"+id).val())
                    console.log(history)
                    break;
                }
                i++;

            }
            $("#talk-"+id).val("")

        })

        $(document).on("click", ".save", function () {
            let id=$(this).attr("talk-to");
            for(var i=0;i<talk_users.length;i++){
                if(talk_users[i]==id){
                    let json=JSON.stringify(history[i])
                    window.location.href="/save_talking/"+json;
                    break;
                }

            }

        })

    })



    function generateBoard(name,id) {
        let tab="<li class='nav-item'>"+
            "<a class='nav-link' id='tab-"+id+"'"+" data-toggle='tab' href='#panel-"+id+"'>"+name+"</a>"+
            "</li>";
        $("#myTab").append(tab)

        let pane= "<div class='container tab-pane mt-3' id='panel-"+id+"'>"+
                    "<div class='row justify-content-center'>"+
                        "<div class='col-md-8'>"+
                            "<div class='card'>"+
                                "<div class='card-header'>"+name+"</div>"
                                    +"<div class='card-body' id='board-"+id+"'>"
                                    +"</div>"
                                    +"<div class='card-body mt-3 '>"
                                        +"<div class='form-group row justify-content-center'>"
                                            +"<div class='col-md-8'>"
                                                +"<textarea  class='w-100 form-control my-editor '  id='talk-"+id+"'>"
                                                +"</textarea>"
                                            +"</div>"
                                        +"</div>"
                                    +"<div class='form-group row justify-content-center'>"
                                        +"<div class='col-md-8 '>"
                                            +"<button type='button' class='btn btn-primary send' talk-to='"+id+"'>"
                                            +"Send"
                                            +"</button>"
                                        +"</div>"
                                    +"</div>"
                                    +"<div class='form-group row justify-content-center mt-1'>"
                                        +"<div class='col-md-8 '>"
                                            +"<button type='button' class='btn btn-primary save' talk-to='"+id+"'>"
                                            +"Save"
                                            +"</button>"
                                        +"</div>"
                                    +"</div>"
                                +"</div>"
                            +"</div>"
                        +"</div>"
                    +"</div>"
            +"</div>"
        $("#myTabContent").append(pane)



    }




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
