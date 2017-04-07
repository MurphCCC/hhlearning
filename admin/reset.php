<?PHP

$dbh=mysql_connect ("updater.db.6526174.hostedresource.com", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater");

?>



<?PHP if ($_REQUEST["resetdata"]) : 



  $result = mysql_query("UPDATE `students` SET `C1TEACHER` = NULL, `C1COURSE` = NULL, `C1GRADE` = NULL, `C1FEEDBACK` = NULL, 

                                               `C2TEACHER` = NULL, `C2COURSE` = NULL, `C2GRADE` = NULL, `C2FEEDBACK` = NULL,

                                               `C3TEACHER` = NULL, `C3COURSE` = NULL, `C3GRADE` = NULL, `C3FEEDBACK` = NULL,

                                               `C4TEACHER` = NULL, `C4COURSE` = NULL, `C4GRADE` = NULL, `C4FEEDBACK` = NULL,

                                               `C5TEACHER` = NULL, `C5COURSE` = NULL, `C5GRADE` = NULL, `C5FEEDBACK` = NULL,

                                               `C6TEACHER` = NULL, `C6COURSE` = NULL, `C6GRADE` = NULL, `C6FEEDBACK` = NULL,

                                               `C7TEACHER` = NULL, `C7COURSE` = NULL, `C7GRADE` = NULL, `C7FEEDBACK` = NULL")

      or die("Couldn't reset semester.");

?>



<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<META HTTP-EQUIV="Refresh"

      CONTENT="5; URL=index.php">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" maginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> 

      <p align="right"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Success</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><p><br>

              You have successfully Reset the Semeter database.<br>

              You will be redirected to the Administrator page in 5 seconds.</p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td>

<p>&nbsp;</p>

            </td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>© 

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>





















<?PHP else : ?>

<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" maginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> <p align="right"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Semester 

            Reset </em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><font size="3" face="Garamond"><br>

            By selecting the reset button below you will reset the information 

            associated with each student.<br>

            If you wish not to reset the information select the NO button below.</font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td> <p><br>

            </p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="220"><form name="form1" method="post" action="<?PHP print "$PHP_SELF";?>">

                    <input type="submit" name="resetdata" value="RESET SEMESTER">

                  </form></td>

                <td><form><input type="button" value="NO" onClick="history.back()"></form>

		</td>

              </tr>

            </table></td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>© 

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>



<?PHP endif;?>