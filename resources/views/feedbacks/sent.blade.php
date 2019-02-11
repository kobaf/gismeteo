
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thank you!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Your feedback has been saved.</h3>
                        You'll be redirected to home page now...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script> setTimeout(function(){window.location="/";}, 5000); </script>
