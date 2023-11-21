<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit user form -->
                <form id="editUserForm" action="{{ route('updateUser', ['id' => $user->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUserUsername" name="username" value="{{ $user->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="editUserPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="editUserRole" class="form-label">Role</label>
                        <select class="form-select" id="editUserRole" name="role" required>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>teacher</option>
                            <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>student</option>
                            <!-- Add other role options as needed -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
