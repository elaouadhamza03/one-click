<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Setting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/setting');
        CRUD::setEntityNameStrings('paramètre', 'paramètres');
    }

    protected function setupListOperation()
    {
        CRUD::column('email_contact')->label('Email de contact');
        CRUD::column('telephone')->label('Téléphone');
        CRUD::column('adresse')->label('Adresse')->limit(50);
        
        CRUD::addColumn([
            'name' => 'logo_blanc',
            'label' => 'Logo blanc',
            'type' => 'image',
            'disk' => 'public',
            'height' => '50px',
            'width' => '50px'
        ]);
        
        CRUD::addColumn([
            'name' => 'logo_noir',
            'label' => 'Logo noir',
            'type' => 'image',
            'disk' => 'public',
            'height' => '50px',
            'width' => '50px'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingRequest::class);
        
        CRUD::field('email_contact')->label('Email de contact')->type('email');
        CRUD::field('adresse')->label('Adresse')->type('textarea');
        CRUD::field('telephone')->label('Téléphone')->type('text');
        CRUD::field('localisation')->label('Localisation')->type('text');
        CRUD::field('description')->label('Description')->type('textarea');
        
        CRUD::addField([
            'name' => 'logo_blanc',
            'label' => 'Logo blanc',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'settings'
        ]);
        
        CRUD::addField([
            'name' => 'logo_noir',
            'label' => 'Logo noir',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'destination_path' => 'settings'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}