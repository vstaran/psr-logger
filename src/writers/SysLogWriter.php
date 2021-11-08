<?php

namespace Logger\writers;

use Psr\Log\LogLevel;
use Logger\WriterInterface;

/**
 * Class SysLogWriter
 * @package Logger\writers
 */
class SysLogWriter implements WriterInterface
{

    /**
     * @param array $data
     * @return mixed|void
     */
    public function write(array $data)
    {
        $level = $this->resolveLevel($data['level']);
        if ($level === null) {
            return;
        }

        syslog($level, $data['formated_line']);
    }

    /**
     * Transform level log for syslog()
     *
     * @see http://php.net/manual/en/function.syslog.php
     * @param $level
     * @return string
     */
    private function resolveLevel($level)
    {
        $map = [
            LogLevel::EMERGENCY => LOG_EMERG,
            LogLevel::ALERT     => LOG_ALERT,
            LogLevel::CRITICAL  => LOG_CRIT,
            LogLevel::ERROR     => LOG_ERR,
            LogLevel::WARNING   => LOG_WARNING,
            LogLevel::NOTICE    => LOG_NOTICE,
            LogLevel::INFO      => LOG_INFO,
            LogLevel::DEBUG     => LOG_DEBUG,
        ];
        return isset($map[$level]) ? $map[$level] : null;
    }

}