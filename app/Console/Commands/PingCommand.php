<?php

namespace App\Console\Commands;

use App\Models\Camera;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Console\Command;

class PingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:PingCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Get Request For Scanable Cameras';

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
        //return Command::SUCCESS;
        set_time_limit(0);
    $client = new Client();
    $cameras = Camera::where('ping', 1)->get();
    foreach ($cameras as $camera) {
        try {
            $res = $client->request('GET', "http://$camera->ip", ['connect_timeout' => 3]);
            $camera->update([
                'state'=>'online',
            ]);
        } catch (\Throwable $th) {
            $camera->update([
                'state' => 'offline',
            ]);
        }
    }
    }
}
