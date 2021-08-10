<?php
namespace App\Service;

use App\Traits\ConsumeExternalService;

class AuthorService 
{
    use ConsumeExternalService;
     public $baseUri;

     public function __construct()
     {
         $this->baseUri = config('services.author.base_uri');
     }
}