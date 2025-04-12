<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Controllers\BaseResourcePresenter;

class BooksController extends BaseResourcePresenter
{
  /**
   * @var string|null The model that holding this resource's data
   */
  protected $modelName = 'App\Models\BookModel';

  /**
   * @var string|null Path where the crud view folder is stored
   */
  protected $viewPath = 'pages/admin/books';

  /**
   * @var string|null Title for the view
   */
  protected $viewTitle = 'Buku';

  /**
   * @var string|null The name of the variable that will be used to return data from the controller
   */
  protected $dataName = 'data';

  /**
   * @var string|null Route name for routing and security implementation
   */
  protected $routeName = 'books';

  /**
   * @var \CodeIgniter\Model|null Custom queries to retrieve data with relations
   */
  protected $query;

  /**
   * @var list<string,string>|null The alias name for the join result column
   */
  protected $columnAliases = [];

  /**
   * @var list<string,object|list>|null Additional data for new or edit views
   */
  protected $resources = [];

  /**
   * Constructor.
   *
   * @return void
   */
  public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->query = $this->model;
  }
}
