<?php

namespace Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * Class Logger
 * @package Logger
 */
class Logger extends AbstractLogger implements LoggerInterface
{
    private $writer;
    private $formater;

    /**
     * Logger constructor.
     * @param WriterInterface $writer
     * @param FormaterInterface $formater
     */
    public function __construct(WriterInterface $writer, FormaterInterface $formater)
    {
        /**
         * TODO можно исполозовать шаблон Adapter и при вызове метода log() логировать в Файл, Базу, Cистемный лог
         */
        $this->writer = $writer;
        $this->formater = $formater;
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = [])
    {
        // тут мы будем логировать
        $this->writer->write([
            'date' => $this->formater->getDate(),
            'level' => $level,
            'message' => $message,
            'context' => $context,
            'context_line' => $this->formater->arrayToString($context),
            'formated_line' => $this->formater->format($level, $message, $context)
         ]);
    }

}