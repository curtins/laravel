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
                        


                        $newsheader = newsheader::create (array(
                            
                                        "source"    => "superfeeder",
                                        "code"      => $json['status']['code'],                              
                                        "http"      => $json['status']['http'],
                                        "nextfetch" => $json['status']['nextFetch'],
                                        "title"     => $json['title'],
                                        "feed"      => $json['status']['feed']
                            
                        ));

                        

                        
                        
                        $lastInsertedId = $newsheader->id;

                        

                       

                        dd($json['items']);


                         


                       

                        

                        

                        
                         
                    }         
                    
                }

               

        }    

        return 0;
                        
    }

    
     












} 

 