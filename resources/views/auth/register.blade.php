@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col-md-8 order-md-1 mt-5">
                            <h4 class="mb-3">{{__('Название команды')}}</h4>
                        <div class="form-group row mb-2">
                            <div class="col-md-6 mt-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">
                                    {{ __('Начать игру') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
