@extends('layouts.app')
@section('title', 'Business Management')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Manage Business.
                 <a href="{{ route('business.create') }}" class="btn btn-primary btn-sm float-right">
                     <i class="fa fa-plus"></i> Add a business
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
                        <th scope="col">Category</th>
                        <th scope="col" width="15%">Name</th>

                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($businesses as $business)
                        <tr>
                            <th scope="row">{{ $business->id }}</th>
                            <td><a href="/category/{{$business->category->slug}}">{{ $business->category->name }}</a></td>
                            <td><a href="/category/{{$business->category->slug}}/{{$business->slug}}">{{ $business->name }}</a></td>
                            <td><a href="{{ route('users.show', $business->user->id) }}">{{ $business->user->profile->first_name . ' ' . $business->user->profile->last_name }}</a></td>
                            <td>
                                @if($business->status==1)
                                 <span class="text-success"><i class="fa fa-unlock"></i> Active</span>
                                @else
                                 <span class="text-danger"> <i class="fa fa-lock"></i> Block</span>
                                @endif
                            </td>
                            <td>{{ date(env('DATE_FORMAT'),strtotime($business->created_at)) }}</td>
                            <td>{{ date(env('DATE_FORMAT'),strtotime($business->updated_at)) }}</td>
                            <td class="text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ route('business.show', $business->id) }}" class="btn btn-white btn-xs"> <i class="fa fa-map-pin"></i> Show</a>
                                    <a href="{{ route('business.edit', $business->id) }}" class="btn btn-white btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                    @if($business->status==1)
                                        <a href="{{ route('business.status', $business->id) }}" class="btn btn-white text-success btn-xs" title="Block this category"> <i class="fa fa-unlock"></i> Status</a>
                                    @else
                                        <a href="{{ route('business.status', $business->id) }}" class="btn btn-white text-warning btn-xs" title="Active this category"> <i class="fa fa-lock"></i> Status</a>
                                    @endif
                                </div>
                                    <div class="pull-right">
                                    {!! Form::open(['method' => 'DELETE','route' => ['business.destroy', $business->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                    </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="d-flex text-right">
                    <div class="pull-right">
                        {!! $businesses->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
