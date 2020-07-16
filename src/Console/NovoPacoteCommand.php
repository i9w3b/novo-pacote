<?php

namespace I9w3b\NovoPacote\Console;

use Illuminate\Console\Command;

class NovoPacoteCommand extends Command
{
    protected $name = 'novopacote:test';
    protected $description = 'Testando class command novopacote';

    public function handle()
    {
        $this->info('Teste Bem Sucedido!');
    }
}
