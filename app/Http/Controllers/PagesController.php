<?php

namespace App\Http\Controllers;


use App\Repositories\TagRepositoryEloquent;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {

    }

    public function index(TagRepositoryEloquent $TagRepository)
    {

        $tags = $TagRepository->all();

        return view('pages.index', compact('tags'));
    }

    public function show()
    {

        return view('pages.show');
    }
}
