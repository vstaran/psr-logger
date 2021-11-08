<?php

namespace Logger;

use DateTime;

/**
 * Class Formater
 * @package Logger
 */
class Formater implements FormaterInterface
{
    /**
     * @var string Date format
     */
    private $dateFormat = 'Y-m-d H:i:s';

    /**
     * @var string Message template
     */
    private $template = "{date} {level} {message} {context}";

    /**
     * @param $level
     * @param $message
     * @param array $context
     * @return string
     */
    public function format($level, $message, array $context = [])
    {
        // $this->template
        return trim(strtr($this->template, [
            '{date}' => $this->getDate(),
            '{level}' => $level,
            '{message}' => $message,
            '{context}' => $this->arrayToString($context),
        ])) . PHP_EOL;

    }

    /**
     * Current date
     *
     * @return string
     */
    public function getDate()
    {
        return (new DateTime())->format($this->dateFormat);
    }

    /**
     * Transformation $context array in string line
     *
     * @param array $context
     * @return string
     */
    public function arrayToString(array $context = [])
    {
        return !empty($context) ? json_encode($context) : null;
    }

}