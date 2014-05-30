<?php
/* * ************************************************************* 
 * Copyright notice 
 * 
 * (c) 2014 Chi Hoang (info@chihoang.de) 
 *  All rights reserved 
 *
 *  For family 10h processor the right formula is:
 *   (100*(Fid+16))/(2^Did)
 *  Inverse formulas are:
 *    fid = (((2^Did) * freq) / 100) - 16
 *    did = log2 ((100 * (fid +16))/f)   
 * **************************************************************/

    class convertFreq {
    
        var $fixme;
        var $cpu=array();
        var $input=array();
            
        function convertFreq ($cpu,$type,$input) {
            $this->fixme=$cpu;
            $this->cpu=$type;
            $this->input=$input;
        }
        
        function tofreq () {

            $fixme=($this->fixme[$this->cpu]);    
            $c=0; 
            foreach ($this->input as $key=>$arr)
            {               
                $vid=abs(($arr["vcore"]-1.55)/0.0125);            
                
                $did=0;
                do {
                    $fid = (((1 << (int) $did) * (float) $arr["freq"]) / 100) - $fixme;
                    if ($fid < 0)
                    {
                        $did++;
                    }
            
                } while ($fid < 0);
            
                if ($fid > 63)
                {
                    $fid = 63;
                }    
                $result[$c] = array ("vid"=>$vid,
                                     "fid"=>$fid,
                                     "did"=>$did);
                $c++;
            }
            
            return $result;
        }       
     }
?>    
