<?php
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

echo json_encode(['success' => true]);
exit();