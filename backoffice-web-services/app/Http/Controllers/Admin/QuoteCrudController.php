<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuoteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class QuoteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Quote::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/quote');
        CRUD::setEntityNameStrings('devis', 'devis');
    }

    protected function setupListOperation()
    {
        CRUD::column('nom')->label('Nom');
        CRUD::column('email')->label('Email');
        CRUD::column('message')->label('Message')->limit(50);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Statut',
            'type' => 'select_from_array',
            'options' => [
                'en_attente' => 'En attente',
                'valide' => 'Validé',
                'refuse' => 'Refusé'
            ]
        ]);
        CRUD::column('created_at')->label('Créé le');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(QuoteRequest::class);
        
        CRUD::field('nom')->label('Nom')->type('text');
        CRUD::field('email')->label('Email')->type('email');
        CRUD::field('message')->label('Message')->type('textarea');
        CRUD::addField([
            'name' => 'status',
            'label' => 'Statut',
            'type' => 'select_from_array',
            'options' => [
                'en_attente' => 'En attente',
                'valide' => 'Validé',
                'refuse' => 'Refusé'
            ],
            'default' => 'en_attente'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}