<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{

    public function feed()
    {

    }

    public function sitemap()
    {
        return app('Wex\Sitemap\Builder')->render();
    }

}
