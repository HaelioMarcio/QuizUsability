<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DemoController extends Controller
{
    // private $user;

    // public function __construct(User $user) {
    // 	$this->$user = $user;
    // }

    public function index() {
    	return 'Hello';
    }
}
