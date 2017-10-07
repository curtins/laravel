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
                     
                        $strItem=$json['items'][0]['id']; 
                        
                        $newsheader = newsheader::create (array(
                            
                                        "source"    => "superfeeder",
                                        "code"      => $json['status']['code'],                              
                                        "http"      => $json['status']['http'],
                                        "nextfetch" => $json['status']['nextFetch'],
                                        "title"     => $json['title'],
                                        "feed"      => $json['status']['feed']
                            
                        ));

                        

                        
                        
                        $lastInsertedId = $newsheader->id;

                        /*

                        for ($x = 0; $x <  count($json['items']); $x++)
                        {



                            /* 
                            $table->increments('id');
                            $table->integer('headerid');
                            $table->string('itemid');
                            $table->string('published');
                            $table->string('updated');
                            $table->string('title');
                            $table->string('summary');
                            $table->string('content');
                            $table->timestamps();
                          



                            //$strItem=$json['items'][0]['id']; 
                            
                            $newsdetail = newsdetail::create (array(
                                
                                            "headerid"  => $newsheader->id,
                                            "itemid"    => $json['items'][$x]['id'],  
                                            "published"    => $json['items'][$x]['published'],  
                                            "updated"    => $json['items'][$x]['updated'],  
                                            "title"    => $json['items'][$x]['title'],  
                                            "summary"    => $json['items'][$x]['summary']   , 
                                            "content"    => "test"                            
                                            
                                
                            ));

                              */


                            

                            




                        } 





                        

                       
 


                         


                       

                        

                        

                        
                         
                    }         
                    
                }

               

        }    

        return 0;
                        
    }

    
     












} 

 