<?php

namespace App\Traits;
use App\Header;;
use App\Detail;

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
    

                                $newsheader = Header::create (array(
                                    
                                                "source"    => "superfeeder",
                                                "code"      => $json['status']['code'],                              
                                                "http"      => $json['status']['http'],
                                                "nextfetch" => $json['status']['nextFetch'],
                                                "title"     => $json['title'],
                                                "feed"      => $json['status']['feed']
                                    
                                ));


                                for ($x = 0; $x < count($json['items']); $x++)
                                {
                                    $strpublish ="N/A";                                    
                                    $strupdated ="N/A"; 
                                    $strtitle ="N/A";  
                                    $strsummary ="N/A";  
                                    $strcontent ="N/A";  

                                    //$strpublish = $json['items'][$x]['published'];
                                    //$strupdated = $json['items'][$x]['updated'];
                                    $strtitle = $json['items'][$x]['title'];
                                    $strsummary = $json['items'][$x]['summary'];
                                    $strFeedDetail     = $json['status']['feed']


                                    /*


                                    if (array_key_exists('published', $json['items'][$x])) 
                                     {
                                        $strpublish = $json['items'][$x]['published'];
                                     } 
                                    



                                    if (array_key_exists('content', $json['items'][$x])) 
                                    {
                                        $strcontent = $json['items'][$x]['content'];
                                    }

                                    if (array_key_exists('updated', $json['items'][$x])) 
                                    {
                                        $strupdated = $json['items'][$x]['updated'];
                                    }

                                    if (array_key_exists('title', $json['items'][$x])) 
                                    {
                                        $strtitle = $json['items'][$x]['title'];
                                    }


                                    if (array_key_exists('summary', $json['items'][$x])) 
                                    { 
                                        $strsummary = $json['items'][$x]['summary'];
                                    }

                                    /*






                                    $strupdated = $json['items'][$x]['updated'] ; 
                                    $strtitle =   $json['items'][$x]['title']  ;
                                    $strsummary = $json['items'][$x]['summary'] ; 
                                    //$strcontent = $json['items'][$x]['content']  ;


                                   
                                   if ($json['items'][$x]['published']==null)
                                       $strpublish='N/A';  
                                    if ($json['items'][$x]['updated']==null)
                                        $strupdated='N/A';  
                                    if ($json['items'][$x]['title']==null)
                                        $strtitle='N/A';  
                                    if ($json['items'][$x]['summary']==null)
                                        $strsummary='N/A';  
                                    //if ($json['items'][$x]['content']==null)
                                    //    $strcontent='N/A';  
                                     */ 
                                     

                                    //dd($strpublish);
                                   
                                    $newsdetail = Detail::create (array(
                                        
                                                    "header_id"  => $newsheader->id,
                                                    "itemid"    => $json['items'][$x]['id'],  
                                    //                "published"    => $strpublish,
                                    //                "updated"    => $strupdated,
                                                    "title"    => $strtitle ,
                                                    "summary"    => $strsummary   , 
                                                    "content"    => $strcontent     ,
                                                    "feed"       => $strFeedDetail                     
                                                    
                                        
                                    ));

                                    
                                } 
                                
                             
                               
                             
                            }

                        
                }    
                
                
                 
                    
                    
                   
        }    

       

         
        return 0;                
    }

   
} 

 