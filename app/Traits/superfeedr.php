<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait SuperFeedrLoad
{
 
    public function StripFile($file)
    {
        $data = file_get_contents($file);
        $json = json_decode($data,true);
       
        
        $cnt = 0;

        if (array_key_exists('permalinkUrl', $json))
        {
                //$strfeed = $json['status']['feed'];

                $detail = array(
                    
                                "code"      => $json['status']['code'],
                                "http"      => $json['status']['http'],
                                "nextfetch" => $json['status']['nextFetch'],
                                "title"     => $json['title'],
                                "feed"      => $json['status']['feed']
                    
                );
                    

                //LoadDetail($detail);
                
                if  (array_key_exists('items',$json))
                {
                    if (($json['status']['code'] == '200') && (count($json['items']) > 0) )
                    {
                        $cnt++;                        
                        //Log::info('Decoding.. ' . $file . ',' . $strfeed );
                         
                    }         
                    
                }

        }    
                        
    }

    
    public function LoadDetail($detailarray)
    {




    }












} 

 