<?php

namespace Ognjen\Laravel\Console\Commands;

use Illuminate\Console\Command;

class AsyncMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'async:mail {mailable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send async mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mailable = $this->argument('mailable');
        \Mail::send(unserialize(base64_decode($mailable)));
    }
}
