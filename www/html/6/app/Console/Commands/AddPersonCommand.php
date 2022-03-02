<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;

class AddPersonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add person in people table';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->argument("name");
        $person = new Person;
        $person->name = $name;
        $person->save();
        $this->info($name.'を登録しました。');
        return 0;
    }
}
