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
                            <h3 class="nk-block-title page-title"> Edit Assessment</h3>
                            <p>You can edit assessment as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-class">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Select Class<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <select name="class_id" required class="form-select2 form-control"
                                                            data-search="on">
                                                            <option value="">select class</option>
                                                            @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($assessment->swimming_class_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <table class="table table-striped table-bordered " id="dynamicTable2">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            ?>
                                                            @foreach ($assessment->assessmentDetails as $item)
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" hidden
                                                                            id="assessment_id-{{ $i }}"
                                                                            name="assessment[{{ $i }}][assessment_id]"
                                                                            value="{{ $item->id }}"
                                                                            class="form-control">
                                                                        <input type="text" id="name-{{ $i }}"
                                                                            name="assessment[{{ $i }}][name]"
                                                                            value="{{ $item->name }}" required
                                                                            class="form-control" id="product-title">
                                                                    </td>
                                                                    <td>
                                                                        <textarea type="text" col="4" rows="1" name="assessment[{{ $i }}][description]" required
                                                                            class="form-control" id="description-{{ $i }}">{{ $item->description }}</textarea>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr">
                                                                            <em class="icon ni ni-cross"></em></button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <button type="button" name="add2" id="add2"
                                                                        class="btn btn-sm btn-success  d-none d-md-inline-flex"><em
                                                                            class="icon ni ni-plus"></em>Add
                                                                        More</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/assessments/' . $assessment->id) }}','{{ url('admin/assessments') }}','edit-class')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/assessments') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>
                                        </div>
                                    </form>

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
        var i = parseInt('{{ $i }}');
        $("#add2").click(function() {
            ++i;
            $("#dynamicTable2").append('<tr>' +
                '<td> <input type="text"  id="name-' + i + '" name="assessment[' + i +
                '][name]" class="form-control" /></td>' +
                '<td><textarea type="text" col="4" rows="1" id="description-' + i + '" name="assessment[' + i +
                '][description]" required class="form-control"></textarea></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@stop
