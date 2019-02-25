<?php

namespace App\Console\Commands;

use App\Book;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveOldBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oldbook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting books published over a year ago.';

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
        $books = Book::all();

        foreach($books as $b)
        {
            $diff = Carbon::parse($b->created_at)->diffInYears(Carbon::now());
            if($diff > 0)
            {
                $b->delete();
            }
        }
    }
}
