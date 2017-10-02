<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait SuperFeedrLoad
{
 
    public function StripFile($file)
    {
        $data = file_get_contents($file);
        $json = json_decode($data,true);
        
        //$strStatus = $json['status']['code'];
        //$strhttp = $json['status']['http'];
        //$strnextFetch = $json['status']['nextFetch'];
        //$strtitle = $json['title'];

        $detail = array(

            "code"      => $json['status']['code'],
            "http"      => $json['status']['http'],
            "nextfetch" => $json['status']['nextFetch'],
            "title"     => $json['title']

        );

        $cnt = 0;

        if (array_key_exists('permalinkUrl', $json))
        {
            //echo "image exists " . $json['permalinkUrl'] . "<br>";

              

                $strfeed = $json['status']['feed'];

                
                if  (array_key_exists('items',$json))
                {
                    if (($json['status']['code'] == '200') && (count($json['items']) > 0) )
                    {
                        $cnt++;                        
                        //Log::info('Decoding.. ' . $file . ',' . $strfeed );
                         
                    }         
                    
                }

        }    
        //Log::info('Total Processed.. ' . $cnt );                
    }
} 

 