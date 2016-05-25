<?php

/**
 * Description of parsedSentences
 *
 * @author Mohamed Achraf BEN MOHAMED <mohamedachraf@gmail.com>
 */
class parsedSentences {
    
    /**
     * 
     * @return type
     */
    function intiXMLFile($file) {
            return simplexml_load_file($file);
    }

    /**
     * Load plain text sentence
     * @param type $index
     */
    function getSentence($sentences, $index) {
        $sentence = ""; 
        foreach ($sentences->Joumla[$index]->Lemma as $lemma) {
            $sentence = $sentence." ".$lemma->String;
        }
        return $sentence;
    }

    /**
     * Load Scheme conversion of the sentence
     * @param type $index
     */
    function getScheme($sentences, $index) {
        $scheme ="";
        foreach ($sentences->Joumla[$index]->Lemma as $lemma) {
            $scheme = $scheme." ".$lemma->Scheme;
        }
        return $scheme;
    }

    /**
     * Load tokens
     * @param type $index
     */
    function getTokens($sentences, $index) {
        $token = "";
        foreach (@$sentences->Joumla[$index]->Lemma as $lemma) {
            $token = $token . " " . $lemma->Token;
        }
        return $token;
    }

    /**
     * Load roots
     * @param type $index
     */
    function getRoot($sentences, $index) {
        $root = "";
        foreach ($sentences->Joumla[$index]->Lemma as $lemma) {
            $root = $root." ".$lemma->Root;
        }
        return $root;
    }
    
    function getComponent($sentences, $index) {
        $title = "";
        foreach ($sentences->Joumla[$index]->Component as $component) {
            $title = $title." ".$component->Title;
        }
        return $title;
    }
    
    
    function getComponentRange($sentences, $index, $token) {
        $title = "";
        foreach ($sentences->Joumla[$index]->Component as $component) {
            if($component->Title == $token){
                $title = $component->Start.' '.$component->End;
            }
        }
        return $title;
    }

}
