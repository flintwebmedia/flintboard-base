<?php

namespace FlintWebmedia\FlintboardBase\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use FlintWebmedia\FlintboardBase\app\Http\Requests\PageEntityRequest as StoreRequest;
use FlintWebmedia\FlintboardBase\app\Http\Requests\PageEntityRequest as UpdateRequest;

class PageEntityCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("FlintWebmedia\FlintboardBase\app\Models\PageEntity");
        $this->crud->setRoute("admin/content");
        $this->crud->setEntityNameStrings('content', 'content');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->removeField('page_id', 'update');
        $this->crud->addField([
            'label' => "Pagina",
            'type' => 'select2',
            'name' => 'page_id', // the db column for the foreign key
            'entity' => 'page', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Page" // foreign key model
        ], 'create');

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
