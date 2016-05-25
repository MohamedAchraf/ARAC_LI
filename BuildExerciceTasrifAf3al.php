<?php
include_once './exercices.php';
include_once './parsedSentences.php';
include_once './utils.php';

$tenses = array('',
    'الماضي المعلوم'
    , 'المضارع المعلوم'
    , 'المضارع المجزوم'
    , 'المضارع المنصوب'
    , 'المضارع المؤكد الثقيل'
    , 'الأمر'
    , 'الأمر المؤكد'
    , 'الماضي المجهول'
    , 'المضارع المجهول'
    , 'المضارع المجهول المجزوم'
    , 'المضارع المجهول المنصوب'
    , 'المضارع المؤكد الثقيل المجهول'
);

$tags_labels = array('',
    'فعل_ماضي_معلوم',
    'فعل_مضارع_معلوم',
    'فعل_مضارع_مجزوم',
    'فعل_مضارع_منصوب',
    'فعل_مضارع_مؤكد_ثقيل',
    'فعل_أمر',
    'فعل_أمر_مؤكد',
    'فعل_ماضي_مجهول',
    'فعل_مضارع_مجهول',
    'فعل_مضارع_مجهول_مجزوم',
    'فعل_مضارع_مجهول_منصوب',
    'فعل_مضارع_مؤكد_ثقيل_مجهول'
);

$exercice = new exercices();
$parsedSentences = new parsedSentences();
$sentences = $parsedSentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");
$util = new utils();
$results = array();

$action = isset($_GET['action']) ? $_GET['action'] : 1;
$choosedToken = isset($_GET['token']) ? $_GET['token'] : 'جار';
$DetailsExercice = isset($_GET['DetailsExercice']) ? $_GET['DetailsExercice'] : 1;

define('DISPLAY_TENSE', 1);
define('DISPLAY_SENTENCES', 2);
define('DISPLAY_EXERCICE', 3);
define('SAVE_EXERCICE', 4);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/ARACstyle.css">
        <title>Exercise Builder</title>
       
    </head>
    <body dir=rtl>


        <?php
        switch ($action) {

            //------------------------------------------------------------------
            case DISPLAY_TENSE:
                echo ""
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=1 >" . $tenses[1] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=2 >" . $tenses[2] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=3 >" . $tenses[3] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=4 >" . $tenses[4] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=5 >" . $tenses[5] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=6 >" . $tenses[6] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=7 >" . $tenses[7] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=8 >" . $tenses[8] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=9 >" . $tenses[9] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=10>" . $tenses[10] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=11>" . $tenses[11] . "</a><br>"
                . "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&token=12>" . $tenses[12] . "</a><br>";
                break;
            //------------------------------------------------------------------
            case DISPLAY_SENTENCES:

                $token = $tags_labels[$choosedToken];
                $results = $exercice->getSentencesIndexes($token, 0, $sentences->count(), 0);
                echo ""
                . "<form name=\"form11\" action=\"" . $_SERVER['PHP_SELF'] . "?action=3&token=" . $choosedToken . "\" method=\"post\">";

                for ($i = 0; $i < count($results); $i++) {
                    echo "<input type=checkbox name=sentence[] value=" . $results[$i] . ">"
                    . "<font face=\"traditional arabic\" size=\"6\">"
                    . $parsedSentences->getSentence($sentences, $results[$i])
                    . "</font><br>";


                    $position = $util->findWordPositionInSentence(
                            $token
                            , $parsedSentences->getTokens($sentences, $results[$i])
                    );
                }
                echo ""
                . "<br><input type=submit value='إرسال'>"
                . '&nbsp;&nbsp;'
                . '<input type = button value="رجوع" onclick="window.history.back()">'
                . "</form>";
                break;
            //------------------------------------------------------------------
            case DISPLAY_EXERCICE:
                $exercice->displayBlankFillingExercice($_POST['sentence'], $tags_labels[$choosedToken]);
                echo '<a href=' . $_SERVER['PHP_SELF'] . '?action=4&DetailsExercice=';
                for ($i = 0; $i < count($_POST['sentence']); $i++) {
                    echo $_POST['sentence'][$i] . ',';
                }
                echo $tags_labels[$choosedToken] . '><br>'
                . '<input type = button value="حفظ"></a>'
                . '&nbsp;&nbsp;'
                . '<input type = button value="رجوع" onclick="window.history.back()">';
                break;
            //------------------------------------------------------------------
            case SAVE_EXERCICE:
                $file = 'data/exercices.txt';
                $current = file_get_contents($file);
                $current .= $DetailsExercice . "\n";
                if (file_put_contents($file, $current)) {
                    echo 'تم حفظ التمرين.';
                } else {
                    echo 'لم يتم حفظ التمرين';
                }
                echo '<br><a href=./index.php><br><input type = button value="رجوع"></a>';
                break;
        }

        echo ""
        . "</body>"
        . "</html>";
        ?>
