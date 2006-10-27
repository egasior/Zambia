<?php
    function RenderPrecis() {
      global $result,$title; 
      require_once('db_functions.php');
      require_once('StaffHeader.php');
      require_once('StaffFooter.php');
      require_once('StaffCommonCode.php');
      staff_header($title);
?>
    <H2>Generated by Zambia: <?php echo date('d-M-Y h:i A'); ?> </H2>
    <p> This is the list of panels that need participant signup.  The mailing is occuring this week.  If you wish to be a panelists on any of these panels and do not receive anything via e-mail or paper mail, please contact 
        <a href="mailto:<?php echo 
BRAINSTORM_EMAIL; ?>"><?php echo BRAINSTORM_EMAIL; ?></a>.  
    <p> This reports contains session id, track, title, duration, as well as proposed pocket program text and additional notes for participants.
        <p><b> Note: </b> Some panels are not in this list because we have located a specific presenter with whom we are working.  We will be firming up those details shortly, if you are on the list, stay tuned. </p>
<hr>
       
    <TABLE>
        <COL><COL><COL><COL><COL><COL>
<!--        <TR>
            <TH rowspan=3 class="y1">Sess.<BR>ID</TH>
            <TH class="y2">Track</TH>
            <TH class="y2">Title</TH>
            <TH class="y3">Duration</TH>
            </TR>
        <TR><TH colspan=3 class="y4">Pocket Program Notes</TH></TR>
        <TR><TH colspan=3 class="y5">Prospective Participant Info</TH></TR>
        <TR><TD>&nbsp;</TD></TR>
-->
<?php
    while (list($sessionid,$trackname,$title,$duration,$estatten,$progguiddesc, $persppartinfo)= mysql_fetch_array($result, MYSQL_NUM)) {
        echo "        <TR>\n";
        echo "            <TD rowspan=3 class=\"border0000\" id=\"sessidtcell\"><b>".$sessionid."&nbsp;&nbsp;</TD>\n";
        echo "            <TD class=\"border0000\"><b>".$trackname."</TD>\n";
        echo "            <TD class=\"border0000\"><b>".htmlspecialchars($title,ENT_NOQUOTES)."</TD>\n";
        echo "            <TD class=\"border0000\"><b>".$duration." hr</TD>\n";
        echo "            </TR>\n";
        echo "        <TR><TD colspan=3 class=\"border0010\">".htmlspecialchars($progguiddesc,ENT_NOQUOTES)."</TD></TR>\n";
        echo "        <TR><TD colspan=3 class=\"border0000\">".htmlspecialchars($persppartinfo,ENT_NOQUOTES)."</TD></TR>\n";
        echo "        <TR><TD colspan=5 class=\"border0020\">&nbsp;</TD></TR>\n";
        echo "        <TR><TD colspan=5 class=\"border0000\">&nbsp;</TD></TR>\n";
        }
?>
        </TABLE>
<?php
  staff_footer();  }
?>
