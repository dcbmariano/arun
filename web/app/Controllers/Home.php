<?php

namespace App\Controllers;
use App\Models\ProteinsModel;

class Home extends BaseController
{
    public function index()
    {
        $proteinsModel = new ProteinsModel();
        $dados['proteins'] = $proteinsModel->findAll();

        return view('home', $dados);
    }
}
