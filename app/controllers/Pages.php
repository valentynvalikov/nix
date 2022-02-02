<?php class Pages extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    public function lesson($id)
    {
        $page = $this->pageModel->getPageById($id);

        $data = ['page' => $page];

        $this->view('pages/lesson', $data);
    }
}
