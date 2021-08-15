<?php

namespace App\Http\Controllers\Book;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Service\BooksService;
use App\Service\AuthorService;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    use ApiResponse;
    public $bookService;
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( BooksService $booksService, AuthorService $authorService)
    {
        
        $this->booksService = $booksService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        
     return $this->successResponse($this->booksService->getBooks());
        
    }
    public function show($book_id)
    {
        return $this->successResponse($this->booksService->getBook($book_id));
    }
    public function store(Request $request)
    {
        /* comprobar si existe un author para el libro */
        $this->successResponse($this->authorService->getAuthor($request->author_id));
       return $this->successResponse($this->booksService->createBook($request->all()));
    }
    public function update(Request $request, $book_id)
    {
        return $this->successResponse($this->booksService->editBook($request->all(), $book_id));
    }
    public function destroy($book_id)
    {
        return $this->successResponse($this->booksService->deleteBook($book_id));
    }

}
