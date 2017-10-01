<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait SuperFeedrLoad
{
 
    public function StripFile($file)
    {
        $data = file_get_contents($file);
        $json = json_decode($data,true);
        $strStatus = $json['status']['code'];
        $strhttp = $json['status']['http'];
        $strnextFetch = $json['status']['nextFetch'];
        $strtitle = $json['title'];

        if (array_key_exists('permalinkUrl', $json))
        {
            //echo "image exists " . $json['permalinkUrl'] . "<br>";

                $cnt = 0;

                $strfeed = $json['status']['feed'];
                if  (array_key_exists('items',$json))
                {
                    if (($strStatus == '200') && (count($json['items']) > 0) )
                    {
                        $cnt++;
                        //echo ($file) .  PHP_EOL ;
                        //echo ($strfeed) . PHP_EOL .PHP_EOL ;
                        Log::info('Decoding.. ' . $file . ',' . $strfeed );
                        //echo ($strStatus) . '<br>';
                        //echo ($strtitle) . '<br>';

                        //echo count($json['items']) . ' - items <br>';
                        //echo count($json['status']) . PHP_EOL ;

                        //dd($json);
                    }         //echo count($json['standardLinks']);


                    Log::info('Total.. ' . $cnt );



                }

        }                    
    }
} 

 