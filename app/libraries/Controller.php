<?php
    /*
     * Base  Controller/Основной контроллер
     * Loads models and views/Загружает модели и отображения (виды)
     */

class Controller
{
    // Load model/Загрузка модели
    public function model($model)
    {
        // Require model file/Требуем файл модели
        require_once '../app/models/' . $model . '.php';

        // Instantiate model/Инстанцируем модель
        return new $model();
    }

    // Load view/Загрузка отображерния (вида)
    public function view($view, $data = [])
    {
        // Check for view file/Проверяем, есть ли файл отображения (вида)
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist/Файла отображения (вида) нету
            die('Не найден файл отображения!');
        }
    }
}