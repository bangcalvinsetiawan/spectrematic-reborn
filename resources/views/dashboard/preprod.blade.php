@extends('dashboard.layouts.dash')

@section('content')

<section class="p-3" id="app">
    {{-- Add Modal --}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">Add User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>
                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="" required class="name form-control"value=''>
                </div>
                <div class="form-group mb-3">
                    <label for="">Username</label>
                    <input type="text" id="" required class="username form-control"value=''>
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="" required class="email form-control"value=''>
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="text" id="" required class="password form-control"value=''>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="">Token</label>
                    <input type="text" id="" required class="token form-control"value=''>
                </div> --}}
                {{-- <div class="form-group mb-3">
                    <label for="">Ct</label>
                    <input type="text" name="ct" required class=" form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Roles</label>
                    <input type="text" name="roles" required class=" form-control">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">Save</button>
            </div>

        </div>
    </div>
</div>



    {{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="stud_id">

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="name" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Register Date</label>
                    <input type="text" id="created_at" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Token</label>
                    <input type="text" id="token" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Ct</label>
                    <input type="text" id="ct" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Roles</label>
                    <input type="text" id="roles" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}
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
                            <a href="/dashboard" class="btn btn-success">Back to Trading</a>
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#AddStudentModal">Add User</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="dataTable-container">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Register Date</th>
                                    <th>Token</th>
                                    <th>Copy Trade</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)

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
                                @endforeach --}}
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
                <th>id</th>
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
           
        </tbody>
    </table> --}}
</section>
@section('scripts')

<script>
    $(document).ready(function () {

        fetchstudent();

        function fetchstudent() {
            $.ajax({
                type: "GET",
                url: "/fetch-students",
                dataType: "json",
                success: function (response) {
                     //console.log(response);
                    $('tbody').html("");
                    $.each(response.users, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.password + '</td>\
                            <td>' + item.created_at + '</td>\
                            <td>' + item.token + '</td>\
                            <td>' + item.ct + '</td>\
                            <td>' + item.roles + '</td>\
                            <td><button type="button" value="' + item.id + '" class="badge bg-primary border-0 editbtn btn-sm"><i class="fas fa-edit"></i></button><button type="button" value="' + item.id + '" class="badge bg-danger border-0 deletebtn"><i class="fas fa-trash-alt"></i></button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_student', function (e) {
            e.preventDefault();

            $(this).text('Sending..');

            var data = {
                       'name': $('.name').val(),
                       'email': $('.email').val(),
                       'password':$('.password').val(),
                       'username': $('.username').val(),
                       //'token': $('.token').val(),
                       //'ct':'0',// $('#ct').val(),
                       //'roles':'0',// $('#roles').val(),
            }
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/student",
                data: data,
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddStudentModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });

        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var stud_id = $(this).val();
            //  alert(stud_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-student/" + stud_id,
                success: function (response) {//alert(stud_id);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        //console(response);
                        $('#name').val(response.users.name);
                        $('#email').val(response.users.email);
                        $('#password').val(response.users.password);
                        $('#created_at').val(response.users.created_at);
                        $('#token').val(response.users.token);
                        $('#ct').val(response.users.ct);
                        $('#roles').val(response.users.roles);
                        $('#stud_id').val(stud_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_student', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#stud_id').val();
            // alert(id);

            var data = {
                       'name': $('#name').val(),
                       'email': $('#email').val(),
                       'created_at': $('#created_at').val(),
                       'token': $('#token').val(),
                       'ct': $('#ct').val(),
                       'roles': $('#roles').val(),
                
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-student/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_student').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_student').text('Update');
                        $('#editModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });

        $(document).on('click', '.deletebtn', function () {
            var stud_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(stud_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-student/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchstudent();
                    }
                }
            });
        });

    });

</script>

@endsection

@endsection
