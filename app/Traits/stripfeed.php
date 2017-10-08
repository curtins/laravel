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


       


        if (array_key_exists('permalinkUrl', $json)) 
        {
                echo "steve99";
                
                $detail = array(
                    
                                "source"    => "superfeeder",
                                "code"      => $json['status']['code'],                              
                                "http"      => $json['status']['http'],
                                "nextfetch" => $json['status']['nextFetch'],
                                "title"     => $json['title'],
                                "feed"      => $json['status']['feed']
                    
                );


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

                            echo "steve";

                             
                            if (($json['status']['code'] == '200') && count($json['items']) > 0)   
                            {
                                echo "steve1";

                                $newsheader = newsheader::create (array(
                                    
                                                "source"    => "superfeeder",
                                                "code"      => $json['status']['code'],                              
                                                "http"      => $json['status']['http'],
                                                "nextfetch" => $json['status']['nextFetch'],
                                                "title"     => $json['title'],
                                                "feed"      => $json['status']['feed']
                                    
                                ));


                                for ($x = 0; $x < count($json['items']); $x++)
                                {
                                    echo "steve2";

                                    $newsdetail = newsdetail::create (array(
                                        
                                                    "headerid"  => $newsheader->id,
                                                    "itemid"    => $json['items'][$x]['id'],  
                                                    "published"    => $json['items'][$x]['published'],  
                                                    "updated"    => $json['items'][$x]['updated'],  
                                                    "title"    => $json['items'][$x]['title'],  
                                                    "summary"    => $json['items'][$x]['summary']   , 
                                                    "content"    => "test"                            
                                                    
                                        
                                    ));
                                    
                                } 
                                
                             
                               
                             
                            }

                        }
                }    
                
                
                 
                    
                    
                   
        }    

       

         
        return 0;                
    }

   
} 

 