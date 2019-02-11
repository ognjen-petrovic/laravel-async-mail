<?php

namespace Ognjen\Laravel;

use Symfony\Component\Process\Process;

class AsyncMail
{
    public static function send($mailable)
    {
        $param = base64_encode(serialize($mailable));
        $command = self::createCommandString($param);
        $process = new Process($command);
        $process->run();
    }

    protected static function createCommandString($param)
    {
        if (defined('PHP_WINDOWS_VERSION_BUILD'))
        {
            return 'start /B php ' . base_path('artisan') . ' async:mail ' . $param . ' > NUL';
        } else {
            return 'php ' . base_path('artisan') . ' async:mail ' . $param . ' > /dev/null 2>&1 &';
        }
    }
}