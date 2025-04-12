<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class BaseResourcePresenter extends ResourcePresenter
{
    /**
     * @var \CodeIgniter\Model|null The model that holding this resource's data
     */
    protected $model;

    /**
     * @var string|null Path where the crud view folder is stored
     */
    protected $viewPath = '';

    /**
     * @var string|null Title for the view
     */
    protected $viewTitle = '';

    /**
     * @var string|null The name of the variable that will be used to return data from the controller
     */
    protected $dataName = 'data';

    /**
     * @var string|null Route name for routing and security implementation
     */
    protected $routeName = '';

    /**
     * @var \CodeIgniter\Model|null Custom queries to retrieve data with relations
     */
    protected $query;

    /**
     * @var list<string,string>|null Alias for the joined columns
     */
    protected $columnAliases = [];

    /**
     * @var list<string,object|list>|null Additional data for the views
     */
    protected $resources = [];

    /**
     * @var string|null Name of the sheet to import
     */
    protected $sheetNameImport = '';

    /**
     * @var list<string,object|list>|null Mapping properties for data import
     */
    protected $mappingProperties = [];

    /**
     * Constructor.
     *
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->viewPath  = rtrim($this->viewPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Present a view of resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function index()
    {
        return view($this->viewPath . 'index', [
            'viewTitle'       => $this->viewTitle,
            'routeName'       => $this->routeName,
            $this->dataName   => $this->model->findAll(),
        ]);
    }

    /**
     * Present a view of deleted resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function trash() {}

    /**
     * Present a view to present a specific resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function show($id = null) {}

    /**
     * Present a view to present a new single resource object
     *
     * @return ResponseInterface|string|void
     */
    public function new() {}

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return ResponseInterface|string|void
     */
    public function create() {}

    /**
     * Present a view of importing resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function import() {}

    /**
     * Process of importing data from document
     *
     * @return ResponseInterface|string|void
     */
    public function importProcess() {}

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function edit($id = null) {}

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function update($id = null) {}

    /**
     * Process the deletion of a specific resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function delete($id = null) {}

    /**
     * Process the deletion of all resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function deletes() {}

    /**
     * Process the permanent deletion of a specific resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function purgeDelete($id = null) {}

    /**
     * Process the permanent deletion of all resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function purgeDeletes() {}

    /**
     * Process the restore of a specific resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function restore($id = null) {}

    /**
     * Process the restore of all resource objects
     *
     * @return ResponseInterface|string|void
     */
    public function restores() {}
}
