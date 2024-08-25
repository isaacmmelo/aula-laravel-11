<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    # Implementa função que retorna a View Index
    public function index() {
        return view('admin.articles.index');
    }

    # Implementa função que retorna a View Create
    public function create() {

    }

    # Implementa função que salva os dados
    public function store(Request $request) {

    }
}
