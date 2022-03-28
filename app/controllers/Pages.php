<?php

namespace dnarna;

class Pages extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    public function index()
    {
        redirect('');
    }

    public function lesson($id = 1)
    {
        if (empty($id)) {
            redirect('');
        }
        $page = $this->pageModel->getPageById($id);

        $data = ['page' => $page];

        $this->view('pages/lesson', $data);
    }

    public function test()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form/Обрабатываем форму

            //Sanitize POST data/Санируем Post-данные
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data/Инициализируем данные

            $data = [
                'value1' => $_POST['value1'],
                'value2' => trim($_POST['value2']),
                'value3' => trim($_POST['value3']),
                'value4' => trim($_POST['value4']),
                'value5' => trim($_POST['value5']),
                'value6' => trim($_POST['value6'])
            ];
            $this->view('pages/test', $data);
        } else {
            $data = [
                'value1' => '',
                'value2' => '',
                'value3' => '',
                'value4' => '',
                'value5' => '',
                'value6' => ''
            ];
            $this->view('pages/test', $data);
        }
    }
}
