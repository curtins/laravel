<?php

namespace App\Console\Commands; 
 
use App\Traits\SuperFeedrLoad;
 

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Filesystem\Filesystem;

class RSSDataCommand extends Command 
{

    use SuperFeedrLoad;

     
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:load';
    protected $ffile = '';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load RSS Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->StripFile($ffile);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        

        Log::info('Showing user profile for user: ' .  time() );
        $file = new Filesystem();
        //$sourceDir = '/home/forge/superfeedr.scurtin.org/code/data';
        //$destDir = '/home/forge/horizon.scurtin.org/public/data';
    
        $sourceDir =  env('SOURCE_DATA', '/home/forge/superfeedr.scurtin.org/code/data');
        $destDir   =  env('DEST_DATA','/home/forge/horizon.scurtin.org/public/data');
    
    
        $success = \File::copyDirectory($sourceDir, $destDir);
    
    
        $files = \File::allFiles($destDir); 
    
        $cnt = 0;
    
       foreach ($files as $file)
       { 
           
       }
    
       echo ($cnt) . PHP_EOL ;
             
    }
} 
