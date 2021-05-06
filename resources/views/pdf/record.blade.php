<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>

<div style="top: 20%;left: 12.5%; width: 60%; position: fixed;z-index: 0">
    <img src="{{url("img/logo.png")}}" style="width: 100%;opacity: 0.4">
</div>
<div class="container" style=" margin-left: 10%; width: 80%; font-size: 12px;z-index: 100;margin-top: 20px">
    <h1 style="text-align: center">
        History
    </h1>
    @foreach($results as $result)
        <div style="width: 100%">
            {{$result}}
        </div>

    @endforeach
</div>



</body>
</html>
