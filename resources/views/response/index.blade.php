@extends('layouts.app')

@section('content')

    <div>
        <response-show
            :users='@json($users)'
        ></response-show>
    </div>

@endsection
