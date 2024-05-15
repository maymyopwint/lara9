@extends('layouts.admin')
@section('content')
<div class="row" style="margin-bottom: 10px;">
    <div class="col-lg-12 d-flex justify-content-end">
        <div style="padding: 30px; padding-top: 0 !important; padding-bottom: 0 !important;">
            <a class="btn btn-theme" href="{{ route('admin.permissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
</div>

<div class="card">
  <h5 class="card-header">Permission List</h5>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
            <th>
                {{ trans('cruds.permission.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.permission.fields.title') }}
            </th>
            <th>
                Actions
            </th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($permissions as $permission)
        <tr data-entry-id="{{ $permission->id }}" >
            <td>{{$firstItem++ }}</td>
            <td>{{$permission->title ?? '' }}</td>
            <td>
                <a class="me-2" href="{{ route('admin.permissions.show', $permission->id) }}"
                    ><i class="bx bx-show-alt me-1"></i></a
                    >
                <a class="me-2" href="{{ route('admin.permissions.edit', $permission->id) }}"
                    ><i class="bx bx-edit-alt me-1"></i></a
                >
                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs">
                        <i class="bx bx-trash me-1 icon-color"></i>
                    </button>
                </form>
              </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $permissions->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
