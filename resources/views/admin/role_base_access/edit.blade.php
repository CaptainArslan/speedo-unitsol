@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> Edit Role Access</h3>
                            <p>You can edit role access as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="add-role">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Role Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" value="{{ $record->name }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Main Menu Access -->
                                            @foreach ($types as $item)
                                                <div class="col-lg-12">
                                                    <h6 class="title mb-3">{{ $item->type }}</h6>
                                                    <ul class="custom-control-group">
                                                        @foreach ($titles as $title)
                                                            @if ($title->type == $item->type)
                                                                <li>
                                                                    <div
                                                                        class="col-12 custom-control custom-checkbox custom-control-pro no-control">
                                                                        <input type="checkbox"
                                                                            class="form-control custom-control-input"
                                                                            id="{{ $title->category }}"
                                                                            onclick="permissionCategory('{{ $title->category }}',$(this)[0])">
                                                                        <label class="custom-control-label"
                                                                            for="{{ $title->category }}"><em
                                                                                class="icon ni ni-{{ $title->icon }}"></em><span>{{ $title->title }}</span></label>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <table class="nowrap table table-bordered">
                                                                                <tbody>
                                                                                    @foreach ($permissions as $key => $permission)
                                                                                        @if ($permission->category == $title->category && $permission->type == $item->type)
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <label
                                                                                                        class="form-label "
                                                                                                        for="staff-title">{{ $permission->display_name }}</label>

                                                                                                </th>
                                                                                                <td>
                                                                                                    <div class="form-group">
                                                                                                        <div
                                                                                                            class="form-control-wrap">
                                                                                                            <input
                                                                                                                type="checkbox"
                                                                                                                @if ($record->hasPermissionTo($permission->name)) checked @endif
                                                                                                                {{-- value="{{ $permission->id }}" --}}
                                                                                                                class="{{ $permission->category }}"
                                                                                                                name="{{ $permission->id }}"
                                                                                                                id="schedule-view">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    @endforeach


                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            @endforeach

                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/role-base-accesses/' . $record->id) }}','{{ url('admin/role-base-accesses') }}','add-role')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/role-base-accesses') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>

                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .card-preview -->
        </div>
    </div>

    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        function permissionCategory(category, e) {
            if (e.checked) {
                $('.' + category).prop("checked", true)
            } else {
                $('.' + category).prop("checked", false)
            }
        }
    </script>
@stop
