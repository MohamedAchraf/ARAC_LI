<?php

include_once './utils.php';
include_once './parsedSentences.php';

/**
 * Description of exercices
 *
 * @author Mohamed Achraf BEN MOHAMED <mohamedachraf@gmail.com>
 */
class exercices {

    /**
     * Retrun indexes of sentences corresponding to to the specified 
     * token. Search begins at index $begin and ends at index $end.
     * Parameter $limit indicates the number of returned results. If
     * $limit = 0 serch is done without limit. 
     * @param type $choosedToken
     * @param type $begin
     * @param type $end
     * @param type $limit
     * @return int
     */
    function getSentencesIndexes($choosedToken, $begin, $end, $limit) {

        $sentences = new parsedSentences();
        $list = $sentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");

        $ChoosedList = array();
        $l = 0;
        $found = 0;


        for ($index = 0; $index < $list->count(); $index++) {

            if ($index >= $begin && $index <= $end) {
                $token = $sentences->getTokens($list, $index);
                if (strpos($token, $choosedToken) !== false) {
                    $ChoosedList[$l++] = $index;
                    $found++;
                }

                if ($found == $limit && $limit != 0) {
                    break;
                }
            }
        }

        for ($index = 0; $index < $list->count(); $index++) {

            if ($index >= $begin && $index <= $end) {
                $token = $sentences->getComponent($list, $index);
                if (strpos($token, $choosedToken) !== false) {
                    $ChoosedList[$l++] = $index;
                    $found++;
                }

                if ($found == $limit && $limit != 0) {
                    break;
                }
            }
        }

        return $ChoosedList;
    }

    /**
     * 
     * @param type $listOfSentences
     * @param type $token
     */
    function displayBlankFillingExercice($listOfSentences, $token) {

        $util = new utils();
        $parsedSentences = new parsedSentences();
        $sentences = $parsedSentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");
        $sentenceOrder = 1;

        foreach ($listOfSentences as $selected) {
            echo "<font face=\"traditional arabic\" size=\"6\">".$sentenceOrder . ". " ;
            $sentenceOrder++;
            $position = $util->findWordPositionInSentence(
                    $token
                    , $parsedSentences->getTokens($sentences, intval($selected)))
            ;


            $words = array();
            $words = preg_split('/[\s]+/', $parsedSentences->getSentence($sentences, intval($selected)));
            for ($i = 1; $i < count($words); $i++) {
                $id1 = $sentenceOrder * 10 + $i;
                $id2 = $id1 * 101;
                if ($i == $position) {
                    echo '<input type="text" size="10" id="' . $id1 . '"';

                    if (strstr($token, '_')) {
                        echo ' value="'
                        . preg_split('/[\s]+/', $parsedSentences->getRoot($sentences, intval($selected)))[$position]
                        . '&nbsp;|&nbsp;'
                        . preg_split('/[\s]+/', $parsedSentences->getScheme($sentences, intval($selected)))[$position];
                    }
                    echo '" onBlur="verif(' . $id1 . ',' . $id2 . ');"> ';

                    echo'<input type="hidden" id="' . $id2 . '" value="' . $words[$i] . '" >';
                } else {
                    echo "<font face=\"traditional arabic\" size=\"6\">"
                    . $words[$i] . " ";
                }
            }
            echo '.';
            echo '<br>';
        }
    }

