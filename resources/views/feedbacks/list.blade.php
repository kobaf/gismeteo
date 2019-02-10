@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Feedbacks left so far</h3>
                @foreach($feedbacks as $feedback)
                    <div class="card">
                        <div class="card-header">{{$feedback['name']}} ({{$feedback['email']}}) posted on {{\Carbon\Carbon::parse($feedback['created_at'])->format('d M Y')}}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{$feedback['feedback']}}
                        </div>
                    </div>
                    <br><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection