<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnnouncementsModel;
use CodeIgniter\HTTP\ResponseInterface;

class AnnouncementsController extends BaseController
{
    protected $announcementsModel;

    public function __construct()
    {
        $this->announcementsModel = new AnnouncementsModel();
    }

    public function index()
    {
        //
    }

    public function fetchAnnouncements()
    {
        $announcements = $this->announcementsModel->getAnnouncements();

        return $this->response->setJSON($announcements);
    }

    public function fetchCpnsAnnouncements()
    {
        $announcements = $this->announcementsModel->getAnnouncements('CPNS');

        return $this->response->setJSON($announcements);
    }

    public function fetchPppkAnnouncements()
    {
        $announcements = $this->announcementsModel->getAnnouncements('PPPK');

        return $this->response->setJSON($announcements);
    }
}
