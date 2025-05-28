<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Project::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/project');
        CRUD::setEntityNameStrings('réalisation', 'réalisations');
    }

    protected function setupListOperation()
    {
        CRUD::column('titre')->label('Titre');
        CRUD::column('description')->label('Description')->limit(50);
        
        CRUD::addColumn([
            'name' => 'logo',
            'label' => 'Logo',
            'type' => 'image',
            'disk' => 'public',
            'height' => '50px',
            'width' => '50px'
        ]);
        
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'disk' => 'public',
            'height' => '50px',
            'width' => '50px'
        ]);
        
        CRUD::column('lien_page_html')->label('Page HTML');
        CRUD::column('lien')->label('Lien')->type('url');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProjectRequest::class);
        
        CRUD::field('titre')->label('Titre')->type('text');
        CRUD::field('description')->label('Description')->type('textarea');
        
        CRUD::addField([
            'name' => 'logo',
            'label' => 'Logo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'projects'
        ]);
        
        CRUD::addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'projects'
        ]);
        
        // Changé de 'url' à 'text' pour accepter un simple string
        CRUD::field('lien_page_html')
             ->label('Page HTML')
             ->type('text')
             ->hint('Nom de la page HTML (ex: mon-projet, accueil, etc.)');
             
        CRUD::field('lien')->label('Lien URL')->type('url');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}