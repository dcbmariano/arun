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

    public function about()
    {
        return view('about');
    }

    public function download()
    {
        return view('download');
    }
}
