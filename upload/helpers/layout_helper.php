<?php
// Header Creation Function
function stdhead($title = "")
{
    global $site_config, $CURUSER, $THEME, $LANGUAGE; //Define globals
    //site online check
    if (!$site_config["SITE_ONLINE"]) {
        if ($CURUSER["control_panel"] != "yes") {
            echo '<br /><br /><br /><center>' . stripslashes($site_config["OFFLINEMSG"]) . '</center><br /><br />';
            die;
        } else {
            echo '<br /><br /><br /><center><b><font color="#ff0000">SITE OFFLINE, STAFF ONLY VIEWING! DO NOT LOGOUT</font></b><br />If you logout please edit config/config.php and set SITE_ONLINE to true </center><br /><br />';
        }
    }
    //end check

    if (!$CURUSER) {
        guestadd();
    }

    if ($title == "") {
        $title = $site_config['SITENAME'];
    } else {
        $title = $site_config['SITENAME'] . " : " . htmlspecialchars($title);
    }

    require_once "views/themes/" . $THEME . "/header.php";
}
// End of page creation function
function stdfoot()
{
    global $site_config, $CURUSER, $THEME, $LANGUAGE;
    require_once "views/themes/" . $THEME . "/footer.php";
}

//BEGIN FRAME
function begin_frame($caption = "-", $align = "justify")
{
    global $THEME, $site_config;

    $blockId = 'f-' . sha1($caption);
    ?>
    <div class="card">
        <div class="card-header">
            <?php echo $caption ?>
        </div>
        <div class="card-body">
    <?php
}

//END FRAME
function end_frame()
{
    global $THEME, $site_config;
    ?>
        </div>
    </div><br />
    <?php
}

// Table Construction
function begin_table()
{
    print("<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"ttable_headouter\" width=\"100%\"><tr><td><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"ttable_headinner\" width=\"100%\">\n");
}
// Table End
function end_table()
{
    print("</table></td></tr></table>\n");
}
// Line function
function tr($x, $y, $noesc = 0)
{
    if ($noesc) {
        $a = $y;
    } else {
        $a = htmlspecialchars($y);
        $a = str_replace("\n", "<br />\n", $a);
    }
    print("<tr><td class=\"heading\" valign=\"top\" align=\"right\">$x</td><td valign=\"top\" align=\"left\">$a</td></tr>\n");
}
