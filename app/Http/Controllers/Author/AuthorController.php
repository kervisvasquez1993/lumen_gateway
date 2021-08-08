<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class AuthorController extends Controller
{
    
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {}
    public function show($author)
    {}
    public function store(Request $request)
    {}
    public function update(Request $request, $author)
    {}
    public function destroy($author)
    {}

    //
}
