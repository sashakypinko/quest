@extends('layouts.app')

@section('content')

    <div>
        <quest-page
            :task='@json($task)'
        ></quest-page>
    </div>

@endsection
