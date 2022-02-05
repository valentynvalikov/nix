<?php class Pages extends Controller
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
}
