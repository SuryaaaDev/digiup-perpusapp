@extends('layouts.app')

@section('content')
    <div>Contact Us</div>
    <div>Hubungi email {{ $data['email'] }}, no telepon {{ $data['phone'] }}</div>
@endsection
