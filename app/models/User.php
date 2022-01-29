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
        $this->db->query('UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id');

        // Bind values/Привязка значений
        $this->db->bind(':id', $data['id']);
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
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

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
