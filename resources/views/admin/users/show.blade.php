@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
       {{-- <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th>{{ trans('cruds.user.fields.name') }}</th>
                <td>{{$user->name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{ trans('cruds.user.fields.email') }}</th>
                <td>{{$user->email ?? ''}}</td>
            </tr>
        </tbody>
       </table>
        <a href="{{ route('admin.users.index') }}" class="btn btn-default me-3">
            {{ trans('global.back_to_list') }}
        </a> --}}
        <form method="POST" action="{{ route("admin.users.update",[$user->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required disabled>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group mt-3">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email',$user->email) }}" required disabled>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group mt-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-3">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
