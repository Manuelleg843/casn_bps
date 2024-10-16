<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/old', 'Home::indexOld');
$routes->get('admin', 'AnnouncementsController::index');
$routes->get('create_announcement', 'AnnouncementsController::create_announcement');
$routes->post('create_announcement/create', 'AnnouncementsController::create');
$routes->get('update_announcement/(:num)', 'AnnouncementsController::update_announcement/$1');
$routes->post('update_announcement/update/(:num)', 'AnnouncementsController::update/$1');
$routes->delete('delete_announcement/(:num)', 'AnnouncementsController::delete/$1');
$routes->get('announcements', 'AnnouncementsController::index');
$routes->get('announcements/fetch', 'AnnouncementsController::fetchAnnouncements');
$routes->get('announcements/fetchcpns', 'AnnouncementsController::fetchCpnsAnnouncements');
$routes->get('announcements/fetchallcpns', 'AnnouncementsController::fetchAllCpnsAnnouncements');
$routes->get('announcements/fetchpppk', 'AnnouncementsController::fetchPppkAnnouncements');
$routes->get('announcements/fetchallpppk', 'AnnouncementsController::fetchAllPppkAnnouncements');
$routes->get('faq/fetch', 'FaqController::fetchFaq');
