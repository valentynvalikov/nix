<?php
session_start();

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