<?php

namespace LeonardoHipolito\BladeClassProps\Commands;

use Illuminate\Console\Command;

class BladeClassPropsCommand extends Command
{
    public $signature = 'blade-class-props';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
