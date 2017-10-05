<?php

namespace App\Traits;
use App\newsheader;

use Illuminate\Support\Facades\Log;

trait ProcessFile
{

    public function LoadTitleData($array)
    { 
        //dd(gettype($array));
        //dd($array);
        //$title = new newsheader;
        //$title->fill($array->all());

        //$title->source = "superfeedr";
        //$title->code   = $array('code');
        

        //$title->http= $array(1);
        //$title->nextfetch= $array(2);
        //$title->title= $array(3);
        //$title->feed= $array(4);
        //$title->save();

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
                        $cnt++;                        
                        //Log::info('Decoding.. ' . $file . ',' . $strfeed );
                        //$return = LoadTitle($detail);
                        //$strReturn = LoadTitleData($detail);
                        //$strReturn = LoadDetail($detail);
                        Return $detail;

                        $title = new newsheader(array(
                            "source"    => "superfeeder",
                            "code"      => $json['status']['code'],                              
                            "http"      => $json['status']['http'],
                            "nextfetch" => $json['status']['nextFetch'],
                            "title"     => $json['title'],
                            "feed"      => $json['status']['feed']
                
                        ));

                        $title.save();
                         
                    }         
                    
                }

        }    
                        
    }

    
     












} 

 