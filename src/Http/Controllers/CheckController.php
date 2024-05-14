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

        exec(config("aimlkit.PY_EXECUTABLE_PATH") . " " . base_path(config("aimlkit.PY_SRC")) . " " . escapeshellarg($text), $output, $retval);

        return json_decode($output[0], true);
    }
}
