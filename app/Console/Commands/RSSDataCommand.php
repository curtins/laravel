<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Filesystem\Filesystem;

class RSSDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:load';

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
    
        $cnt =0;
    
        foreach ($files as $file)
       { 
            $data = file_get_contents("$file");
            $json = json_decode($data,true);
            $strStatus = $json['status']['code'];
            $strhttp = $json['status']['http'];
            $strnextFetch = $json['status']['nextFetch'];
            $strtitle = $json['title'];
            if (array_key_exists('permalinkUrl', $json))
            {
                //echo "image exists " . $json['permalinkUrl'] . "<br>";
        
                }
        
                    $strfeed = $json['status']['feed'];
                    if  (array_key_exists('items',$json))
                    {
                        if (($strStatus == '200') && (count($json['items']) > 0) )
                        {
                            $cnt++;
                            echo ($file) .  PHP_EOL ;
                            echo ($strfeed) . PHP_EOL .PHP_EOL ;
                            //echo ($strStatus) . '<br>';
                            //echo ($strtitle) . '<br>';
        
                            //echo count($json['items']) . ' - items <br>';
                            //echo count($json['status']) . PHP_EOL ;
        
                            //dd($json);
                        }         //echo count($json['standardLinks']);
                    }
                }
    
                echo ($cnt) . PHP_EOL ;
            }
}
 
