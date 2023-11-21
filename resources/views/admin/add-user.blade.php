<!-- resources/views/admin/add-user.blade.php -->


@extends('layouts.app-master')


@section('content')

    <div class="floating">
        @include('layouts.partials.navbar')
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="validationAlertContainer"></div>

                    @if(session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- Button to trigger the modal -->
                    <div class="row justify-content-end mb-3">
                        <div class="col-auto">
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                Add User
                            </button>
                        </div>
                    </div>

                    <!-- Add User Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Add User</h4>
                                    </div>
                                    <div class="card-body">

                                        
                                        <form method="post" action="{{ route('storeUser') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" name="email" class="form-control" required type="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username:</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" name="password" class="form-control" required minlength="8">
                                            </div>
                                            <!-- Add other form fields as needed -->
                                            <button type="submit" class="btn btn-primary" onclick="validateAndSubmit()">Add User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="editUserModalContainer"></div>
                    <div id="deleteUserModalContainer"></div>

                    


                    


                    <!-- Table of Users with Actions -->
                    <table id="userTable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through users and display data -->
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary edit-user-btn" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="{{ $user->id }}">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger delete-user-btn" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-user-id="{{ $user->id }}">
                                            Delete
                                        </button>





                                    </td>
                                </tr>

                                <!-- Edit User Modal (similar to previous examples) -->

                                <!-- Delete User Modal (similar to previous examples) -->
                            @endforeach
                        </tbody>
                    </table>

                    

                </div>
            </div>
        </div>
    </div>


        <!-- Bootstrap JavaScript and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function validateAndSubmit() {
        var passwordField = document.getElementById('password');
        var successAlert = document.getElementById('successAlert');

        // Use JavaScript or a library like Parsley.js for form validation
        // For simplicity, let's assume the fields are required
        if (document.getElementById('addUserForm').checkValidity()) {
            if (passwordField.value.length < 8) {
                // Display Bootstrap alert for password length error
                var passwordLengthAlert = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password must be at least 8 characters long.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                document.getElementById('validationAlertContainer').innerHTML = passwordLengthAlert;
            } else {
                // Show the success alert
                successAlert.style.display = 'block';

                // Clear validation error messages
                document.getElementById('validationAlertContainer').innerHTML = '';

                // Optionally, you can reset the form fields
                document.getElementById('addUserForm').reset();
            }
        } else {
            // Display Bootstrap alert for validation error
            var validationAlert = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please fill in all required fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            document.getElementById('validationAlertContainer').innerHTML = validationAlert;
        }
    }

    
    var userTable = $('#userTable').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Example: Set the number of records per page
        "order": [[0, 'asc']] // Example: Set the default sorting column and order
        });




</script>

<script>
    $(document).ready(function () {
        // Listen for the "Edit" button click
        $('.edit-user-btn').click(function (event) {
            // Prevent the default behavior of the anchor tag
            event.preventDefault();

            // Retrieve the user ID
            var userId = $(this).data('user-id');

            // Check if the modal content is already loaded
            if (!$('#editUserModalContainer').html()) {
                // Use AJAX to dynamically load the Edit User modal content
                $.ajax({
                    url: '/get-edit-user-modal/' + userId, // Adjust the URL based on your routes
                    method: 'GET',
                    success: function (response) {
                        // Append the modal content to the container
                        $('#editUserModalContainer').html(response);
                        
                        // Show the modal
                        $('#editUserModal').modal('show');
                    },
                    error: function (error) {
                        console.error('Error loading Edit User modal:', error);
                    }
                });
            } else {
                // Modal content is already loaded, show the modal
                $('#editUserModal').modal('show');
            }
        });

        // Handle modal events
        $('#editUserModal').on('show.bs.modal', function () {
            // Additional logic when the modal is shown
        });

        $('#editUserModal').on('hidden.bs.modal', function () {
            // Remove the modal backdrop
            $('.modal-backdrop').remove();

            // Additional logic when the modal is hidden
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Listen for the "Delete" button click
        $('.delete-user-btn').click(function (event) {
            // Prevent the default behavior of the anchor tag
            event.preventDefault();

            // Retrieve the user ID
            var userId = $(this).data('user-id');

            // Check if the modal content is already loaded
            if (!$('#deleteUserModalContainer').html()) {
                // Use AJAX to dynamically load the Delete User modal content
                $.ajax({
                    url: '/get-delete-user-modal/' + userId, // Adjust the URL based on your routes
                    method: 'GET',
                    success: function (response) {
                        // Append the modal content to the container
                        $('#deleteUserModalContainer').html(response);
                        
                        // Show the modal
                        $('#deleteUserModal').modal('show');
                    },
                    error: function (error) {
                        console.error('Error loading Delete User modal:', error);
                    }
                });
            } else {
                // Modal content is already loaded, show the modal
                $('#deleteUserModal').modal('show');
            }
        });

        // Handle modal events
        $('#deleteUserModal').on('show.bs.modal', function () {
            // Additional logic when the modal is shown
        });

        $('#deleteUserModal').on('hidden.bs.modal', function () {
            // Remove the modal backdrop
            $('.modal-backdrop').remove();

            // Additional logic when the modal is hidden
        });
    });
</script>


@endsection

