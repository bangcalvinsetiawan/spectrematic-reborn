@extends('dashboard.layouts.dash')

@section('content')

<section class="p-3" id="app">
    <header>
    <h3>Admin Control</h3>
    </header>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Users Data
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#AddStudentModal">Add User</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="datatable-container">
                            <table class="table table-bordered" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Register Date</th>
                                        <th>Token</th>
                                        <th>Copy Trade</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->token }}</td>
                                        <td>{{ $user->ct == 1 ? 'YES' : 'NO' }}</td>
                                        <td>{{ $user->roles == 1 ? 'ADMIN' : 'USER' }}</td>
                                        <td>Edit Delete</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Register Date</th>
                <th>Token</th>
                <th>Copy Trade</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->token }}</td>
                <td>{{ $user->ct == 1 ? 'YES' : 'NO' }}</td>
                <td>{{ $user->roles == 1 ? 'ADMIN' : 'USER' }}</td>
                <td>Edit Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}
</section>

@endsection
