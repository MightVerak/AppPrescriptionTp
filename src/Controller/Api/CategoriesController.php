<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class CategoriesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $categories = $this->Categories->find('all');
        $this->set([
            'categories' => $categories,
            '_serialize' => ['categories']
        ]);
    }

    public function view($id)
    {
        $categorie = $this->Categories->get($id);
        $this->set([
            'categorie' => $categorie,
            '_serialize' => ['categorie']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $categorie = $this->Categories->newEntity($this->request->getData());
        if ($this->Categories->save($categorie)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'categorie' => $categorie,
            '_serialize' => ['message', 'categorie']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $categorie = $this->Categories->get($id);
        $categorie = $this->Categories->patchEntity($categorie, $this->request->getData());
        if ($this->Categories->save($categorie)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $recipe = $this->Categories->get($id);
        $message = 'Deleted';
        if (!$this->Categories->delete($recipe)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}