<?php

namespace App\Controllers;

use App\Models\AnnouncementsModel;

class Home extends BaseController
{
    protected $announcementsModel;

    public function __construct()
    {
        $this->announcementsModel = new AnnouncementsModel();
    }

    public function index(): string
    {
        return view('index');
    }
}
