<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Profile update/Обновление профиля
    public function profile($data)
    {
        $sql = 'UPDATE users SET ';
        if (!empty($data['username'])) {
            $sql .= 'username = :username';
        }
        if (!empty($data['email'])) {
            $sql .= ', email = :email';
        }
        if (!empty($data['password'])) {
            $sql .= ', password = :password';
        }
        if (!empty($data['avatar'])) {
            $sql .= ', avatar = :avatar';
        }
        $sql .= ' WHERE id = :id';

        $this->db->query($sql);

        // Bind values/Привязка значений
        $this->db->bind(':id', $data['id']);
        if (!empty($data['username'])) {
            $this->db->bind(':username', $data['username']);
        }
        if (!empty($data['email'])) {
            $this->db->bind(':email', $data['email']);
        }
        if (!empty($data['password'])) {
            $this->db->bind(':password', $data['password']);
        }
        if (!empty($data['avatar'])) {
            $this->db->bind(':avatar', $data['avatar']);
        }

        // Execute/Выполнение
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Register user/Регистрация пользователя
    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        // Bind values/Привязка значений
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute/Выполнение
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user/Авторизация пользователя
    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email/Находим пользователя по email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // Bind value/Привязка значения
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row/Проверяем строку
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by username/Находим пользователя по нику
    public function findUserByName($username)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        // Bind value/Привязка значения
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check row/Проверяем строку
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
