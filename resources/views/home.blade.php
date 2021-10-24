@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="salary">
                        <form method="POST" action="{{ url('update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text"
                                        class="form-control" name="salary"
                                        value="{{ (!empty($user->salary) ? $user->salary : '' ) }}">

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <div class="leave">
                        <label>Total Count Of Leave: </label> <span>{{ $user->total_leave }}</span>
                        <br />
                        <a href="{{ url('apply-leave' )}}" class="btn btn-primary">Apply Leave</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
