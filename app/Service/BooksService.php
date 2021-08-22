<?php
namespace App\Service;

use App\Traits\ConsumeExternalService;

class BooksService 
{
     use ConsumeExternalService;
     public $baseUri;
     public $secret;

     public function __construct()
     {
         $this->baseUri = config('services.books.base_uri');
         $this->secret  = config('service.books.secret');
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
     public function editBook($data, $book)
     {
         return $this->performRequest('PUT', "/book/{$book}", $data);
     }

     public function deleteBook($book)
     {
         return $this->performRequest('DELETE', "/book/{$book}");
     }
}