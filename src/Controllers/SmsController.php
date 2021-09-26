<?php

namespace Danilo\SmsHablame\Controllers;

use App\Http\Controllers\Controller;
use Danilo\SmsHablame\SmsHablame;
use Illuminate\Http\Request;

class SmsController extends Controller
{

    public function index(Request $request)
    {
        return SmsHablame::checkBalance();
    }
}
