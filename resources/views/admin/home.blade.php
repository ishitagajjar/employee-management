@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

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
                                <div class="box box-success">
                                    <div class="box-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($users))
                                                @foreach($users as $key => $user)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="{{ url('salary-details/'. $user->id) }}"
                                                            class="btn btn-success">View</a>
                                                        {{-- <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#{{'exampleModal'.$key}}">
                                                            Salary Details
                                                        </button> --}}
                                                    </td>
                                                    {{-- <div class="modal fade" id="{{'exampleModal'.$key}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        {{$user->first_name}}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <!-- Modal Example Start-->

                                            <!-- Modal Example End-->
                                        </table>
                                        {{-- {{ $users->links('vendor.pagination.custom') }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
