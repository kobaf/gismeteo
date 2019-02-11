@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Погода в Запорожье на {{  $weather['time'] }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>{{  $weather['observation'] }}</h4>
                    <h4>Температура: {{  $weather['temp'] }} ºC</h4>
                    <h4>Ветер: {{  $weather['wind_dir'] }} {{  $weather['wind_speed'] }} м/с</h4>
                    <h4>Давление: {{  $weather['pressure'] }} гПа</h4>
                    <h4>Влажность: {{  $weather['humidity'] }} %</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
