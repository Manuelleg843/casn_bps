<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DocumentsModel;

class DocumentController extends BaseController
{
    protected $documentModel;

    public function __construct()
    {
        $this->documentModel = new DocumentsModel();
    }

    public function index()
    {
        //
        return view('documents/view');
    }

    public function fetchDocuments()
    {
        $documents = $this->documentModel->getDocuments();

        return $this->response->setJSON($documents);
    }

    public function fetchCpnsDocuments()
    {
        $documents = $this->documentModel->getDocuments('CPNS');

        return $this->response->setJSON($documents);
    }

    public function fetchPppkDocuments()
    {
        $documents = $this->documentModel->getDocuments('PPPK');

        return $this->response->setJSON($documents);
    }
}
