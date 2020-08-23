@extends('layouts.app')

@section('content')

    <chat
        :user='@json($user)'
        ></chat>

@endsection
