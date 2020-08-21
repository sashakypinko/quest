@extends('layouts.app')

@section('content')

    <div>
        <task
            :task='@json($task)'
        ></task>
    </div>

@endsection
