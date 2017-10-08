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

                            if (($json['status']['code'] == '200') && count($json['items']) > 0)   
                            {

                               
                                 

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
                                    dd($json);

                                     /*
                                    $table->increments('id');
                                    $table->integer('headerid');
                                    $table->string('itemid');
                                    $table->string('published');
                                    $table->string('updated');
                                    $table->string('title');
                                    $table->text('summary');
                                    $table->string('content');
                                    $table->timestamps();
                                   */

                                    $strpublish = $json['items'][$x]['publish'];  
                                    $strupdated = $json['items'][$x]['updated'] ; 
                                    $strtitle =   $json['items'][$x]['title']  ;
                                    $strsummary = $json['items'][$x]['summary'] ; 
                                    $strcontent = $json['items'][$x]['content']  ;

                                   if ($json['items'][$x]['published']==null)
                                       $strpublish='N/A';  
                                    if ($json['items'][$x]['updated']==null)
                                        $strupdated='N/A';  
                                    if ($json['items'][$x]['title']==null)
                                        $strtitle='N/A';  
                                    if ($json['items'][$x]['summary']==null)
                                        $strsummary='N/A';  
                                    if ($json['items'][$x]['content']==null)
                                        $strcontent='N/A';  



                                    $newsdetail = newsdetail::create (array(
                                        
                                                    "headerid"  => $newsheader->id,
                                                    "itemid"    => $json['items'][$x]['id'],  
                                                    "published"    => $strpublish,
                                                    "updated"    => $strupdated,
                                                    "title"    => $strtitle ,
                                                    "summary"    => $strsummary   , 
                                                    "content"    => $strcontent                            
                                                    
                                        
                                    ));


                                      
                                    
                                } 
                                
                             
                               
                             
                            }

                        
                }    
                
                
                 
                    
                    
                   
        }    

       

         
        return 0;                
    }

   
} 

 