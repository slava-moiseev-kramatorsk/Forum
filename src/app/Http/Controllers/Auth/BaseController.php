<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Services\ForumService;

class BaseController extends Controller
{
 public $service;

 public function __construct(ForumService $service)
 {
  $this->service = $service;
 }
}
