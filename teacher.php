<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/ico" href="images/arac.ico" />
        <title>ARAC</title>        
        <script src="./jquery_hotSneaks/external/jquery/jquery.js"></script>
        <script src="./jquery_hotSneaks/jquery-ui.js"></script>       
        <link href="./jquery_hotSneaks/jquery-ui.css" rel="stylesheet">
        <link rel="stylesheet" href="./CSS/ARACstyle.css">
        <script>
            $(function () {
                var tabs = $("#tabs").tabs();
                tabs.find(".ui-tabs-nav").sortable({
                    axis: "x",
                    stop: function () {
                        tabs.tabs("refresh");
                    }
                });
            });

        </script>
        <style>
            body {
                background-color: #e7e7e7;
                background-image: url(images/bg2.png);
                background-repeat: repeat-x;
                background-position: top;	
            }
        </style>
    </head>
    <body dir="rtl">
        <table border="0" width="777">
            <tr>
                <td>
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">تصريف الأفعال</a></li>
                            <li><a href="#tabs-2">الحروف</a></li>
                            <li><a href="#tabs-3">المركّبات</a></li>
                            <li><a href="#tabs-4">الجملة</a></li>
                        </ul>               

                        <div id="tabs-1">
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

                            $hourouf = array(
                                '',
                                'إستأناف',
                                'إستفهام',
                                'إستقبال',
                                'إسم إشارة',
                                'إسم موصول',
                                'تحقيق',
                                'حروف الجرّ',
                                'حرف عطف',
                                'شرط',
                                'ضمير رفع',
                                'ضمير نصب',
                                'كان وأخواتها',
                                'ناسخ',
                                'نداء',
                                'ضمير'
                            );

                            $mourakkabet = array(
                                '',
                                'مركّب نعتي',
                                'مركّب إضافي',
                                'مركّب بالجرّ',
                                'ظرف المكان',
                                'الحال'
                            );

                            $joumla = array(
                                '',
                                'مبتدأ',
                                'خبر',
                                'فاعل',
                                'مفعول به'
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
                                'فعل_مضارع_مؤكد_ثقيل_مجهول',
                                'استأناف',
                                'استفهام',
                                'استقبال',
                                'اسم_إشارة',
                                'اسم_موصول',
                                'تحقيق',
                                'جار',
                                'حرف_عطف',
                                'شرط',
                                'ضمير_رفع',
                                'نصب',
                                'كان_وأخواتها',
                                'ناسخ',
                                'نداء',
                                'ضمير',
                                'نعت_ومنعوت',
                                'مضاف_ومضاف_إليه',
                                'مجرور',
                                'ظرف_مكان',
                                'حال',
                                'مبتدأ',
                                'خبر',
                                'فاعل',
                                'مفعول_به'
                            );



                            //<!-- *********************************************************************** -->    
                            //<!-- ************************تصريف الأفعال ********************************** -->  
                            //<!-- *********************************************************************** -->  

                            $exercice = new exercices();
                            $parsedSentences = new parsedSentences();
                            $sentences = $parsedSentences->intiXMLFile("D:/Development/java_projects/AracPlatform_V0.1/data/PCFG/ParsedSentencesXML.xml");
                            $util = new utils();
                            $results = array();

                            $action = isset($_GET['action']) ? $_GET['action'] : 1;
                            $choosedToken = isset($_POST['token']) ? $_POST['token'] : 1;
                            $DetailsExercice = isset($_GET['DetailsExercice']) ? $_GET['DetailsExercice'] : 1;
                            $exercice_type = isset($_POST['exercice_type']) ? $_POST['exercice_type'] : 1;

                            define('DISPLAY', 1);
                            define('TASRIF_DISPLAY_SENTENCES', 2);
                            define('TASRIF_DISPLAY_EXERCICE', 3);
                            define('TASRIF_SAVE_EXERCICE', 4);
                            define('HOUROUF_DISPLAY_HARF', 5);

                            switch ($action) {

                                //------------------------------------------------------------------
                                case DISPLAY:
                                    //------------------- Display al af3al Settings-----------------

                                    echo '<table border=0 width=500 cellpadding=0 cellspacing=0>';
                                    echo '<form name=form1 action="' . $_SERVER['PHP_SELF'] . '?action=2" method="post">'
                                    . '<tr>'
                                    . '<td width=50% align=left bgcolor=#ccc><font face="traditional arabic" size="5"><b>'
                                    . 'الرّجاء تحديد نوع التّمرين  '
                                    . '</b>&nbsp;</td>'
                                    . '<td><input type= radio name="exercice_type" value="1">'
                                    . '<font face="traditional arabic" size="5">'
                                    . 'ملء فراغ'
                                    . '</td></tr>'
                                    . '<tr><td>&nbsp;</td>'
                                    . '<td><input type= radio name="exercice_type" value="2" checked>'
                                    . '<font face="traditional arabic" size="5">'
                                    . 'اختيار مباشر'
                                    . '</td></tr></table>'
                                    . '<hr>';
                                    //-----------------------------------
                                    echo '<table border=0 width=500 cellpadding=0 cellspacing=0>'
                                    . '<tr>'
                                    . '<td width=50% align=left bgcolor=#ccc>'
                                    . ' <font face="traditional arabic" size="5"><b>'
                                    . 'الرّجاء تحديد زمن تصريف الأفعال  '
                                    . '</b>&nbsp;</td>';

                                    for ($i = 1; $i < count($tenses); $i++) {
                                        echo ''                                        
                                        . '<td>'
                                        . '<input type="radio" name="token" value="' . $i . '">'
                                        . '<font face="traditional arabic" size="5">' . $tenses[$i]
                                        . '</td>'
                                        . '</tr>'
                                        . '<tr>'
                                        . '<td>&nbsp;</td>';
                                    }
                                    echo '</table>';
                                    echo '<input type="submit" value="ارسال"></div>';

                                    //------------------------ Display al hourouf---------------------                       
                                    ?>
                                    <div id="tabs-2">
                                        <?php
                                        echo '<table border=0 width=500 cellpadding=0 cellspacing=0>'
                                        . '<tr>'
                                        . '<td width=50% align=left bgcolor=#ccc>'
                                        . '<font face="traditional arabic" size="5"><b>'
                                        . 'الرّجاء تحديد نوع التّمرين  '
                                        . '</b>&nbsp;</td>'
                                        . '<td><input type= radio name="exercice_type" value="1">'
                                        . '<font face="traditional arabic" size="5">'
                                        . 'ملء فراغ'
                                        . '</td></tr>'
                                        . '<tr><td>&nbsp;</td>'
                                        . '<td><input type= radio name="exercice_type" value="2" checked>'
                                        . '<font face="traditional arabic" size="5">'
                                        . 'اختيار مباشر'
                                        . '</td></tr></table>'
                                        . '<hr>';
                                        //-----------------------------------
                                        echo '<table border=0 width=510 cellpadding=0 cellspacing=0>'
                                        . '<tr>'
                                        . '<td width=50% align=left bgcolor=#ccc>'
                                        . ' <font face="traditional arabic" size="5"><b>'
                                        . 'الرّجاء تحديد الحرف موضوع التمرين  '
                                        . '</b>&nbsp;</td>';

                                        for ($i = 1; $i < count($hourouf); $i++) {
                                            $tok = count($tenses) + $i - 1;
                                            echo ''
                                            . '<td>'
                                            . '<input type="radio" name="token" value="' . $tok . '">'
                                            . '<font face="traditional arabic" size="5">' . $hourouf[$i]
                                            . '</td>'
                                            . '</tr>'
                                            . '<tr>'
                                            . '<td>&nbsp;</td>';
                                        }
                                        echo '</table>';
                                        echo '<input type="submit" value="ارسال"></div>';

                                        //---------------------- Display Al mourakkabat------------------  
                                        ?>
                                        <div id="tabs-3">
                                            <?php
                                            echo '<table border=0 width=500 cellpadding=0 cellspacing=0>'
                                            . '<tr>'
                                            . '<td width=50% align=left bgcolor=#ccc>'
                                            . '<font face="traditional arabic" size="5"><b>'
                                            . 'الرّجاء تحديد نوع التّمرين  '
                                            . '</b>&nbsp;</td>'
                                            . '<td><input type= radio name="exercice_type" value="1" disabled>'
                                            . '<font face="traditional arabic" size="5">'
                                            . 'ملء فراغ'
                                            . '</td></tr>'
                                            . '<tr><td>&nbsp;</td>'
                                            . '<td><input type= radio name="exercice_type" value="2" checked>'
                                            . '<font face="traditional arabic" size="5">'
                                            . 'اختيار مباشر'
                                            . '</td></tr></table>'
                                            . '<hr>';
                                            //-----------------------------------
                                            echo '<table border=0 width=520 cellpadding=0 cellspacing=0>'
                                            . '<tr>'
                                            . '<td width=50% align=left bgcolor=#ccc>'
                                            . ' <font face="traditional arabic" size="5"><b>'
                                            . 'الرّجاء تحديد المركّب موضوع التمرين  '
                                            . '</b>&nbsp;</td>';

                                            for ($i = 1; $i < count($mourakkabet); $i++) {
                                                $tok = count($tenses) + count($hourouf) + $i - 2;
                                                echo ''
                                                . '<td>'
                                                . '<input type="radio" name="token" value="' . $tok . '">'
                                                . '<font face="traditional arabic" size="5">' . $mourakkabet[$i]
                                                . '</td>'
                                                . '</tr>'
                                                . '<tr>'
                                                . '<td>&nbsp;</td>';
                                            }
                                            echo '</table>';
                                            echo '<input type="submit" value="ارسال"></div>';
                                            ?>


                                            <!-- ---------- Display Joumla ----------------  -->
                                            <div id="tabs-4">
                                                <?php
                                                echo '<table border=0 width=500 cellpadding=0 cellspacing=0>'
                                                . '<tr>'
                                                . '<td width=50% align=left bgcolor=#ccc>'
                                                . '<font face="traditional arabic" size="5"><b>'
                                                . 'الرّجاء تحديد نوع التّمرين  '
                                                . '</b>&nbsp;</td>'
                                                . '<td><input type= radio name="exercice_type" value="1" disabled>'
                                                . '<font face="traditional arabic" size="5">'
                                                . 'ملء فراغ'
                                                . '</td></tr>'
                                                . '<tr><td>&nbsp;</td>'
                                                . '<td><input type= radio name="exercice_type" value="2" checked>'
                                                . '<font face="traditional arabic" size="5">'
                                                . 'اختيار مباشر'
                                                . '</td></tr></table>'
                                                . '<hr>';
                                                //-----------------------------------
                                                echo '<table border=0 width=520 cellpadding=0 cellspacing=0>'
                                                . '<tr>'
                                                . '<td width=50% align=left bgcolor=#ccc>'
                                                . ' <font face="traditional arabic" size="5"><b>'
                                                . 'الرّجاء تحديد موضوع التمرين  '
                                                . '</b>&nbsp;</td>';

                                                for ($i = 1; $i < count($joumla); $i++) {
                                                    $tok = count($tenses) + count($hourouf) + count($mourakkabet) + $i - 3;
                                                    echo ''
                                                    . '<td>'
                                                    . '<input type="radio" name="token" value="' . $tok . '">'
                                                    . '<font face="traditional arabic" size="5">' . $joumla[$i]
                                                    . '</td>'
                                                    . '</tr>'
                                                    . '<tr>'
                                                    . '<td>&nbsp;</td>';
                                                }

                                                echo '</table>';
                                                echo '<input type="submit" value="ارسال"></div>';
                                                ?>
                                            </div>


                                            <!--  -----------------------------------------  -->

                                        </div>
                                        <?php
                                        echo '</form>';
                                        break;
                                    //------------------------------------------------------------------
                                    case TASRIF_DISPLAY_SENTENCES:
                                        echo " <font face=\"traditional arabic\" size=\"5\">";
                                        echo 'الرّجاء اختيار الجمل المكوّنة للتّمرين :';
                                        $token = $tags_labels[$choosedToken];
                                        $results = $exercice->getSentencesIndexes($token, 0, $sentences->count(), 0);
                                        echo '[' . count($results) . ']<hr>';
                                        echo ""
                                        . "<form name=\"form11\" action=\"" . $_SERVER['PHP_SELF'] . "?action=3&token=" . $choosedToken . "\" method=\"post\">";

                                        for ($i = 0; $i < count($results); $i++) {
                                            echo "<input type=checkbox name=sentence[] value=" . $results[$i] . ">"
                                            . "<font face=\"traditional arabic\" size=\"5\">"
                                            . $parsedSentences->getSentence($sentences, $results[$i])
                                            . "</font><br>";


                                            $position = $util->findWordPositionInSentence(
                                                    $token
                                                    , $parsedSentences->getTokens($sentences, $results[$i])
                                            );
                                        }
                                        echo ""
                                        . "<input type=hidden value=" . $exercice_type . " name=exercice_type>"
                                        . "<input type=hidden value=" . $choosedToken . " name=token>"
                                        . "<br><input type=submit value='إرسال'>"
                                        . '&nbsp;&nbsp;'
                                        . '<input type = button value="رجوع" onclick="window.history.back()">'
                                        . "</form>";


                                        break;
                                    //------------------------------------------------------------------
                                    case TASRIF_DISPLAY_EXERCICE:
                                        switch ($exercice_type) {
                                            case 1:
                                                $exercice->displayBlankFillingExercice($_POST['sentence'], $tags_labels[$choosedToken]);
                                                break;
                                            case 2:
                                                $exercice->displaySelectableExercice($_POST['sentence'], $tags_labels[$choosedToken]);
                                                break;
                                        }

                                        echo '<a href=' . $_SERVER['PHP_SELF'] . '?action=4&DetailsExercice=';
                                        for ($i = 0; $i < count($_POST['sentence']); $i++) {
                                            echo $_POST['sentence'][$i] . ',';
                                        }
                                        echo $tags_labels[$choosedToken] . ',' . $exercice_type
                                        . '><br>'
                                        . '<input type = button value="حفظ"></a>'
                                        . '&nbsp;&nbsp;'
                                        . '<input type = button value="رجوع" onclick="window.history.back()">';
                                        break;
                                    //------------------------------------------------------------------
                                    case TASRIF_SAVE_EXERCICE:
                                        if (strstr($DetailsExercice, 'فعل')) {
                                            $file = 'data/exercices_tasrif.txt';
                                        } else if (strstr($DetailsExercice, 'جار')) {
                                            $file = 'data/exercices_jarr.txt';
                                        } else if (strstr($DetailsExercice, 'ضمير')) {
                                            $file = 'data/exercices_dhamir.txt';
                                        } else if (strstr($DetailsExercice, 'استأناف')) {
                                            $file = 'data/exercices_isteenef.txt';
                                        } else if (strstr($DetailsExercice, 'استفهام')) {
                                            $file = 'data/exercices_istifham.txt';
                                        } else if (strstr($DetailsExercice, 'استقبال')) {
                                            $file = 'data/exercices_isti9bel.txt';
                                        } else if (strstr($DetailsExercice, 'إشارة')) {
                                            $file = 'data/exercices_ism_ishara.txt';
                                        } else if (strstr($DetailsExercice, 'تحقيق')) {
                                            $file = 'data/exercices_ta79i9.txt';
                                        } else if (strstr($DetailsExercice, 'كان_وأخواتها')) {
                                            $file = 'data/exercices_kana.txt';
                                        } else if (strstr($DetailsExercice, 'ناسخ')) {
                                            $file = 'data/exercices_nese5.txt';
                                        } else if (strstr($DetailsExercice, 'نداء')) {
                                            $file = 'data/exercices_nidaa.txt';
                                        } else if (strstr($DetailsExercice, 'اسم_موصول')) {
                                            $file = 'data/exercices_maousoul.txt';
                                        } else if (strstr($DetailsExercice, 'حرف_عطف')) {
                                            $file = 'data/exercices_3atf.txt';
                                        } else if (strstr($DetailsExercice, 'شرط')) {
                                            $file = 'data/exercices_chart.txt';
                                        } else if (strstr($DetailsExercice, 'ضمير_رفع')) {
                                            $file = 'data/exercices_raf3.txt';
                                        } else if (strstr($DetailsExercice, 'مبتدأ') || strstr($DetailsExercice, 'خبر')) {
                                            $file = 'data/exercices_moubtada_khabar.txt';
                                        } else if (strstr($DetailsExercice, 'فاعل')) {
                                            $file = 'data/exercices_fa3il.txt';
                                        } else if (strstr($DetailsExercice, 'مفعول_به')) {
                                            $file = 'data/exercices_maf3oul_bihi.txt';
                                        } else if (strstr($DetailsExercice, 'نعت_ومنعوت')) {
                                            $file = 'data/exercices_na3ti.txt';
                                        } else if (strstr($DetailsExercice, 'مضاف_ومضاف_إليه')) {
                                            $file = 'data/exercices_idhafi.txt';
                                        } else if (strstr($DetailsExercice, 'مجرور')) {
                                            $file = 'data/exercices_majrour.txt';
                                        } else if (strstr($DetailsExercice, 'ظرف_مكان')) {
                                            $file = 'data/exercices_dharf_maken.txt';
                                        } else if (strstr($DetailsExercice, 'حال')) {
                                            $file = 'data/exercices_7al.txt';
                                        }


                                        $current = file_get_contents($file);
                                        $current .= $DetailsExercice . "\n";
                                        if (file_put_contents($file, $current)) {
                                            echo 'تم حفظ التمرين.';
                                        } else {
                                            echo 'لم يتم حفظ التمرين';
                                        }
                                        echo '<br><a href=./index.php><br><input type = button value="رجوع"></a>';
                                        break;

                                    //--------------------------------------------------------------
                                    case HOUROUF_DISPLAY_HARF:
                                        echo $hourouf[$choosedToken];
                                        break;
                                }
                                ?>
                            </div>
                            </td>
                            </tr>
                            </table>
                            </body>
                            </html>



