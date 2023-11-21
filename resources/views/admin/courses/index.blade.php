@extends('layouts.app-master')


@section('content')

<div class="floating">
    @include('layouts.partials.navbar')
</div>


<!-- Button to trigger the modal -->
<div class="row justify-content-end mb-3">
    <div class="col-auto">
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
            Add Course
        </button>
    </div>
</div>



<table class="table table-striped table-bordered table-hover" id="coursesTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image URL</th> <!-- Add this line -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->course_img_url }}</td> <!-- Add this line -->
                <td>
                    <button class="btn btn-warning edit-course-btn" data-id="{{ $course->id }}">Edit</button>
                    <button class="delete-course-btn btn btn-danger" data-course-id="{{ $course->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Include modals (empty containers to be filled dynamically) -->
<div id="editCourseModalContainer"></div>
<div id="deleteCourseModalContainer"></div>

<!-- Your DataTable and other content -->

<!-- Edit and Delete Course Script -->
<script>
    $(document).ready(function () {
        // Listen for the "Edit" button click
        $('.edit-course-btn').click(function (event) {
            // Prevent the default behavior of the button
            event.preventDefault();

            // Retrieve the course ID
            var courseId = $(this).data('id');

            // Load the edit modal content via AJAX
            $.get('/courses/' + courseId + '/edit', function (data) {
                // Replace the content of the modal container with the fetched data
                $('#editCourseModalContainer').html(data);

                // Show the edit modal
                $('#editCourseModal').modal('show');
            });
        });

    });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var courseIdToDelete;
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('.delete-course-btn').on('click', function () {
            courseIdToDelete = $(this).data('course-id');
            $('#deleteCourseModal').modal('show');
        });

        $('#deleteCourseForm').on('submit', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Perform the delete action here
            deleteCourse(courseIdToDelete);
        });

        $('#deleteCourseModal').on('hidden.bs.modal', function () {
            courseIdToDelete = undefined;
        });

        function deleteCourse(courseId) {
            $.ajax({
                type: 'DELETE',
                url: '{{ route('courses.destroy', ['id' => '__id__']) }}'.replace('__id__', courseId),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    // Display success message
                    $('#validationAlertContainer').html(
                        '<div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">' +
                            'Course deleted successfully' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );

                    // Redirect to a success page or back to the course list after a delay
                    setTimeout(function () {
                        window.location.href = '{{ route('courses.index') }}';
                    }, 3); // Delay for 3 mseconds (adjust as needed)
                },
                error: function (error) {
                    // Display error message
                    $('#validationAlertContainer').html(
                        '<div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            'Error deleting course: ' + error.responseText +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                },
                complete: function () {
                    $('#deleteCourseModal').modal('hide');
                }
            });
        }
    });
</script>


<script>
        // Display delete_status from the session if it exists
        $(document).ready(function () {
            var deleteStatus = '{{ session('delete_status') }}';
            
            if (deleteStatus) {
                $('#validationAlertContainer').html(
                    '<div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">' +
                        deleteStatus +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );
            }
        });
    </script>


@include('admin.courses.create')


<!-- Include the modal -->
@include('layouts.modal.delete-course-modal')

@endsection
