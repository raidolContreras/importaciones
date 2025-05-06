<div class="container-fluid py-4 d-flex flex-column">
    <div class="card modern-card">
        <div class="card-body">
            <h1 class="card-title text-center createUser"></h1>
            <form id="create-user-form" class="d-flex align-items-center gap-3">
                <div class="mb-3 flex-grow-1">
                    <label for="username" class="form-label username"></label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3 flex-grow-1">
                    <label for="password" class="form-label password"></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 flex-grow-1">
                    <label for="role" class="form-label role"></label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="" disabled selected>Seleccione un rol</option>
                        <option value="1">SuperAdmin</option>
                        <option value="2">Ejecutivo</option>
                        <option value="3">Supervisor</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary createUser"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#create-user-form').on('submit', function(e) {
            e.preventDefault();

            const formData = {
                action: 'createUser',
                username: $('#username').val(),
                password: $('#password').val()
            };

            $.ajax({
                url: 'controller/actions.controller.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#create-user-form')[0].reset(); // Reset the form
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while creating the user.');
                    console.error(error);
                }
            });
        });
    });
</script>