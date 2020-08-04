<?php

namespace App\Console\Commands;

use App\Texts;
use App\Transcription;
use App\User;
use Illuminate\Console\Command;

class EncryptData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'encrypt:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        $users = User::all();
        foreach ($users as $key => $user)
        {
            $user->setAttribute('name', $user->name);
            $user->setAttribute('country', $user->country);
            $user->setAttribute('state', $user->state);
            $user->setAttribute('encrypted', 1);
            $user->update();
        }
        $transcripts = Transcription::all();
        foreach ($transcripts as $key => $transcript)
        {
            $transcript->setAttribute('text', $transcript->text);
            $transcript->setAttribute('encrypted', 1);
            $transcript->update();
        }
        $texts = Texts::all();
        foreach ($texts as $key => $text)
        {
            $text->setAttribute('text', $text->text);
            $text->setAttribute('encrypted', 1);
            $text->update();
        }
    }
}
