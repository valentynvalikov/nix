<?php

namespace dnarna;

class Posts extends Controller
{
    private $postsPerPage = 5;

    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->pagination = new \dnarna\Pagination();
    }

    // Display all posts at home page/Отображение всех постов на главной странице
    public function index($pageNumber = 1)
    {
        $allPosts = count($this->postModel->getPosts());

        $pagination = $this->pagination->drawPager($allPosts, $this->postsPerPage);

        $pagePosts = $this->postModel->getPagePosts($pageNumber, $this->postsPerPage);

        $data = [
            'pagePosts' => $pagePosts,
            'pagination' => $pagination
        ];

        $this->view('posts/index', $data);
    }

    // Display single post/Отображение одного поста
    public function show($id = 1)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->findUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    // Create a post/Создаём пост
    public function add()
    {
        // If user is not logged in - redirect to login page
        // Если пользователь не авторизован - перенаправляем на страницу авторизации
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        // Check for POST/Проверка POST-запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            // Sanitize POST data/Санируем Post-данные
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'user_id' => trim($_SESSION['user_id']),
                'title_err' => '',
                'description_err' => ''
            ];

            // Validate title/Проверяем название поста
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            } elseif ($this->postModel->getPostByTitle($data['title'])) {
                $data['title_err'] = 'Post with this title already exists';
            }

            // Validate post content is not empty/Проверяем что контент поста присутствует
            if (empty($data['description'])) {
                $data['description_err'] = 'Please write something';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['title_err']) && empty($data['description_err'])) {
                // Validated/Валидировано

                // Creating a post/Создание поста
                if ($this->postModel->addPost($data)) {
                    flash('success', 'Post has been added');
                    redirect('');
                } else {
                    die('Something wrong!');
                }
            } else {
                // Load view with errors/Загружаем вид с ошибками
                $this->view('posts/add', $data);
            }
        } else {
            // Init data/Инициализируем данные
            $data = [
                'title' => '',
                'description' => '',
                'user_id' => '',
                'title_err' => '',
                'description_err' => ''
            ];

            // Load view/Загружаем представление (вид)
            $this->view('posts/add', $data);
        }
    }

    // Edit post/Редактирование поста
    public function edit($id = 1)
    {
        $post = $this->postModel->getPostById($id);

        if ($_SESSION['user_id'] != $post->user_id) {
            flash('success', 'You are not allowed to edit this post!');
            redirect('posts/show/' . $post->id);
        }

        // Check for POST/Проверка POST-запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            // Sanitize POST data/Санируем Post-данные
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные
            $data = [
                'post' => $post,
                'id' => $id,
                'user_id' => trim($_SESSION['user_id']),
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'title_err' => '',
                'description_err' => ''
            ];

            // Validate title/Проверяем название
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter post title';
            } elseif ($_POST['title'] == $post->title) {
            } elseif ($this->postModel->getPostByTitle($data['title'])) {
                $data['title_err'] = 'Post with this title already exists';
            }

            // Validate content/Проверяем контент поста
            if (empty($data['description'])) {
                $data['description_err'] = 'Please write something';
            }

            // Make sure that errors are empty/Убеждаемся, что ошибок нет
            if (empty($data['title_err']) && empty($data['description_err'])) {
                // Validated/Валидировано

                // Post update/Обновление поста
                if ($this->postModel->editPost($data)) {
                    flash('success', 'Post was updated!');
                    redirect('posts/show/' . $data['id']);
                } else {
                    die('Something wrong!');
                }
            } else {
                // Load view with errors/Загружаем вид с ошибками
                $this->view('posts/edit', $data);
            }
        } else {
            $data = ['post' => $post];

            // Load view/Загружаем представление (вид)
            $this->view('posts/edit', $data);
        }
    }

    // Delete post/Удаление поста
    public function delete($id = 1)
    {
        $post = $this->postModel->getPostById($id);
        if ($_SESSION['user_id'] == $post->user_id) {
            $this->postModel->deletePost($id);
            flash('success', 'Post deleted!');
            redirect('');
        } elseif ($_SESSION['user_id'] != $post->user_id) {
            flash('success', 'You are not allowed to delete this post!');
            redirect('posts/show/' . $post->id);
        } else {
            die('Something wrong!');
        }
    }
}
