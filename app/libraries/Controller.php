<?php

namespace app\controllers;

    /*
     * Base  Controller/Основной контроллер
     * Loads models and views/Загружает модели и отображения (виды)
     */

class Controller
{
    // Load view/Загрузка отображения (вида)
    public function view($view, $data = [])
    {
        // Check for view file/Проверяем, есть ли файл отображения (вида)
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            redirect('');
        }
    }
}
