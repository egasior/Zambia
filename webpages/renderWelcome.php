<?php
   global $participant,$message,$message_error,$message2,$congoinfo;
   //error_log("Zambia: Reached renderWelcome.php"); 
   $title="Participant View";
   require_once('PartCommonCode.php');
   participant_header($title);
   getCongoData($badgeid);

    if ($message_error!="") { 
        echo "<P class=\"errmsg\">$message_error</P>\n";
        }
    if ($message!="") {
        echo "<P class=\"regmsg\">$message</P>\n";
        }
    $chpw=($participant["password"]=="4cb9c8a8048fd02294477fcb1a41191a");
    $chint=($participant["interested"]==0);
    if (may_I('postcon')) { ?>
<P>Thank you for your participation in Arisia '10.  With your help it was a great con.  We look forward 
to your participation again next year.</P>
<P>We will post instructions for participating in brainstorming for Arisia '11 soon.</P>
<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--Arisia Program and Events Committees</P>
<?php
    participant_footer();
    exit();
    } ?>

<p><h3> Please check back often as more options will become available as we get closer to the convention. </h3>

<P> Dear
<?php echo $congoinfo["firstname"]; echo " "; echo $congoinfo["lastname"]; ?>,

<p> Welcome to the <?php echo CON_NAME; ?> Programming website.

<p> First, please take a moment to indicate your ability and interest in partipating in <?php echo CON_NAME; ?> programming.
<FORM class="nomargin" name="pwform" method=POST action="SubmitWelcome.php">
  <div id="update_section">
      <table><tr><td>&nbsp;&nbsp;&nbsp;</td>
      <td><label for="interested" class="padbot0p5">I am interested and able to participate in programming for <?php echo CON_NAME; ?> &nbsp;</label>
      <?php $int=$participant['interested']; ?>
      <SELECT name=interested class="yesno">
            <OPTION value=0 <?php if ($int==0) {echo "selected";} ?> >&nbsp;</OPTION>
            <OPTION value=1 <?php if ($int==1) {echo "selected";} ?> >Yes</OPTION>
            <OPTION value=2 <?php if ($int==2) {echo "selected";} ?> >No</OPTION></SELECT>
      </td></tr></table>
<?php if ($chpw) { ?>
    <p>Now take a moment and personalize your password.
      <table><tr><td>&nbsp;&nbsp;&nbsp;</td>
      <td>Change Password</td>
      <td><INPUT type="password" size="10" name="password"></td></tr>
      <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Confirm New Password&nbsp;</td>
      <td><INPUT type="password" size="10" name="cpassword"></td></tr></table>
<?php } else { ?>
    <p> Thank you for changing your password. For future changes, use the "My Profile" tab.
<?php } ?>
    <DIV class="submit">
        <DIV id="submit" ><BUTTON class="SubmitButton" type="submit" name="submit" >Update</BUTTON></DIV>
      </DIV>
    </DIV>
  </FORM>
  <p> Use the "My Profile" tab to:
    <ul>
      <li> Check your contact information. </li>
      <li> Indicate whether you will be participating in <?php echo 
CON_NAME; ?>. </li>
      <li> Edit your name as you want to appear in our publications.</li>
      <li> Enter a short bio for <?php echo CON_NAME; ?> publications.</li>
    </ul>

<?php if (may_I('search_panels')) { ?>
  <p> Use the "Search Panels" tab to:
    <ul>
      <li> See suggested topics for <?php echo CON_NAME; ?> programming. </li>
      <li> Indicate panels you would like to participate on. </li>
    </ul>
<?php } else { ?>
  <p> The "Search Panels" tab is currently unavailable.  Check back later.
<?php } ?>

<?php if (may_I('my_panel_interests')) { ?>
  <p> Use the "My Panel Interests" tab to:
    <ul>
      <li> See what selections you have made for panels. </li>
      <li> Alter or give more information about your selections . </li>
      <li> Rank the preference of your selections . </li>
    </ul>
<?php } else { ?>
  <p> The "My Panel Interests" tab is currently unavailable.  Check back later.
<?php } ?>

<?php if (may_I('my_schedule')) { ?>
  <p> Use the "My Schedule" tab to:
    <ul>
      <li> See what you have been scheduled to do at con. 
      <li> If there are issues, conflict or questions please email us at 
<a href="mailto: <?php echo PROGRAM_EMAIL; ?>"><?php echo PROGRAM_EMAIL; ?> </a>
    </ul>
<?php } else { ?>
  <p> The "My Schedule" tab is currently unavailable.  Check back later.
<?php } ?>

<?php if (may_I('my_gen_int_write')) { ?>
  <p> Use the "My General Interests" tab to:  
    <ul>
      <li> Describe the kinds of panels you are interested in.  </li>
      <li> Suggest the people you would like to work with.  </li>
    </ul>
<?php } else { ?>
  <p> Use the "My General Interests" tab to:  
    <ul>
      <li> See what you previously entered as your interests. 
      <li> This is currently read only as con is approaching.  If you need to make a change here, please email us:  <a href="mailto: <?php echo PROGRAM_EMAIL; ?>"><?php echo PROGRAM_EMAIL; ?> </a>
    </ul>
<?php } ?>

<?php if (may_I('BrainstormSubmit')) { ?>
  <p> Use the "Suggest a Session" tab to:  
    <ul>
      <li> Enter the brainstorming view where you can submit panel, workshop and presentation ideas.
      <li> You can return back to this page by clicking on "Participant View" tab in the upper right corner. 
    </ul>
<?php } else { ?>
  <p> The "Suggest a Session" tab is currently unavailable.  Brainstorming is over.  If you have an urgent request please email us at <a href="mailto: <?php echo PROGRAM_EMAIL; ?>"><?php echo PROGRAM_EMAIL; ?> </a>
<?php } ?>

</ol>

<p>Thank you for your time, and we look forward to seeing you at <?php echo CON_NAME; ?>. 
<p>- <a href="mailto: <?php echo PROGRAM_EMAIL; ?>"><?php echo PROGRAM_EMAIL; ?> </a> </P>
<?php participant_footer(); ?>
