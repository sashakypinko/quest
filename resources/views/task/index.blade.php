@extends('layouts.app')

@section('content')

    <div>
        <task
            :task='@json($task)'
            :count='@json($count)'
        ></task>
    </div>

@endsection
