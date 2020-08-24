@extends('layouts.app')

@section('content')

    <chat
        :user='@json($user)'
        :users='@json($users)'
        ></chat>

@endsection
