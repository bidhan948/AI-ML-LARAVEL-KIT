<?php

namespace Bidhan\AiMlKit\Services;

class BidhanAIMLKIT
{
    public $PY_SRC = "vendor/bidhan/aimlkit/src/Python/sentiment_analysis.py";

    public function getSentiments($text)
    {
        try {
            $output = null;
            $retval = null;
            exec(config("aimlkit.PY_EXECUTABLE_PATH") . " " . base_path($this->PY_SRC) . " " . escapeshellarg($text), $output, $retval);

            $jsonOutput = implode("\n", $output);

            $resultArray = json_decode($jsonOutput, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return $resultArray;
            } else {
                info("JSON decoding error: " . json_last_error_msg());
                return "Error decoding JSON: " . json_last_error_msg();
            }
        } catch (\Exception $e) {
            info($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Dynamically handle calls into the BidhanAIMLKIT instance.
     *
     * @param string $method
     * @param array<mixed> $parameters
     * @return $this|mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this, $method)) {
            return $this->$method(...$parameters);
        }
        throw new \UnexpectedValueException("Method [{$method}] does not exist on BidhanAIMLKIT instance.");
    }
}
