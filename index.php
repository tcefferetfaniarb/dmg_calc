<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset ="utf-8">
    <title>Outward Damage Calculator</title>
    <style></style>
    <link href="css/dmgcalc.css" rel="stylesheet" type="text/css">
    <link href="dist/css/select2.min.css" rel="stylesheet" />
    <script src="dist/js/select2.min.js"></script>
</head>
<body>
<div id="corps">
    <!--left part-->
    <div id="gauche">
        <div type="button" id="selectioneurg">
            <!--body part-->
            <div id="stuffer">
                <!--ALL STUFF'S PARTS-->
                <div id="caseprimarme">
                    <?php
                    require 'mysql.php';
                    require 'ennemy.php';
                    $pdo=connectMySQL();
                    $queryprimary = $pdo->query("SELECT * FROM `weapons` WHERE type='primary'");
                    $primaresult = $queryprimary->fetchAll();
                    print("<form id='selprima'>");
                    print("<select name='id_weapon' id=\"selweapon\" class=\"primaselect\">");
                    print("<option id=\"currentprima\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($primaresult as $key => $variable)
                    {
                        print("<option id=\"currentprima\" value=\"".$primaresult[$key]['imageid']."\">".$primaresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="casehelmet" class="droite">
                    <?php
                    $queryhelmet = $pdo->query("SELECT * FROM `armor` WHERE type='helmet'");
                    $helmetresult = $queryhelmet->fetchAll();
                    print("<form id= 'selfhelmet'>");
                    print("<select name='id_helmet' id=\"selhelmet\" class=\"helmetselect\">");
                    print("<option id=\"currenthelmet\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($helmetresult as $key => $variable)
                    {
                        print("<option id=\"currenthelmet\" value=\"".$helmetresult[$key]['imageid']."\">".$helmetresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="casesndarme">
                    <?php
                    $querysecond = $pdo->query("SELECT * FROM `weapons` WHERE type='secondary'");
                    $secondresult = $querysecond->fetchAll();
                    print("<form id= 'selfsecond'>");
                    print("<select name='id_second' id=\"selsecond\" class=\"secondselect\">");
                    print("<option id=\"currentsecond\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($secondresult as $key => $variable)
                    {
                        print("<option id=\"currentsecond\" value=\"".$secondresult[$key]['imageid']."\">".$secondresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="casearmor" class="droite">
                    <?php
                    $querybody = $pdo->query("SELECT * FROM `armor` WHERE type='body'");
                    $bodyresult = $querybody->fetchAll();
                    print("<form id= 'selfbody'>");
                    print("<select name='id_body' id=\"selbody\" class=\"bodyselect\">");
                    print("<option id=\"currentbody\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($bodyresult as $key => $variable)
                    {
                        print("<option id=\"currentbody\" value=\"".$bodyresult[$key]['imageid']."\">".$bodyresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="casearrow">
                    <?php
                    $queryarrow = $pdo->query("SELECT * FROM `weapons` WHERE type='ammo'");
                    $arrowresult = $queryarrow->fetchAll();
                    print("<form id= 'selfarrow'>");
                    print("<select name='id_arrow' id=\"selarrow\" class=\"arrowselect\">");
                    print("<option id=\"currentarrow\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($arrowresult as $key => $variable)
                    {
                        print("<option id=\"currentarrow\" value=\"".$arrowresult[$key]['imageid']."\">".$arrowresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="casebackpack" class="droite">
                    <?php
                    $querybackpack = $pdo->query("SELECT * FROM `armor` WHERE type='backpack'");
                    $backpackresult = $querybackpack->fetchAll();
                    print("<form id= 'selfbackpack'>");
                    print("<select name='id_backpack' id=\"selbackpack\" class=\"backpackselect\">");
                    print("<option id=\"currentbackpack\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($backpackresult as $key => $variable)
                    {
                        print("<option id=\"currentbackpack\" value=\"".$backpackresult[$key]['imageid']."\">".$backpackresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
                <div id="caseboot" class="droite">
                    <?php
                    $queryboot = $pdo->query("SELECT * FROM `armor` WHERE type='boot'");
                    $bootresult = $queryboot->fetchAll();
                    print("<form id= 'selfboot'>");
                    print("<select name='id_boot' id=\"selboot\" class=\"bootselect\">");
                    print("<option id=\"currentboot\" value=\"---\">---</option>");
                    echo ('loop arrived');
                    foreach ($bootresult as $key => $variable)
                    {
                        print("<option id=\"currentboot\" value=\"".$bootresult[$key]['imageid']."\">".$bootresult[$key]['nom']."</option>");
                    }
                    print("</select>");
                    print("</form>");
                    ?>
                </div>
            </div>
            <div class="extend" id="extend">

            </div>
        </div>
    </div>
    <!--right part-->
    <div id="droite">
        <div type="button" id="selectioneurd">
            <div class="selecteur">
                <?php
                /*ennemy selector*/
                $queryennemy = $pdo->query("SELECT * FROM `ennemy`");
                $resultat = $queryennemy->fetchAll();
                print("<form id= 'selfor'>");
                print("<select name='id_ennemy' id=\"selennemy\" class=\"ennemyselect\">");
                print("<option id=\"currentennemy\" value=\"---\">---</option>");
                foreach ($resultat as $key => $variable)
                {
                    print("<option id=\"currentennemy\" value=\"".$resultat[$key]['imageid']."\">".$resultat[$key]['Nom']."</option>");
                }
                print("</select>");
                print("</form>");
                ?>
                <div id="displayennemy">

                </div>
                <div class="statennemy">
                    <div id="nom-stat">
                        <p>PV         :</p>
                        <p>Protection :</p>
                        <p>Barrier    :</p>
                        <p>resistance :</p>
                    </div>
                    <div class="real-stat" id="real-stat">

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<div id="resulteur">
    <!--123123123-->
    <!--123123123-->
    <h2 name="result">DMG = </h2>
    <h1 id="msg">NAN&nbsp;</h1>
    <h2> PV </h2>
</div>


<script src="dmgcalc.js"></script>
</body>
</html>