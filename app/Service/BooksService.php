<?php
namespace App\Service;

use App\Traits\ConsumeExternalService;

class BooksService 
{
     use ConsumeExternalService;
     public $baseUri;

     public function __construct()
     {
         $this->baseUri = config('services.books.base_uri');
     }

     public function getBooks()
     {
        
        return $this->performRequest('GET', '/book');
     }

     public function getBook($book)
     {
        
        return $this->performRequest('GET', "/book/{$book}");
     }

     public function createBook($data)
     {
         return $this->performRequest('POST', '/book', $data);
     }
}