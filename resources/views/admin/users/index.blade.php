@extends('layouts.admin')
@section('content')
<div class="row" style="margin-bottom: 10px;">
    <div class="col-lg-12 d-flex justify-content-end">
        <div style="padding: 30px; padding-top: 0 !important; padding-bottom: 0 !important;">
            <a class="btn btn-theme" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
</div>

    <div class="card">
      <h5 class="card-header">User List</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
                <th>
                    {{ trans('cruds.user.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.email') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.email_verified_at') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.roles') }}
                </th>
                <th>
                    Actions
                </th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($users as $user)
            <tr data-entry-id="{{ $user->id }}" >
                <td>{{$firstItem++ }}</td>
                <td>{{$user->name ?? '' }}</td>
                <td>{{$user->email ?? '' }}</td>
                <td>{{$user->email_verified_at ?? '' }}</td>
                <td></td>
                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.users.show', $user->id) }}"
                            ><i class="bx bx-show-alt me-1"></i> Show</a
                          >
                        <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>

@endsection
