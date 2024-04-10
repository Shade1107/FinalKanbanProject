<?php
$path = realpath(__DIR__ . "/../");

require_once("$path/Repositories/TaskRepository.php");
require_once("$path/Repositories/Task_memberRepository.php");
require_once("$path/Repositories/UserRepository.php");
require_once("$path/Repositories/Project_memberRepository.php");
require_once("$path/Database/DatabaseConnection.php");

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());

$error_messages = []; // Initialize an array to store error messages for each field

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $required_fields = [
        'project_id' => 'Project ID',
        'short_description' => 'Short Description',
        'task_name' => 'Task Name',
        'user_id' => 'User ID',
        'stage_id' => 'Stage ID',
        'task_priority_color' => 'Task Priority Color',
        'task_priority_border' => 'Task Priority Border'
    ];

    foreach ($required_fields as $field => $field_name) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $error_messages[$field] = "$field_name is required.";
        }
    }

    // Check if user_id field is empty (no members selected)
    if (!isset($_POST['user_id']) || empty($_POST['user_id'])) {
        $error_messages['user_id'] = "Please select at least one member.";
    }

    if (empty($error_messages)) {
        $project_id = $_POST['project_id'];
        $short_description = DatabaseConnection::getInstance()->real_escape_string($_POST['short_description']);
        $task_name = DatabaseConnection::getInstance()->real_escape_string($_POST['task_name']);
        $user_ids = $_POST['user_id'];
        $stage = DatabaseConnection::getInstance()->real_escape_string($_POST['stage_id']);
        $priority_color = DatabaseConnection::getInstance()->real_escape_string($_POST['task_priority_color']);
        $priority_border = DatabaseConnection::getInstance()->real_escape_string($_POST['task_priority_border']);

        // Create the task
        $result = $taskRepo->create($project_id, $stage, $short_description, $task_name, $user_ids, $priority_color, $priority_border);
        if ($result) {
            header('Location: ../pages/home_admin.php?id=' . $project_id);
            exit;
        } else {
            $error_messages['general'] = "Error inserting task.";
        }
    }
}
?>
