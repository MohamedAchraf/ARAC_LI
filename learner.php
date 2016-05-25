<?php
include_once './exercices.php';

$action = isset($_GET['action']) ? $_GET['action'] : 0;
$exerciceNumber = isset($_GET['exerciceNumber']) ? $_GET['exerciceNumber'] : 0;
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 1;

define('EXERCICES_LIST', 0);
define('EXERCICE_DISPALY', 1);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/ico" href="images/arac.ico" />
        <link rel=stylesheet href=./CSS/ARACstyle.css>
        <script src="./JS/ARAC_JS.js"></script>
        <script src="./jquery_smoothness/external/jquery/jquery.js"></script>
        <script src="./jquery_smoothness/jquery-ui.js"></script>       
        <link href="./jquery_smoothness/jquery-ui.css" rel="stylesheet">

        <title>ARAC</title>   
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
        <?php
        switch ($action) {
            case EXERCICES_LIST:
                echo '<table border="0" width="420" cellspacing=7>';
                echo '<font face="traditional arabic" size="6">';

                //------------------- Gathering Exercises by type
                $file_tasrif = 'data/exercices_tasrif.txt';
                $file_jarr = 'data/exercices_jarr.txt';
                $file_dhamir = 'data/exercices_dhamir.txt';
                $file_moubtada_khabar = 'data/exercices_moubtada_khabar.txt';
                $file_isteenef = 'data/exercices_isteenef.txt';
                $file_istifham = 'data/exercices_istifham.txt';
                $file_isti9bel = 'data/exercices_isti9bel.txt';
                $file_ism_ishara = 'data/exercices_ism_ishara.txt';
                $file_ta79i9 = 'data/exercices_ta79i9.txt';
                $file_kana = 'data/exercices_kana.txt';
                $file_nese5 = 'data/exercices_nese5.txt';
                $file_nidaa = 'data/exercices_nidaa.txt';
                $file_maousoul = 'data/exercices_maousoul.txt';
                $file_3atf = 'data/exercices_3atf.txt';
                $file_chart = 'data/exercices_chart.txt';
                $file_raf3 = 'data/exercices_raf3.txt';
                $file_fa3il = 'data/exercices_fa3il.txt';
                $file_maf3oul_bihi = 'data/exercices_maf3oul_bihi.txt';
                $file_na3ti = 'data/exercices_na3ti.txt';
                $file_idhafi = 'data/exercices_idhafi.txt';
                $file_majrour = 'data/exercices_majrour.txt';
                $file_dharf_maken = 'data/exercices_dharf_maken.txt';
                $file_7al = 'data/exercices_7al.txt';


                $exercice_tasrif = preg_split('/[\n]/', file_get_contents($file_tasrif));
                $exercice_jarr = preg_split('/[\n]/', file_get_contents($file_jarr));
                $exercice_dhamir = preg_split('/[\n]/', file_get_contents($file_dhamir));
                $exercice_moubtada_khabar = preg_split('/[\n]/', file_get_contents($file_moubtada_khabar));
                $exercice_isteenef = preg_split('/[\n]/', file_get_contents($file_isteenef));
                $exercice_istifham = preg_split('/[\n]/', file_get_contents($file_istifham));
                $exercice_isti9bel = preg_split('/[\n]/', file_get_contents($file_isti9bel));
                $exercice_ism_ishara = preg_split('/[\n]/', file_get_contents($file_ism_ishara));
                $exercice_ta79i9 = preg_split('/[\n]/', file_get_contents($file_ta79i9));
                $exercice_kana = preg_split('/[\n]/', file_get_contents($file_kana));
                $exercice_nese5 = preg_split('/[\n]/', file_get_contents($file_nese5));
                $exercice_nidaa = preg_split('/[\n]/', file_get_contents($file_nidaa));
                $exercice_maousoul = preg_split('/[\n]/', file_get_contents($file_maousoul));
                $exercice_3atf = preg_split('/[\n]/', file_get_contents($file_3atf));
                $exercice_chart = preg_split('/[\n]/', file_get_contents($file_chart));
                $exercice_raf3 = preg_split('/[\n]/', file_get_contents($file_raf3));
                $exercice_fa3il = preg_split('/[\n]/', file_get_contents($file_fa3il));
                $exercice_maf3oul_bihi = preg_split('/[\n]/', file_get_contents($file_maf3oul_bihi));
                $exercice_na3ti = preg_split('/[\n]/', file_get_contents($file_na3ti));
                $exercice_idhafi = preg_split('/[\n]/', file_get_contents($file_idhafi));
                $exercice_majrour = preg_split('/[\n]/', file_get_contents($file_majrour));
                $exercice_7al = preg_split('/[\n]/', file_get_contents($file_7al));
                $exercice_dharf_maken = preg_split('/[\n]/', file_get_contents($file_dharf_maken));





                //------------------- Counting Exercises for every theme
                $ind_tasrif = 0;
                $ind_jarr = 0;
                $ind_dhamir = 0;
                $ind_moubtada = 0;
                $ind_isteenef = 0;
                $ind_istifham = 0;
                $ind_isti9bel = 0;
                $ind_ism_ishara = 0;
                $ind_ta79i9 = 0;
                $ind_kana = 0;
                $ind_nese5 = 0;
                $ind_nidaa = 0;
                $ind_maousoul = 0;
                $ind_3atf = 0;
                $ind_chart = 0;
                $ind_raf3 = 0;
                $ind_fa3il = 0;
                $ind_maf3oul_bihi = 0;
                $ind_na3ti = 0;
                $ind_idhafi = 0;
                $ind_majrour = 0;
                $ind_7al = 0;
                $ind_dharf_maken = 0;


                for ($i = 0; $i < count($exercice_tasrif); $i++) {
                    if ($exercice_tasrif[$i] !== "" && strpos($exercice_tasrif[$i], 'فعل_')) {
                        $ind_tasrif++;
                    }
                }

                for ($i = 0; $i < count($exercice_jarr); $i++) {
                    if ($exercice_jarr[$i] !== "" && strpos($exercice_jarr[$i], 'جار')) {
                        $ind_jarr++;
                    }
                }

                for ($i = 0; $i < count($exercice_dhamir); $i++) {
                    if ($exercice_dhamir[$i] !== "" && strpos($exercice_dhamir[$i], 'ضمير')) {
                        $ind_dhamir++;
                    }
                }

                for ($i = 0; $i < count($exercice_moubtada_khabar); $i++) {
                    if ($exercice_moubtada_khabar[$i] !== "" && strpos($exercice_moubtada_khabar[$i], 'مبتدأ')) {
                        $ind_moubtada++;
                    }
                }

                for ($i = 0; $i < count($exercice_isteenef); $i++) {
                    if ($exercice_isteenef[$i] !== "" && strpos($exercice_isteenef[$i], 'استأناف')) {
                        $ind_isteenef++;
                    }
                }

                for ($i = 0; $i < count($exercice_istifham); $i++) {
                    if ($exercice_istifham[$i] !== "" && strpos($exercice_istifham[$i], 'استفهام')) {
                        $ind_istifham++;
                    }
                }

                for ($i = 0; $i < count($exercice_isti9bel); $i++) {
                    if ($exercice_isti9bel[$i] !== "" && strpos($exercice_isti9bel[$i], 'استقبال')) {
                        $ind_isti9bel++;
                    }
                }

                for ($i = 0; $i < count($exercice_ism_ishara); $i++) {
                    if ($exercice_ism_ishara[$i] !== "" && strpos($exercice_ism_ishara[$i], 'إشارة')) {
                        $ind_ism_ishara++;
                    }
                }

                for ($i = 0; $i < count($exercice_ta79i9); $i++) {
                    if ($exercice_ta79i9[$i] !== "" && strpos($exercice_ta79i9[$i], 'تحقيق')) {
                        $ind_ta79i9++;
                    }
                }

                for ($i = 0; $i < count($exercice_kana); $i++) {
                    if ($exercice_kana[$i] !== "" && strpos($exercice_kana[$i], 'كان_وأخواتها')) {
                        $ind_kana++;
                    }
                }

                for ($i = 0; $i < count($exercice_nese5); $i++) {
                    if ($exercice_nese5[$i] !== "" && strpos($exercice_nese5[$i], 'ناسخ')) {
                        $ind_nese5++;
                    }
                }

                for ($i = 0; $i < count($exercice_nidaa); $i++) {
                    if ($exercice_nidaa[$i] !== "" && strpos($exercice_nidaa[$i], 'نداء')) {
                        $ind_nidaa++;
                    }
                }

                for ($i = 0; $i < count($exercice_maousoul); $i++) {
                    if ($exercice_maousoul[$i] !== "" && strpos($exercice_maousoul[$i], 'اسم_موصول')) {
                        $ind_maousoul++;
                    }
                }

                for ($i = 0; $i < count($exercice_3atf); $i++) {
                    if ($exercice_3atf[$i] !== "" && strpos($exercice_3atf[$i], 'حرف_عطف')) {
                        $ind_3atf++;
                    }
                }

                for ($i = 0; $i < count($exercice_chart); $i++) {
                    if ($exercice_chart[$i] !== "" && strpos($exercice_chart[$i], 'شرط')) {
                        $ind_chart++;
                    }
                }

                for ($i = 0; $i < count($exercice_raf3); $i++) {
                    if ($exercice_raf3[$i] !== "" && strpos($exercice_raf3[$i], 'ضمير_رفع')) {
                        $ind_raf3++;
                    }
                }

                for ($i = 0; $i < count($exercice_fa3il); $i++) {
                    if ($exercice_fa3il[$i] !== "" && strpos($exercice_fa3il[$i], 'فاعل')) {
                        $ind_fa3il++;
                    }
                }

                for ($i = 0; $i < count($exercice_maf3oul_bihi); $i++) {
                    if ($exercice_maf3oul_bihi[$i] !== "" && strpos($exercice_maf3oul_bihi[$i], 'مفعول_به')) {
                        $ind_maf3oul_bihi++;
                    }
                }

                for ($i = 0; $i < count($exercice_na3ti); $i++) {
                    if ($exercice_na3ti[$i] !== "" && strpos($exercice_na3ti[$i], 'نعت_ومنعوت')) {
                        $ind_na3ti++;
                    }
                }

                for ($i = 0; $i < count($exercice_idhafi); $i++) {
                    if ($exercice_idhafi[$i] !== "" && strpos($exercice_idhafi[$i], 'مضاف_ومضاف_إليه')) {
                        $ind_idhafi++;
                    }
                }

                for ($i = 0; $i < count($exercice_majrour); $i++) {
                    if ($exercice_majrour[$i] !== "" && strpos($exercice_majrour[$i], 'مجرور')) {
                        $ind_majrour++;
                    }
                }

                for ($i = 0; $i < count($exercice_7al); $i++) {
                    if ($exercice_7al[$i] !== "" && strpos($exercice_7al[$i], 'حال')) {
                        $ind_7al++;
                    }
                }

                for ($i = 0; $i < count($exercice_dharf_maken); $i++) {
                    if ($exercice_dharf_maken[$i] !== "" && strpos($exercice_dharf_maken[$i], 'ظرف_مكان')) {
                        $ind_dharf_maken++;
                    }
                }



                //----------------------------------- Display Exercises groups
                echo '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=1>تصريف أفعال<br>[' . $ind_tasrif . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=2>حروف الجرّ<br>[' . $ind_jarr . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=3>الضمائر<br>[' . $ind_dhamir . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=15>شرط<br>[' . $ind_chart . ']</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=5>استأناف<br>[' . $ind_isteenef . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=6>استفهام<br>[' . $ind_istifham . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=7>استقبال<br>[' . $ind_isti9bel . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=8>إسم إشارة<br>[' . $ind_ism_ishara . ']</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=9>تحقيق<br>[' . $ind_ta79i9 . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=10>كان وأخواتها<br>[' . $ind_kana . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=11>ناسخ<br>[' . $ind_nese5 . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=12>نداء<br>[' . $ind_nidaa . ']</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=13>إسم موصول<br>[' . $ind_maousoul . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=14>حرف عطف<br>[' . $ind_3atf . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=4>مبتدأ و خبر<br>[' . $ind_moubtada . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=17>فاعل<br>[' . $ind_fa3il . ']</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=18>مفعول به<br>[' . $ind_maf3oul_bihi . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=19>مركّب نعتي<br>[' . $ind_na3ti . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=20>مركّب إضافي<br>[' . $ind_idhafi . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=21>مركّب بالجرّ<br>[' . $ind_majrour . ']</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=22>ظرف مكان<br>[' . $ind_dharf_maken . ']</a></td>'
                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=23>حال<br>[' . $ind_7al . ']</a></td>'
//                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
//                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=20>مركّب إضافي<br>[' . $ind_idhafi . ']</a></td>'
//                . '<td style="background-image:url(./images/folder.png);" width=105 height=100 align=center>'
//                . '<br><a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=21>مركّب بالجرّ<br>[' . $ind_majrour . ']</a></td>'
                . '</tr>'
                ;
                //-----------------------------------------------
                echo '</table>';
                break;

            case EXERCICE_DISPALY:

                echo '<table border= 0 width = 777 class="bordered"  cellpadding=3 bgcolor=#fff>';
                $displayedEexerciseNumber = $exerciceNumber + 1;
                echo '<tr><th align=right><font face="traditional arabic" size="6">'
                . 'تمرين رقـم : ' . $displayedEexerciseNumber . '</u></th></tr>';
                $exercice = new exercices();
                $listOfSentences = array();
                $token = "";

                $file = "";

                if ($categorie == '1') {
                    $file = 'data/exercices_tasrif.txt';
                } else if ($categorie == '2') {
                    $file = 'data/exercices_jarr.txt';
                } else if ($categorie == '3') {
                    $file = 'data/exercices_dhamir.txt';
                } else if ($categorie == '4') {
                    $file = 'data/exercices_moubtada_khabar.txt';
                } else if ($categorie == '5') {
                    $file = 'data/exercices_isteenef.txt';
                } else if ($categorie == '6') {
                    $file = 'data/exercices_istifham.txt';
                } else if ($categorie == '7') {
                    $file = 'data/exercices_isti9bel.txt';
                } else if ($categorie == '8') {
                    $file = 'data/exercices_ism_ishara.txt';
                } else if ($categorie == '9') {
                    $file = 'data/exercices_ta79i9.txt';
                } else if ($categorie == '10') {
                    $file = 'data/exercices_kana.txt';
                } else if ($categorie == '11') {
                    $file = 'data/exercices_nese5.txt';
                } else if ($categorie == '12') {
                    $file = 'data/exercices_nidaa.txt';
                } else if ($categorie == '13') {
                    $file = 'data/exercices_maousoul.txt';
                } else if ($categorie == '14') {
                    $file = 'data/exercices_3atf.txt';
                } else if ($categorie == '15') {
                    $file = 'data/exercices_chart.txt';
                } else if ($categorie == '16') {
                    $file = 'data/exercices_raf3.txt';
                } else if ($categorie == '17') {
                    $file = 'data/exercices_fa3il.txt';
                } else if ($categorie == '18') {
                    $file = 'data/exercices_maf3oul_bihi.txt';
                } else if ($categorie == '19') {
                    $file = 'data/exercices_na3ti.txt';
                } else if ($categorie == '20') {
                    $file = 'data/exercices_idhafi.txt';
                } else if ($categorie == '21') {
                    $file = 'data/exercices_majrour.txt';
                } else if ($categorie == '22') {
                    $file = 'data/exercices_dharf_maken.txt';
                } else if ($categorie == '23') {
                    $file = 'data/exercices_7al.txt';
                }

                $result = preg_split('/[,]/', preg_split('/[\n]/', file_get_contents($file))[$exerciceNumber]);

                for ($i = 0; $i < count($result); $i++) {
                    if ($i < count($result) - 2) {
                        $listOfSentences[$i] = $result[$i];
                    } else if ($i == count($result) - 2) {
                        $token = $result[$i];
                    } else if ($i == count($result) - 1) {
                        $exercice_type = $result[$i];
                    }
                }
                //-------------------Display question        
                if (strstr($token, 'فعل') !== FALSE) {
                    if ($exercice_type == 1) {
                        $tense = preg_split('/[\\s]+/', str_replace('_', ' ', $token));
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتصريف الأفعال التّالية في زمن';
                        for ($index = 1; $index < count($tense); $index++) {
                            echo ' ال' . $tense[$index];
                        }
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الأفعال في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('جار', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف الجرّ المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حروف الجرّ في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('ضمير', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بالضمير المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الضمائر في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('مبتدأ', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط المبتدأ في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد المبتدأ في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('خبر', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط الخبر في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الخبر في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('استأناف', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف الإستأناف المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حروف الإستأناف في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('استفهام', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف الإستفهام المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حروف الإستفهام في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('استقبال', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف الإستقبال المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حروف الإستقبال في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('اسم_إشارة', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بإسم الإشارة المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد إسم الإشارة في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('تحقيق', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف التحقيق المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حرف التحقيق في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('كان_وأخواتها', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بكان وأخواتها';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد كان وأخواتها في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('ناسخ', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بالناسخ المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الناسخ في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('نداء', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف النداء المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حرف النداء في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('اسم_موصول', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بالإسم الموصول المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الإسم الموصول في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('حرف_عطف', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف العطف المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حرف العطف في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('شرط', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بحرف الشرط المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد حرف الشرط في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('ضمير_رفع', $token) !== FALSE) {
                    if ($exercice_type == 1) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بملء الفراغات بضمير الرفع المناسب';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد ضمير الرفع في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('فاعل', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط الفاعل في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد الفاعل في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('فاعل', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط المفعول به في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد المفعول به في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('نعت_ومنعوت', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط المركّب النعتي في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد المركّب النعتي في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('مضاف_ومضاف_إليه', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط المركّب الإضافي في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد المركّب الإضافي في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('مجرور', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط المركّب بالجرّ  في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد المركّب بالجرّ  في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('ظرف_مكان', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط  ظرف المكان في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد ظرف المكان في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                } else if (strstr('حال', $token) !== FALSE) {
                    if ($exercice_type == 3) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بربط   الحال في الجمل التالية';
                    } else if ($exercice_type == 2) {
                        echo '<tr><td bgcolor=#e1e1e1><font face="traditional arabic" size="6">'
                        . '<b>' . 'قم بتحديد  الحال في الجمل التالية';
                    }
                    echo ' :</b></td></tr>';
                }



                //------------------- Display sentences
                echo '<tr><td><font face="traditional arabic" size="6">';
                switch ($exercice_type) {
                    case 1:
                        $exercice->displayBlankFillingExercice($listOfSentences, $token);
                        break;
                    case 2:
                        $exercice->displaySelectableExercice($listOfSentences, $token);
                        break;
                    case 3:
                        $exercice->displayDroppableExercice($listOfSentences, $token);
                        break;
                }
                echo '<br></td></tr>';
                //-----------------
                $nextExercice = $exerciceNumber + 1;
                if ($nextExercice >= count(preg_split('/[\n]/', file_get_contents($file))) - 1) {
                    $nextExercice = 0;
                }
                $previousExercice = $exerciceNumber - 1;
                if ($previousExercice < 0) {
                    $previousExercice = count(preg_split('/[\n]/', file_get_contents($file))) - 2;
                }
                //-----------------
                echo '<tr><td align=center bgcolor=#e1e1e1>';
                echo '<a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=' . $categorie . '&exerciceNumber=' . $nextExercice . '><img src=./images/next.png border=0></a>'
                . '&nbsp;&nbsp; '
                . '<a href=learner.php><img src=./images/top.png border=0></a>'
                . '&nbsp;&nbsp; '
                . '<a href=' . $_SERVER['PHP_SELF'] . '?action=1&categorie=' . $categorie . '&exerciceNumber=' . $previousExercice . '><img src=./images/previous.png border=0></a>'
                . '</td></tr>';
                break;
        }
        ?>
    </body>
</html>