    function displaySelectableExercice($listOfSentences, $token) {

        $util = new utils();
        $parsedSentences = new parsedSentences();
        $sentences = $parsedSentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");
        $sentenceOrder = 1;

        foreach ($listOfSentences as $selected) {
            echo $sentenceOrder . '. ';
            $sentenceOrder++;
            //---------------------------- Search simple token position
            $position = $util->findWordPositionInSentence(
                    $token
                    , $parsedSentences->getTokens($sentences, intval($selected)))
            ;

            //---------------------------- Search component token range
            $componentRange = preg_split('/[\s]+/', $parsedSentences->getComponentRange($sentences, intval($selected), $token));
            $componentSize = @$componentRange[1] - @$componentRange[0] + 1;

            //----------------------------- Display sentences
            $words = array();
            $words = preg_split('/[\s]+/', $parsedSentences->getSentence($sentences, intval($selected)));

            // test if token is a word or a component
            if ($position != '') {
                for ($i = 1; $i < count($words); $i++) {
                    $id1 = $sentenceOrder * 10 + $i;
                    $id2 = $id1 * 101;
                    if ($i == $position) {
                        echo '<input type="button" size="10" id="' . $id1 . '"'
                        . 'style="background-color: #fff;border:0; color:#333;font-size:35px;"'
                        . ' value="' . $words[$i] . '" '
                        . '" onclick="verif(' . $id1 . ',' . $id2 . ');"> ';

                        echo'<input type="hidden" id="' . $id2 . '" value="' . $words[$i] . '" >';
                    } else {
                        echo '<input type="button" value="' . $words[$i]
                        . '" '
                        . 'style="background-color: #fff;border:0; color:#333;font-size:35px;" ">';
                    }
                }
            } else if ($componentRange !== NULL) {
                //echo '['.$componentRange[0].','.$componentRange[1].']';
                $val = 0;                
                for ($i = 1; $i < count($words); $i++) {
                    if ($i >= $componentRange[0] && $i <= $componentRange[1]) {
                        $firstId = $sentenceOrder * 10;
                        $id1 = $firstId + $val ;
                        $id2 = $id1 * 101;
                        $val++;
                        echo '<input type="button" size="10" id="' . $id1 . '"'
                        . ' style="background-color: #fff;border:0; color:#333;font-size:35px;"'
                        . ' value="' . $words[$i] . '" '
                        . '" onclick="verif_component(' . $firstId . ',' . $componentSize . ');"> ';
                        echo'<input type="hidden" id="' . $id2 . '" value="0" >';
                    } else {
                        echo '<input type="button" value="' . $words[$i]
                        . '" '
                        . 'style="background-color: #fff;border:0; color:#333;font-size:35px;" ">';
                    }
                }
            }
            echo '.<br>';
        }
    }

    function displayDroppableExercice($listOfSentences, $token) {

        $util = new utils();
        $parsedSentences = new parsedSentences();
        $sentences = $parsedSentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");
        $sentenceOrder = 1;
        $token = 'مبتدأ';

        foreach ($listOfSentences as $selected) {
            //echo $sentenceOrder . '. ';            
            $sentenceOrder++;
            $position = $util->findWordPositionInSentence(
                    $token
                    , $parsedSentences->getTokens($sentences, intval($selected)))
            ;

            $words = array();
            $words = preg_split('/[\s]+/', $parsedSentences->getSentence($sentences, intval($selected)));
            $wordsSize = count($words);
            //------------------------------- jquery style and javascript
            echo '<script>
           $(function() {
                var select = $( "#minbeds_' . $sentenceOrder . '" );
                var slider = $( "<div id=\'slider\'></div>" ).insertAfter( select ).slider({
                  min: 1,
                  max: ' . $wordsSize . ',
                  range: "min",
                  value: select[ 0 ].selectedIndex + 1,
                  slide: function( event, ui ) {
                    select[ 0 ].selectedIndex =  ui.value - 1;    
                    
                  }                  
                });
                
            $( "#minbeds_' . $sentenceOrder . '" ).change(function() {
              slider.slider( "value", this.selectedIndex  );                  
            });


  });
        </script>';
            //-----------------------------------------------------------            
            for ($i = 1; $i < $wordsSize; $i++) {
                $id1 = $sentenceOrder * 10 + $i;
                $id2 = $id1 * 101;
                $buttonSize = round(777 / $wordsSize);

                if ($i == $position) {
                    echo '<input type=button style="height:100px; width:' . $buttonSize . 'px;"  value=' . $words[$i] . '>';
                } else {
                    echo '<input type=button style="height:100px; width:' . $buttonSize . 'px;"  value=' . $words[$i] . '>';
                }
            }

            echo '<br><select name="#minbeds_' . $sentenceOrder . '"  id="minbeds_' . $sentenceOrder . '"  >';
            for ($j = 0; $j < $wordsSize; $j++) {
                echo '<option>' . $j . '</option>';
            }
            echo '</select>';

            echo '<br>';
        }
    }

}
