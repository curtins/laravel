<?php

namespace App\Traits;
use App\newsheader;

use Illuminate\Support\Facades\Log;

trait ProcessFile
{

    public function LoadTitleData($array)
    { 
       

        return 0;
    }     

    public function LoadDetail($array)
    {
        return 0;
    }        
 
    public function StripFile($file)
    {
        $data = file_get_contents($file);
        $json = json_decode($data,true);
       
        
        $cnt = 0;

        if (array_key_exists('permalinkUrl', $json)) 
        {
                $detail = array(
                    
                                "source"    => "superfeeder",
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

                        $title = new newsheader; 
                        $title->source  =  "superfeeder";
                        $title->code  =    $json['status']['code'];                              
                        $title->http  =  $json['status']['http'];
                        $title->nextfetch  =  $json['status']['nextFetch'];
                        $title->title =    $json['title'];
                        $title->feed   =  $json['status']['feed'];
                        $title.save();
                
                        

                        
                         
                    }         
                    
                }

               

        }    

        return 0;
                        
    }

    
     












} 

 