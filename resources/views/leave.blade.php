@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Leave') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <form action="{{url('store')}}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="card-title">Apply Leave</h4>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-right control-label col-form-label">Leave
                                                type</label>
                                            <div class="col-sm-9">
                                                <div class="radiopanel">
                                                    <input type="radio" id="half_day" name="type" value="0"
                                                        checked>
                                                    <label for="half_day">Half Day</label>
                                                </div>
                                                <div class="radiopanel">
                                                    <input type="radio" id="full_day" name="type" value="1"
                                                        {{ !empty($user_profile_data) && $user_profile_data->type == 'full_day' ? 'checked' : '' }}>
                                                    <label for="full_day">Full Day</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname"
                                                class="col-sm-3 text-right control-label col-form-label">Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" min="{{date('Y-m-d')}}" name="date"
                                                    class="form-control" id="date">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-right control-label col-form-label">Reason</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="reason" class="form-control" placeholder="Reason"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-dark">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            console.log("here");
        })
        $("#date").change(function () {
            var end = new Date($('#date').val());
        })

    </script>
    @endsection