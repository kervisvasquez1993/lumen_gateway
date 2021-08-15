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
    {
        
     return $this->successResponse($this->booksService->getBooks());
        
    }
    public function show($book)
    {}
    public function store(Request $request)
    {
       return $this->successResponse($this->booksService->createBook($request->all()));
    }
    public function update(Request $request, $book)
    {}
    public function destroy($book)
    {}

}
