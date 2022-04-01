<?php

namespace dnarna;

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
        $model = NS . $model;                                            // adding namespace/добавляем пространство имён
        return new $model();
    }

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

//    // Load pagination/Загрузка пагинации
//    public function pagination()
//    {
//        // Check for view file/Проверяем, есть ли файл отображения (вида)
//        if (file_exists('../app/helpers/pagination.php')) {
//            require_once '../app/helpers/pagination.php';
//            //$pagination = new \dnarna\Pagination($page, 5, $data['count']['COUNT(*)']);
//        } else {
//            redirect('');
//        }
//    }
}
