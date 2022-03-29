<?php

namespace dnarna;

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new \dnarna\Database();
    }

    public function count()
    {
        $this->db->query("SELECT COUNT(*) FROM posts");

        return $this->db->count();
    }

    // Get all posts/Получаем все посты
    public function getPosts($page)
    {
        $page = ($page - 1) * 5;
        $limit = 5;

        $this->db->query("SELECT *, posts.id as postId, users.id as userId,
                              posts.created_at as postCreated, users.created_at as userCreated FROM posts
                              INNER JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC
                              LIMIT $limit OFFSET $page");

        return $this->db->resultSet();
    }

    // Find post by id/Находим пост по id
    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Find post by title/Находим пост по названию
    public function getPostByTitle($title)
    {
        $this->db->query('SELECT * FROM posts WHERE title = :title');

        // Bind value/Привязка значения
        $this->db->bind(':title', $title);

        $row = $this->db->single();

        // Check row/Проверяем строку
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Create a post/Создаём пост
    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, description, user_id) VALUES(:title, :description, :user_id)');

        // Bind values/Привязка значений
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute/Выполнение
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Post update/Обновление поста
    public function editPost($data)
    {
        $sql = 'UPDATE posts SET ';
        if (!empty($data['title'])) {
            $sql .= 'title = :title';
        }
        if (!empty($data['description'])) {
            $sql .= ', description = :description';
        }
        $sql .= ' WHERE id = :id';

        $this->db->query($sql);

        // Bind values/Привязка значений
        $this->db->bind(':id', $data['id']);
        if (!empty($data['title'])) {
            $this->db->bind(':title', $data['title']);
        }
        if (!empty($data['description'])) {
            $this->db->bind(':description', $data['description']);
        }

        // Execute/Выполнение
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete post/Удаление поста
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');

        // Bind values/Привязка значений
        $this->db->bind(':id', $id);

        // Execute/Выполнение
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
