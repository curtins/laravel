<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait ProcessFile
{

    
 
    public function StripFile($file)
    {
        $data = file_get_contents($file);
        $json = json_decode($data,true);
       
        
        $cnt = 0;

        if (array_key_exists('permalinkUrl', $json)) 
        {
                $detail = array(
                    
                                "code"      => $json['status']['code'],
                                "http"      => $json['status']['http'],
                                "nextfetch" => $json['status']['nextFetch'],
                                "title"     => $json['title'],
                                "feed"      => $json['status']['feed']
                    
                );
                
                
                if  (array_key_exists('items',$json))
                {
                    if (($json['status']['code'] == '200') && (count($json['items']) > 0) )
                    {
                        $cnt++;                        
                        //Log::info('Decoding.. ' . $file . ',' . $strfeed );
                        //$return = LoadTitle($detail);
                         
                    }         
                    
                }

        }    
                        
    }

    
     












} 

 