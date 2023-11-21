<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit course form -->
                <form method="post" action="{{ route('courses.update', $course->id) }}">
                    @csrf
                    @method('post') <!-- Use the post method with the _method directive -->
                    <!-- Rest of your form -->
                    <div class="mb-3">
                        <label for="editCourseName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editCourseName" name="name" value="{{ $course->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCourseDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editCourseDescription" name="description">{{ $course->description }}</textarea>
                    </div>
                    <!-- Add the new input for course_img_url -->
                    <div class="mb-3">
                        <label for="editCourseImgUrl" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="editCourseImgUrl" name="course_img_url" value="{{ $course->course_img_url }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
