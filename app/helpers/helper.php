<?php

//session_start(); // moved to __construct in Core.php/перенёс в __construct в Core.php

// Flash messages/Уведомления
// Example/Пример - flash('register_success', 'You are now registered', 'alert alert-danger')
// Display in view/Отобразить в представлении - echo flash('register_success');
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name) && !empty($message) && empty($_SESSION[$name])) {
        if (!empty($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }

        if (!empty($_SESSION[$name . '_class'])) {
            unset($_SESSION[$name . '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
        echo '<div class="' . $class . '" id="msg_flash">' . $_SESSION[$name] . '</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
    }
}

// Simple page redirect
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function h($chars = "")
{
    return htmlspecialchars($chars);
}

function u($chars = "")
{
    return urlencode($chars);
}

function s($chars = "")
{
    return strip_tags($chars, '<iframe><div>');
}
