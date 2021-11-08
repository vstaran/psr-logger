<?php

namespace Logger;

/**
 * Interface FormaterInterface
 * @package Logger
 */
interface FormaterInterface
{
    /**
     * @param $level
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function format($level, $message, array $context = []);
}