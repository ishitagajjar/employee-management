@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Salary Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <section class="content">
                        <div class="clearfix"></div><br /><br />
                        <div class="row">
                            <div class="col-md-12">
                                <label>Employee Name: <span> {{ $user->first_name . ' ' . $user->last_name }}</span>
                                <br/>
                                <label>Salary: </label> <span>{{$user->salary}}</span>
                                <br/>
                                <label>Total Leave of current month: </label> <span>{{$total_leave}}</span>
                                <br/>
                                <label>Total Salary: </label> <span>{{$total_salary}}</span>
                                
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
