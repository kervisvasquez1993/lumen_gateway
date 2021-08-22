<?php
namespace App\Service;

use App\Traits\ConsumeExternalService;

class AuthorService 
{
     use ConsumeExternalService;
     public $baseUri;
     public $secret;

     public function __construct()
     {
         $this->baseUri = config('services.authors.base_uri');
         $this->secret = config('services.authors.secret');
     }

     public function getAuthors()
     {
         
       return  $this->performRequest('GET', '/author');
       
     }

     public function createAuthors($data)
     {
       
      return  $this->performRequest('POST', '/author', $data);
     }
     public function getAuthor($author)
     {
        return $this->performRequest('GET', "/author/{$author}");
     }

     public function editAuthor($data, $author)
     {
      return $this->performRequest('PUT', "/author/{$author}", $data);
     }
     public function deleteAuthor($author)
     {
      return $this->performRequest('DELETE', "/author/{$author}");
     }
}

