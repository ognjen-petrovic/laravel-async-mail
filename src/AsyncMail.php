<?php

namespace Ognjen\Laravel;

use Symfony\Component\Process\Process;

class AsyncMail
{
    public static function send($mailable)
    {
        $process = Process::fromShellCommandline('php "${:ARTISAN}" "${:NAME}" "${:MAIL}"');
        $process->run(null, ['ARTISAN' => base_path('artisan'), 
                             'NAME'=> 'async:mail',
                             'MAIL' => base64_encode(serialize($mailable))
                            ]);
    }
}