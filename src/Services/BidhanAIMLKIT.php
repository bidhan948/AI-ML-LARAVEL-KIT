<?php

namespace Bidhan\AiMlKit\Services;

class BidhanAIMLKIT
{
    const PY_SRC = "vendor/bidhan/aimlkit/src/Python/sentiment_analysis.py"; // "packages/Bidhan/AiMlKit/src/Python/sentiment_analysis.py"

    public function getSentiments($text)
    {
        try {
            $output = null;
            $retval = null;
            exec(config("aimlkit.PY_EXECUTABLE_PATH") . " " . base_path(BidhanAIMLKIT::PY_SRC) . " " . escapeshellarg($text), $output, $retval);
            return json_decode($output[0], true);
        } catch (\Exception $e) {
            info($e->getMessage());
            return $e->getMessage();
        }
    }
}
