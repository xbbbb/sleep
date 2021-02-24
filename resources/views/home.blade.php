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
                                <button type="button" class="btn btn-primary w-100">
                                    On
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-danger w-100">
                                    Off
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-outline-danger w-100">
                                     Up
                                </button>
                            </div>

                            <div class="col-md-8 mt-2">
                                <button type="button" class="btn btn-outline-info w-100">
                                    Down
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function () {

        // 初始化客户端套接字并建立连接
        var socket = new WebSocket("ws://0.0.0.0:1215");

        // 连接建立时触发
        socket.onopen = function (event) {
            console.log("Connection open ...");
        }

        // 接收到服务端推送时执行
       /* socket.onmessage = function (event) {
            var msg = event.data;
            var node = document.createTextNode(msg);
            var div = document.createElement("div");
            div.appendChild(node);
            document.body.insertBefore(div, input);
            input.scrollIntoView();
        };*/

        // 连接关闭时触发
        socket.onclose = function (event) {
            console.log("Connection closed ...");
        }


    }
</script>
@endsection
