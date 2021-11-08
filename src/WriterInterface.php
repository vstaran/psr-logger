<?php

namespace Logger;

/**
 * Interface WriterInterface
 * @package Logger
 */
interface WriterInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function write(array $data);
}