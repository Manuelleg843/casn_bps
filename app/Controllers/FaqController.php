<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FaqModel;
use CodeIgniter\HTTP\ResponseInterface;

class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        //
    }

    public function fetchFaq()
    {
        $faq = $this->faqModel->getFaq();

        return $this->response->setJSON($faq);
    }
}
