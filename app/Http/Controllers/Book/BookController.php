<?php

namespace App\Http\Controllers\Book;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Service\BooksService;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    use ApiResponse;
    public $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( BooksService $booksService)
    {
        $this->booksService = $booksService;
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
