<?php

/**
 * Description of utils
 *
 * @author Mohamed Achraf BEN MOHAMED <mohamedachraf@gmail.com>
 */
class utils {

    /**
     * 
     * @param type $word
     * @param type $sentence
     * @return type
     */
    function findWordPositionInSentence($word, $sentence) {                       
        
        return array_search(
                $word
                , 
                preg_split('/[\s]+/',$sentence)
                );
    }
    
    
}
