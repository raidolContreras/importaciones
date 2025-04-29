<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form id="create-user-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Create User</button>
    </form>
    <script src="view/assets/js/jquery-3.7.1.min.js"></script>
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
</body>
</html>