<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/old', 'Home::indexOld');
$routes->get('documents', 'DocumentController::index');
$routes->get('documents/fetch', 'DocumentController::fetchDocuments');
$routes->get('documents/fetchcpns', 'DocumentController::fetchCpnsDocuments');
$routes->get('documents/fetchpppk', 'DocumentController::fetchPppkDocuments');
$routes->get('announcements', 'AnnouncementsController::index');
$routes->get('announcements/fetch', 'AnnouncementsController::fetchAnnouncements');
$routes->get('announcements/fetchcpns', 'AnnouncementsController::fetchCpnsAnnouncements');
$routes->get('announcements/fetchpppk', 'AnnouncementsController::fetchPppkAnnouncements');
$routes->get('faq/fetch', 'FaqController::fetchFaq');
