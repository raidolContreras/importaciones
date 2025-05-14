<?php
// Start the session
session_start();

// Log the user data fetch action
require_once __DIR__ . "/form.controller.php";
require_once "../model/form.model.php";
LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "User logged out");

// Destroy all session data
session_unset();
session_destroy();

echo json_encode(['success' => true]);

exit();
