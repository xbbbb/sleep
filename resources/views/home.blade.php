<div class='container tab-pane' id='profile'>
    <div class='row justify-content-center'>
        <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>{{ $name }} &nbsp;&nbsp;&nbsp;&nbsp; {{$email}}</div>

                <div class='card-body' id='board'>

                </div>


                <div class='card-body mt-3 '>
                    <div class='form-group row justify-content-center'>
                        <div class='col-md-8'>
                            <input type='hidden' value='{{$to}}' id='to'>
                            <input type='hidden' value='{{$name.'|'.$email}}' id='customer'>

                            <textarea  class='w-100 form-control my-editor talk'  id='talk'>

                            </textarea>


                        </div>

                    </div>


                    <div class='form-group row justify-content-center'>
                        <div class='col-md-8 '>
                            <button type='button' class='btn btn-primary' id='send'>
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>

                    <div class='form-group row justify-content-center mt-1'>
                        <div class='col-md-8 '>
                            <button type='button' class='btn btn-primary' id='save'>
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
