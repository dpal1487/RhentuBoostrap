
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">User Details</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboards</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <div class="container bg-white rounded">
        {{-- <h1>Laravel 9 Yajra Datatables Tutorial - ItSolutionStuff.com</h1> --}}
        {{-- {{ $result }} --}}
        <table class="table table-bordered data-table"  id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    {{-- <th>Gender</th> --}}
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as  $row)
                <tr>
                <td>{{ ++$loop->index }}
                <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->mobile }}</td>
                {{-- <td>{{ $row->gender }}</td> --}}
                <td>
                    <a class="btn btn-primary btn-sm" href="/users/{{$row->id }}/overview">View</a>
                </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

        @section('javascript')

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
        @endsection



</x-app-layout>
