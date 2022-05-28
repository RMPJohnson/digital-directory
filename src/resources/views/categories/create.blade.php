@extends('layouts.app')
@section('title', 'Roles | Create')
@section('content')
    <div class="col-lg-8">
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="ibox">
                <div class="ibox-title">
                    Add Category.
                </div>
                <div class="ibox-content">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            {!! Form::text('name', old('name'), array('placeholder' => 'Name','class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Slug *</label>
                            {!! Form::text('slug', old('slug'), array('placeholder' => 'Slug','class' => 'form-control')) !!}
                            @if ($errors->has('slug'))
                                <span class="text-danger text-left">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Status *</label> <br />
                            Active @if(old('status') ==1 ) {{ Form::radio('status',1 ,true ,array()) }}
                                   @else {{ Form::radio('status',1 ,array()) }}
                                   @endif
                            Block  @if(old('status') == 0 ) {{ Form::radio('status',0 ,true ,array()) }}
                                   @else {{ Form::radio('status',0 ,array()) }}
                                   @endif
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        </div>



                </div>
                <div class="ibox-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save changes</button>
                    <a href="{{ route('category.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
