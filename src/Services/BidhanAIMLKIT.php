<?php

namespace Bidhan\AiMlKit\Services;

class BidhanAIMLKIT
{
    public function getSentiments($text)
    {
        try {
            $output = null;
            $retval = null;
            exec(config("aimlkit.PY_EXECUTABLE_PATH") . " " . base_path(config("aimlkit.PY_SRC")) . " " . escapeshellarg($text), $output, $retval);
            return json_decode($output[0], true);
        } catch (\Exception $e) {
            info($e->getMessage());
            return $e;
        }
    }
}
