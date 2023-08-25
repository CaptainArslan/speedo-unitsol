<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Parents Portal Login | Speedo Swim Squad</title>
    <!-- StyleSheets  -->
    @include('layouts.partials.style')
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="row">
                        <div class="col-6">
                            <div class="nk-block nk-block-middle m-5 wide-xs">
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Emirates</h4>
                                            </div>
                                        </div>
                                        <form action="{{ url('add_emirate') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Name</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" required
                                                        class="form-control form-control-lg" id="default-01"
                                                        placeholder="Enter  name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary btn-block">Add</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="nk-block nk-block-middle m-5 wide-xs">
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Areas</h4>
                                            </div>
                                        </div>
                                        <form action="{{ url('add_area') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <select name="emirate_id" id="classPrice" class="select2 form-control"
                                                    data-search="on" required>
                                                    <option value="">select emirate</option>
                                                    @foreach ($emirates as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Name</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" required
                                                        class="form-control form-control-lg" id="default-01"
                                                        placeholder="Enter  name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary btn-block">Add</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="nk-block nk-block-middle m-5 wide-xs">
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Emirates</h4>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped mt-5">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($emirates as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td><a href="{{ url('emirate_delete/' . $item->id) }}">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="nk-block nk-block-middle m-5 wide-xs">
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Areas</h4>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped mt-5">
                                            <thead>
                                                <tr>
                                                    <th>Emirate</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $item)
                                                    <tr>
                                                        <td>{{ $item->emirate->name }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td><a
                                                                href="{{ url('area_delete/' . $item->id) }}">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- wrap @e -->
                </div>
                <!-- content @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        @include('layouts.partials.script')
        <script src="{{ asset('admin-assets/assets/js/scripts.js?ver=2.9.0') }}"></script>
        <script src="{{ asset('js/select2/js/select2.min.js') }}"></script>
        <script>
            $('.select2').select2();
        </script>
        {{-- <script>
            function showWarn(title) {
                NioApp.Toast(title, 'error', {
                    position: 'top-right',
                    fadeAway: 2000

                });
            }
            var msg = '{{ Session::get('message') }}';
            var exist = '{{ Session::has('message') }}';
            if (exist) {
                showWarn(msg)
            }
        </script> --}}

</html>
