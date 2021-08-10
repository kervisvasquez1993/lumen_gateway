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
}