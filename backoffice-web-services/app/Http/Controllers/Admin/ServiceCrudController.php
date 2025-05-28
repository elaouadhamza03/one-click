<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
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
            'prefix' => 'services/',
            'height' => '50px', // Limiter la hauteur pour l'affichage
            'width' => '50px'   // Limiter la largeur pour l'affichage
        ]);
        
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'disk' => 'public',
            'prefix' => 'services/',
            'height' => '50px',
            'width' => '50px'
        ]);
        
        CRUD::column('nom_de_page_html')->label('Page HTML');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ServiceRequest::class);
        
        CRUD::field('titre')->label('Titre')->type('text')->attributes(['required' => true]);
        CRUD::field('description')->label('Description')->type('textarea')->attributes(['required' => true]);
        
        CRUD::addField([
            'name' => 'logo',
            'label' => 'Logo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'services',
            'crop' => true, // Permettre le recadrage
            'aspect_ratio' => 1, // Ratio carré pour les logos
            'hint' => 'Formats acceptés: JPG, PNG, GIF. Taille max: 2MB'
        ]);
        
        CRUD::addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'services',
            'crop' => true,
            'aspect_ratio' => 16/9, // Ratio 16:9 pour les images
            'hint' => 'Formats acceptés: JPG, PNG, GIF. Taille max: 2MB'
        ]);
        
        CRUD::field('nom_de_page_html')->label('Nom de page HTML')->type('text')->attributes(['required' => true]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}