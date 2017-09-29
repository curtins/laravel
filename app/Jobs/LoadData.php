<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Filesystem\Filesystem;

class LoadData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */

    public function tags()
    {
        return ['render', 'test'];
    }

    /**
     * Execute the job.
     *
     * @return void
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
