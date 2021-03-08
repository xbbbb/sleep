@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Record</div>

                <div class="card-body">
                    <table class="table table-striped table-hover text-center mt-3" style="min-width: 900px; ">
                        <thead>
                        <tr>

                            <td>
                                <h6>Temperature</h6>
                            </td>
                            <td>
                                <h6>BMP</h6>
                            </td>
                            <td>
                                <h6>Status</h6>
                            </td>
                            <td>
                                <h6>Time</h6>
                            </td>
                        </tr>
                        </thead>
                        @foreach($records as $record)
                            <tr>
                                <td><p>{{$record['temperature']}}</p></td>
                                <td><p>{{$record['bmp']}}</p></td>
                                <td>
                                    <p>
                                        @if($record['status']==0)
                                            Awake
                                            @elseif($record['status']==1)
                                            Shallow Sleep
                                        @elseif($record['status']==2)
                                            Deep Sleep
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <p>{{$company['created_at']}}</p>
                                </td>

                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
