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

            if (!empty($_FILES['avatar']['name'])) {
                $data = [
                    'id' => $_SESSION['user_id'],
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'avatar' => $_SESSION['user_name'] . '_avatar_' . $_FILES['avatar']['name'],
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'avatar_err' => ''
                ];
            } else {
                $data = [
                    'id' => $_SESSION['user_id'],
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'avatar' => $_SESSION['user_avatar'],
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'avatar_err' => ''
                ];
            }

            // Validate username/Проверяем имя пользователя
            if (empty($data['username'])) {
                $data['username'] = $_SESSION['user_name'];
                //$data['username_err'] = 'Please enter username';
            } elseif ($_SESSION['user_name'] == $data['username']) {
            } elseif ($this->userModel->findUserByName($data['username'])) {
                $data['username_err'] = 'Username is already taken';
            } elseif (preg_match('/[^A-Za-z0-9]/', $data['username'])) {
                $data['username_err']  = "Username should contain letters and/or numbers.";
            }

            // Validate email/Проверяем email
            if (empty($data['email'])) {
                $data['email'] = $_SESSION['user_email'];
               //$data['email_err'] = 'Please enter email';
            } elseif ($_SESSION['user_email'] == $data['email']) {
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            // Validate password/Проверяем пароль
            if (empty($data['password'])) {
                //$data['password_err'] = 'Please enter new password';
            } elseif (strlen($data['password']) < 8 || !preg_match('/[A-Z]/', $data['password']) ||
                !preg_match('/[a-z]/', $data['password']) || !preg_match('/[0-9]/', $data['password']) ||
                !preg_match('/[^A-Za-z0-9\s]/', $data['password'])) {
                $data['password_err'] = 'Password must be 8 characters or longer and contain at least 1 UPPERCASE letter
                , 1 lowercase letter, 1 digit, and 1 symbol!';
            }

            // Validate confirm password/Проверяем подтверждение пароля
            if (empty($data['confirm_password'])) {
                //$data['confirm_password_err'] = 'Please confirm new password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match!';
            }

            // Validate avatar/Проверяем аватар

            // get an array by dividing filename into parts/разбиваем имя файла по точке и получаем массив
            $getMime = explode('.', $_FILES['avatar']['name']);
            // last array element - extension/последний элемент массива - расширение
            $mime = strtolower(end($getMime));
            // declare array of possible file extensions/объявляем массив допустимых расширений
            $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

            if (empty($_FILES['avatar']['name'])) {
                //$data['avatar_err'] = 'Please upload avatar';
            } elseif ($_FILES['avatar']['size'] == 0) {
                $data['avatar_err'] = 'File is too big';
            } elseif (!in_array($mime, $types)) {
                $data['avatar_err'] = 'Wrong file type';
            } elseif (!empty($_FILES['avatar']['name'])) {
                copy($_FILES['avatar']['tmp_name'], 'img/' . $data['avatar']);
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err'])
                && empty($data['confirm_password_err']) && empty($data['avatar_err'])) {
                // Validated/Валидировано

                // Hash password/Хэширование пароля
                if (!empty($data['password'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                }

                // Profile update/Обновление профиля

                if ((($_SESSION['user_name'] == $data['username']) || empty($data['username'])) &&
                    (($_SESSION['user_email'] == $data['email']) || empty($data['email'])) &&
                    ((empty($data['password'])) || (!empty($data['password'])) && (empty($data['confirm_password'])) &&
                    ($data['confirm_password_err'] = 'Please confirm new password')) &&
                    (empty($_FILES['avatar']['name']))) {
                    flash('success', 'No edits!');
                    $this->view('users/profile', $data);
                } elseif ($this->userModel->profile($data)) {
                    $_SESSION['user_name'] = $data['username'];
                    $_SESSION['user_email'] = $data['email'];
                    $_SESSION['user_avatar'] = $data['avatar'];
                    flash('success', 'Your profile info was changed!');
                    redirect('users/profile');
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
                'avatar' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'avatar_err' => ''
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
            } elseif (preg_match('/[^A-Za-z0-9]/', $data['username'])) {
                $data['username_err']  = "Username should contain letters and/or numbers.";
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
            } elseif (strlen($data['password']) < 8 || !preg_match('/[A-Z]/', $data['password']) ||
                !preg_match('/[a-z]/', $data['password']) || !preg_match('/[0-9]/', $data['password']) ||
                !preg_match('/[^A-Za-z0-9\s]/', $data['password'])) {
                $data['password_err'] = 'Password must be 8 characters or longer and contain at least 1 UPPERCASE letter
                , 1 lowercase letter, 1 digit, and 1 symbol!';
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
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];

            // Validate email/Проверяем email
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            // Check for user/email // Проверяем имя пользователя/email
            if ($this->userModel->findUserByName($data['username'])) {
                // User found/Пользователь найден
            } else {
                $data['username_err'] = 'No user found';
            }

            // Validate password/Проверяем пароль
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 8) {
                $data['password_err'] = 'Password must be at least 8 characters long!';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['username_err']) && empty($data['password_err'])) {
                // Validated/Валидировано
                // Check and set logged in user/Проверяем и задаём залогинившегося пользователя
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    // Create session/Создаём сессию
                    $this->createUserSession($loggedInUser);
                    flash('success', 'You are successfully logged in');
                    redirect('');
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
        $_SESSION['user_avatar'] = $user->avatar;
        redirect('');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_avatar']);
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
