<?php
    // Load Config/Загрузка файла конфигурации
    require_once 'config/config.php';

    // Load Helpers
    require_once 'helpers/helper.php';
    require_once 'helpers/pagination.php';

    // Autoload Core Libraries/Автозагрузка основных библиотек
    spl_autoload_register(function ($className) {
        require_once 'libraries/' . $className . '.php';
    });
