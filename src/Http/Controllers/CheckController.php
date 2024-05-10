<?php

namespace Bidhan\AiMlKit\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->input('text');
        $output = null;
        $retval = null;

        exec("/home/uddhav/venv/bin/python3 " . base_path("packages/Bidhan/AiMlKit/src/Python/sentiment_analysis.py") . " " . escapeshellarg($text), $output, $retval);

        return json_decode($output[0], true);
    }
}
