<?php

    // Load Config/Загрузка файла конфигурации
    require_once 'config/config.php';

    // Load Helpers
    require_once 'helpers/helpers.php';
    //require_once 'helpers/pagin.php';
    require_once 'helpers/pagination.php';

    // Autoload Core Libraries/Автозагрузка основных библиотек
    spl_autoload_register(function ($className) {
        require_once 'libraries/Controller.php';
        require_once 'libraries/Core.php';
        require_once 'libraries/Database.php';
    });
