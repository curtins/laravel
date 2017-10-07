<?php

namespace App\Traits;
use App\newsheader;
use App\newsdetail;

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

        echo ('steve1');

        if (array_key_exists('permalinkUrl', $json)) 
        {
            echo ('steve2');
                
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
                    echo ('steve3');
                    
                    if (($json['status']['code'] == '200') && (count($json['items']) > 0) )
                {
                    echo ('steve4');
                        $strItem=$json['items'][1]['id']; 
                        dd ('steve' . $strItem);

                        $newsheader = newsheader::create (array(
                            
                                        "source"    => "superfeeder",
                                        "code"      => $json['status']['code'],                              
                                        "http"      => $json['status']['http'],
                                        "nextfetch" => $json['status']['nextFetch'],
                                        "title"     => $json['title'],
                                        "feed"      => $json['status']['feed']
                            
                        ));

                        

                        
                        
                        $lastInsertedId = $newsheader->id;

                        

                       

                        //dd($json['items']);


                         


                       

                        

                        

                        
                         
                    }         
                    
                }

               

        }    

        return 0;
                        
    }

    
     












} 

 