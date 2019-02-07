@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Please drop a message for us</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
<!-- Begin form -->
                            <form method="POST" action="{{ route('feedback') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Your name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" required >

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="feedback" class="col-md-4 col-form-label text-md-right">{{ __('Your message') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="feedback" rows="5" class="form-control{{ $errors->has('feedback') ? ' is-invalid' : '' }}" name="feedback" required> </textarea>

                                        @if ($errors->has('feedback'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('feedback') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send') }}
                                        </button>


                                    </div>
                                </div>
                            </form>
<!-- End form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
