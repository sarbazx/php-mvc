<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add(
  'homepage', 
  new Route(constant('URL_SUBFOLDER') . '/{page}', 
    [
      'controller' => 'PageController',
      'method'     => 'index',
      'page'       => 0,
    ], 
    ['page' => '[0-9]+'],
  )
);
$routes->add(
  'task', 
  new Route(
    constant('URL_SUBFOLDER') . '/task/{id}', 
    [
      'controller' => 'TaskController',
      'method'     => 'show',
    ],
    ['id' => '[0-9]+'],
  )
);
$routes->add(
  'task_edit', 
  new Route(
    constant('URL_SUBFOLDER') . '/task/{id}/edit', 
    [
      'controller' => 'TaskController',
      'method'     => 'edit',
    ],
    ['id' => '[0-9]+'],
  )
);
$routes->add(
  'task_update', 
  new Route(
    constant('URL_SUBFOLDER') . '/task/{id}/update', 
    [
      'controller' => 'TaskController',
      'method'     => 'update',
    ],
    ['id' => '[0-9]+'],
    [],
    '',
    [], 
    ['POST', 'GET']
  )
);
$routes->add(
  'task_create', 
  new Route(
    constant('URL_SUBFOLDER') . '/task/create', 
    [
      'controller' => 'TaskController',
      'method'     => 'create',
    ],
    [],
    [],
    '',
    [], 
    ['POST', 'GET']
  )
);
$routes->add(
  'task_add', 
  new Route(
    constant('URL_SUBFOLDER') . '/task/add', 
    [
      'controller' => 'TaskController',
      'method'     => 'add',
    ],
  )
);
