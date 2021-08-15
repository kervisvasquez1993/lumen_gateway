<?php

namespace App\Http\Controllers\Author;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Service\AuthorService;
use App\Http\Controllers\Controller;


class AuthorController extends Controller
{
    
    use ApiResponse;
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
       return $this->successResponse($this->authorService->getAuthors());
    }
    public function show($author)
    {
        return $this->successResponse($this->authorService->getAuthor($author));
    }
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthors($request->all(), 201));

    }
    public function update(Request $request, $author)
    {}
    public function destroy($author)
    {}

    //
}
