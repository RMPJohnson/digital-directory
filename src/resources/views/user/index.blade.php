@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Manage Users.
                 <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">
                     <i class="fa fa-plus"></i> Add a user
                 </a>

            </div>
            <div class="ibox-content">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col" width="10%">Status</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row"><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->profile->first_name .' '. $user->profile->last_name }}</td>
                            <td>{{ $user->profile->address }}</td>
                            <td>{{ $user->profile->phone_no }}</td>
                            <td>   @if($user->status==1)
                                    <span class="text-success"><i class="fa fa-unlock"></i> Active</span>
                                @else
                                    <span class="text-danger"> <i class="fa fa-lock"></i> Block</span>
                                @endif
                            </td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group">

                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-white btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                    @if($user->id != auth()->user()->id && $user->roles->pluck('name')[0]!='Admin' )
                                        @if($user->status==1)
                                            <a href="{{ route('users.status', $user->id) }}" class="btn btn-white text-success btn-xs" title="Block this category"> <i class="fa fa-unlock"></i> Status</a>
                                        @else
                                            <a href="{{ route('users.status', $user->id) }}" class="btn btn-white text-warning btn-xs" title="Active this category"> <i class="fa fa-lock"></i> Status</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="pull-right">
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
