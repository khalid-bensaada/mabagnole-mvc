<?php
require_once 'BaseController.php';
require_once 'model/Categorie.php';

class CategoriesController extends BaseController
{
    public function listAction($pdo)
    {
        $categories = Categorie::getAll($pdo);

        $this->render('categories/list', [
            'categories' => $categories
        ]);
    }
}
