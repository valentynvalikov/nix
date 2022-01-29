<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function profile()
    {
        // Check for POST/Проверка POST-запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            //Sanitize POST data/Санируем Post-данные
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные
            $data = [
                'id' => $_SESSION['user_id'],
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate username/Проверяем имя пользователя
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            } elseif ($_SESSION['user_name'] == $data['username']) {
            } elseif ($this->userModel->findUserByName($data['username'])) {
                $data['username_err'] = 'Username is already taken';
            }

            // Validate email/Проверяем email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif ($_SESSION['user_email'] == $data['email']) {
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            // Validate password/Проверяем пароль
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters long!';
            }

            // Validate confirm password/Проверяем подтверждение пароля
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match!';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['username_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated/Валидировано

                // Hash password/Хэширование пароля
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Profile update/Обновление профиля
                if ($this->userModel->profile($data)) {
                    flash('success', 'Your profile info was changed');
                    $this->login();
                } else {
                    die('Something wrong!');
                }
            } else {
                // Load view with errors/Загружаем вид с ошибками
                $this->view('users/profile', $data);
            }
        } else {
            // Init data/Инициализируем данные
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view/Загружаем представление (вид)
            $this->view('users/profile', $data);
        }
    }

    public function register()
    {
        // Check for POST/Проверка POST-запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            //Sanitize POST data/Санируем Post-данные
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate username/Проверяем имя пользователя
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            } elseif ($this->userModel->findUserByName($data['username'])) {
                $data['username_err'] = 'Username is already taken';
            }

            // Validate email/Проверяем email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            // Validate password/Проверяем пароль
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters long!';
            }

            // Validate confirm password/Проверяем подтверждение пароля
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match!';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['username_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated/Валидировано

                // Hash password/Хэширование пароля
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user/Регистрация пользователя
                if ($this->userModel->register($data)) {
                    flash('success', 'You are successfully registered');
                    $this->login();
                } else {
                    die('Something wrong!');
                }
            } else {
                // Load view with errors/Загружаем вид с ошибками
                $this->view('users/register', $data);
            }
        } else {
            // Init data/Инициализируем данные
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view/Загружаем представление (вид)
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST/Проверка POST-запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            //Sanitize POST data/Санируем Post-данные
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate email/Проверяем email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Check for user/email // Проверяем имя пользователя/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found/Пользователь найден
            } else {
                $data['email_err'] = 'No user found';
            }

            // Validate password/Проверяем пароль
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters long!';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated/Валидировано
                // Check and set logged in user/Проверяем и задаём залогинившегося пользователя
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create session/Создаём сессию
                    $this->createUserSession($loggedInUser);
                    flash('success', 'You are successfully logged in');
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors/Загружаем вид с ошибками
                $this->view('users/login', $data);
            }
        } else {
            // Init data/Инициализируем данные
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // Load view/Загружаем представление (вид)
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        redirect('');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
