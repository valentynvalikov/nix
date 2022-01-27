<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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
}
