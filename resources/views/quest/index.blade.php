@extends('layouts.app')

@section('content')

    <div>
        <quest
            :data='@json($quest)'
        ></quest>
    </div>

@endsection
