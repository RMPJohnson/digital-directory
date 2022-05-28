@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Manage Categories.
                 <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right">
                     <i class="fa fa-plus"></i> Add a category
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
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col" class="col-lg-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->status==1)
                                 <span class="text-success"><i class="fa fa-unlock"></i> Active</span>
                                @else
                                 <span class="text-danger"> <i class="fa fa-lock"></i> Block</span>
                                @endif
                            </td>
                            <td>{{ date(env('DATE_FORMAT'),strtotime($category->created_at)) }}</td>
                            <td>{{ date(env('DATE_FORMAT'),strtotime($category->updated_at)) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-white btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                    @if($category->status==1)
                                        <a href="{{ route('category.status', $category->id) }}" class="btn btn-white text-success btn-xs" title="Block this category"> <i class="fa fa-unlock"></i> Status</a>
                                    @else
                                        <a href="{{ route('category.status', $category->id) }}" class="btn btn-white text-warning btn-xs" title="Active this category"> <i class="fa fa-lock"></i> Status</a>
                                    @endif
                                </div>
                                    <div class="pull-right">
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $category->id],'style'=>'display:inline']) !!}
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
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
