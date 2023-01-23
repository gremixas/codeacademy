<?php
session_start();

(function (): void {
    $status = "";
    $title = "";
    $body = "";

    switch ($_GET['type'] ?? "") {
        case 'success':
            $status = '1';
            $title = 'success';
            $body = 'valioooo';
            break;
        case 'failed':
            $status = '0';
            $title = 'failed';
            $body = 'o neeeeee';
            break;
        case 'info':
            $status = '2';
            $title = 'info';
            $body = 'kad tu zinotum....';
            break;
        case 'reset':
            $status = '';
            $title = '';
            $body = '';
            break;
        default:
            echo "something's wrong.";
            break;
    }

    $_SESSION['message'] = [
        'status' => $status,
        'title' => $title,
        'body' => $body,
    ];

    header("Location: message_tester.php");
})();
?>
