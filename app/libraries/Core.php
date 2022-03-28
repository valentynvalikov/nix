<?php

namespace dnarna;

    /*
     * App Core Class/Основной класс приложения
     * Creates URL & loads core controller/Создаёт URL и загружает главный контроллер
     * URL FORMAT/ФОРМАТ URL - /controller/method/params
     */

error_reporting(E_ERROR | E_PARSE | E_NOTICE);

class Core
{
    protected $currentController = 'Posts';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Look in controllers for first value/Смотрим в контроллерах первое значение
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If exists, set as controller/Если файл есть, задаём как контроллер
            $this->currentController = ucwords($url[0]);
            // Unset 0 index/Убираем индекс 0 в массиве
            unset($url[0]);
        }

        // Require the controller/Требуем контроллер
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class/Инстанцируем класс контроллера
        $this->currentController = NS . $this->currentController;        // adding namespace/добавляем пространство имён
        $this->currentController = new $this->currentController();

        // Check for second part of URL/Проверка второй части URL
        if (isset($url[1])) {
            // Check to see if method exists in controller/Проверяем есть ли такой метод в контроллере
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index/Убираем индекс 1 в массиве
                unset($url[1]);
            } else {
                redirect('');
            }
        }

        // Get params/Получаем параметры
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params/Обратный вызов с массивом параметров
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
