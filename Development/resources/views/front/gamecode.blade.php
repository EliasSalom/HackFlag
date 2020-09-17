@extends('layouts.front')
@section('content')
<div class="enterboxbg">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="enterbox">
                <div class="logo">
                    <a href="javascript:void(0);">
                        <img src="{{URL::asset('/images/logo.png')}}" alt="Logo" />
                    </a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form method="POST" action="{{ route('gameplay') }}" enctype="multipart/form-data" id="myform"  role="form">
                    @csrf
                    <div class="gamecodebg">
                        <p class="mb-5">
                            <h2></h2>
                            <label>Please Enter Game Code</label>
                            <input type="text" name="game_code" class="gamecodebg-input game_code" id="game_code" value="" />
                        </p>
                        <p>
                            <input type="submit" class="joinbtn" value="JOIN The Game" />
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>

<script type="text/javascript">

$(function() {
    $("#myform").validate({
        rules: {
            game_code: {
                required: true,
            },    
        },
        messages: {
            game_code: {
                required: 'Please insert game code ',
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});


</script>
@endsection