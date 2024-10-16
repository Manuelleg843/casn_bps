<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnnouncementsModel;
use App\Models\DocumentsModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Expr\Isset_;

class AnnouncementsController extends BaseController
{
    protected $announcementsModel;
    protected $documentModel;

    public function __construct()
    {
        $this->announcementsModel = new AnnouncementsModel();
        $this->documentModel = new DocumentsModel();
    }

    public function index()
    {
        //
        return view('admin/index');
    }

    public function create_announcement()
    {
        //
        return view('announcements/create');
    }
    public function update_announcement($id)
    {
        //
        $announcements = $this->announcementsModel->find($id);
        $document = $this->documentModel->where('announcement_id', $id)->first();
        $lampiran = $this->documentModel->where('announcement_id', $id)->findAll();
        $data = [
            'validation' => \Config\Services::validation(),
            'announcement' => $announcements,
            'document' => $document,
            'lampiran' => array_slice($lampiran, 1),
        ];
        // dd($data);
        return view('announcements/update', $data);
    }

    public function create()
    {
        $validationRules = [
            'title' => 'required',
            'content' => 'required',
            'document' => 'uploaded[document]|max_size[document,5120]|ext_in[document,pdf]',
            'file_lampiran.*' => 'permit_empty|max_size[file_lampiran.*,5120]|ext_in[file_lampiran.*,pdf]',
            'publish_date' => 'required',
            'category' => 'required',
            'is_active' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('form_data', $this->request->getPost());
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $form_data = $this->request->getPost();
        $uploaded_file = $this->request->getFile('document');
        if ($this->request->getFileMultiple('file_lampiran')) {
            $uploaded_file_lampiran = $this->request->getFileMultiple('file_lampiran');
        }

        $announcement_data = [
            'title' => $form_data['title'],
            'content' => $form_data['content'],
            'publish_date' => $form_data['publish_date'],
            'category' => $form_data['category'],
        ];

        if ($uploaded_file->isValid() && !$uploaded_file->hasMoved()) {
            $uploaded_file_name = str_replace(' ', '_', $uploaded_file->getName());
            $uploaded_file_name = preg_replace('/[^A-Za-z0-9\-\.]/', '', $uploaded_file_name);
            if ($announcement_data['category'] === 'CPNS') {
                $uploaded_file->move('assets/docs/', $uploaded_file_name);
            } else {
                $uploaded_file->move('assets/docs/pppk/', $uploaded_file_name);
            }
        }

        $announcement_data_id = $this->announcementsModel->insert($announcement_data);

        $dokumen_data = [
            'title' => $announcement_data['title'],
            'file_path' => $uploaded_file_name,
            'publish_date' => $announcement_data['publish_date'],
            'document_type' => $uploaded_file->getClientMimeType(),
            'announcement_id' => $announcement_data_id,
        ];

        $this->documentModel->insert($dokumen_data);

        if (isset($uploaded_file_lampiran)) {
            foreach ($uploaded_file_lampiran as $file_lampiran) {
                if ($file_lampiran->isValid() && !$file_lampiran->hasMoved()) {
                    $file_lampiran_name = str_replace(' ', '_', $file_lampiran->getName());
                    $file_lampiran_name = preg_replace('/[^A-Za-z0-9\-\.]/', '', $file_lampiran_name);
                    if ($announcement_data['category'] === 'CPNS') {
                        $file_lampiran->move('assets/docs/', $file_lampiran_name);
                    } else {
                        $file_lampiran->move('assets/docs/pppk/', $file_lampiran_name);
                    }

                    $dokumen_data = [
                        'title' => $file_lampiran->getName(),
                        'file_path' => $file_lampiran_name,
                        'publish_date' => $announcement_data['publish_date'],
                        'document_type' => $file_lampiran->getClientMimeType(),
                        'announcement_id' => $announcement_data_id,
                    ];

                    $this->documentModel->insert($dokumen_data);
                }
            }
        }

        return redirect()->to('/admin')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function update($id)
    {
        $validationRules = [
            'title' => 'required',
            'content' => 'required',
            'document' => 'max_size[document,5120]|ext_in[document,pdf]',
            'file_lampiran.*' => 'permit_empty|max_size[file_lampiran.*,5120]|ext_in[file_lampiran.*,pdf]',
            'publish_date' => 'required',
            'category' => 'required',
            'is_active' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('form_data', $this->request->getPost());
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $form_data = $this->request->getPost();
        if ($this->request->getFile('document')) {
            $uploaded_file = $this->request->getFile('document');
        }
        if ($this->request->getFileMultiple('file_lampiran')) {
            $uploaded_file_lampiran = $this->request->getFileMultiple('file_lampiran');
        }

        $announcement_data = [
            'title' => $form_data['title'],
            'content' => $form_data['content'],
            'publish_date' => $form_data['publish_date'],
            'category' => $form_data['category'],
            'is_active' => $form_data['is_active'],
        ];

        if ($uploaded_file->isValid() && !$uploaded_file->hasMoved()) {

            $uploaded_file_name = str_replace(' ', '_', $uploaded_file->getName());
            $uploaded_file_name = preg_replace('/[^A-Za-z0-9\-\.]/', '', $uploaded_file_name);
            if ($announcement_data['category'] === 'CPNS') {
                $uploaded_file_file_path = 'assets/docs/' . $this->documentModel->where('announcement_id', $id)->first()['file_path'];
                if (file_exists($uploaded_file_file_path)) {
                    unlink($uploaded_file_file_path);
                }
                $uploaded_file->move('assets/docs/', $uploaded_file_name);
            } else {
                $uploaded_file_file_path = 'assets/docs/pppk/' . $this->documentModel->where('announcement_id', $id)->first()['file_path'];
                if (file_exists($uploaded_file_file_path)) {
                    unlink($uploaded_file_file_path);
                }
                $uploaded_file->move('assets/docs/pppk/', $uploaded_file_name);
            }

            $dokumen_data = [
                'title' => $announcement_data['title'],
                'file_path' => $uploaded_file_name,
                'publish_date' => $announcement_data['publish_date'],
                'document_type' => $uploaded_file->getClientMimeType(),
                'announcement_id' => $id,
            ];

            $this->documentModel
                ->where('announcement_id', $id)
                ->orderBy('id', 'asc')
                ->limit(1)
                ->set($dokumen_data)
                ->update();
        }

        $this->announcementsModel->update($id, $announcement_data);


        if (isset($uploaded_file_lampiran)) {
            $file_lampiran_old = $this->documentModel->where('announcement_id', $id)->findAll();

            if (count($file_lampiran_old) > 1) {
                $idsToDelete = array_column(array_slice($file_lampiran_old, 1), 'id');

                foreach ($idsToDelete as $idToDelete) {
                    if ($announcement_data['category'] === 'CPNS') {
                        $file_lampiran_file_path = 'assets/docs/' . $this->documentModel->find($idToDelete)['file_path'];
                    } else {
                        $file_lampiran_file_path = 'assets/docs/pppk/' . $this->documentModel->find($idToDelete)['file_path'];
                    }

                    if (file_exists($file_lampiran_file_path)) {
                        unlink($file_lampiran_file_path);
                    }

                    $this->documentModel->delete($idToDelete);
                }
            }

            foreach ($uploaded_file_lampiran as $file_lampiran) {
                if ($file_lampiran->isValid() && !$file_lampiran->hasMoved()) {
                    $file_lampiran_name = str_replace(' ', '_', $file_lampiran->getName());
                    $file_lampiran_name = preg_replace('/[^A-Za-z0-9\-\.]/', '', $file_lampiran_name);
                    if ($announcement_data['category'] === 'CPNS') {
                        $file_lampiran->move('assets/docs/', $file_lampiran_name);
                    } else {
                        $file_lampiran->move('assets/docs/pppk/', $file_lampiran_name);
                    }

                    $dokumen_data = [
                        'title' => $file_lampiran->getName(),
                        'file_path' => $file_lampiran_name,
                        'publish_date' => $announcement_data['publish_date'],
                        'document_type' => $file_lampiran->getClientMimeType(),
                        'announcement_id' => $id,
                    ];

                    $this->documentModel->insert($dokumen_data);
                }
            }
        }

        return redirect()->to('/admin')->with('success', 'Pengumuman berhasil diubah.');
    }

    public function delete($id)
    {
        $announcement = $this->announcementsModel->find($id);
        $document = $this->documentModel->where('announcement_id', $id)->first();
        $lampiran = $this->documentModel->where('announcement_id', $id)->findAll();

        if ($announcement['category'] === 'CPNS') {
            $file_path = 'assets/docs/' . $document['file_path'];
        } else {
            $file_path = 'assets/docs/pppk/' . $document['file_path'];
        }

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (count($lampiran) > 1) {
            $idsToDelete = array_column(array_slice($lampiran, 1), 'id');

            foreach ($idsToDelete as $idToDelete) {
                if ($announcement['category'] === 'CPNS') {
                    $file_lampiran_file_path = 'assets/docs/' . $this->documentModel->find($idToDelete)['file_path'];
                } else {
                    $file_lampiran_file_path = 'assets/docs/pppk/' . $this->documentModel->find($idToDelete)['file_path'];
                }

                if (file_exists($file_lampiran_file_path)) {
                    unlink($file_lampiran_file_path);
                }

                $this->documentModel->delete($idToDelete);
            }
        }

        $this->documentModel->delete($document['id']);

        $this->announcementsModel->delete($id);

        return redirect()->to('/admin')->with('success', 'Pengumuman berhasil dihapus.');
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

    public function fetchAllCpnsAnnouncements()
    {
        $announcements = $this->announcementsModel->getAllAnnouncements('CPNS');

        return $this->response->setJSON($announcements);
    }

    public function fetchAllPppkAnnouncements()
    {
        $announcements = $this->announcementsModel->getAllAnnouncements('PPPK');

        return $this->response->setJSON($announcements);
    }
}
