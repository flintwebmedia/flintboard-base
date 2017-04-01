<?php

namespace FlintWebmedia\FlintboardBase\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use FlintWebmedia\FlintboardBase\app\Http\Requests\PageRequest as StoreRequest;
use FlintWebmedia\FlintboardBase\app\Http\Requests\PageRequest as UpdateRequest;

class PageCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("FlintWebmedia\FlintboardBase\app\Models\Page");
        $this->crud->setRoute("admin/page");
        $this->crud->setEntityNameStrings('page', 'pages');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
