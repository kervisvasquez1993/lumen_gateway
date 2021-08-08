<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class BookController extends Controller
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
    public function show($book)
    {}
    public function store(Request $request)
    {}
    public function update(Request $request, $book)
    {}
    public function destroy($book)
    {}

}
