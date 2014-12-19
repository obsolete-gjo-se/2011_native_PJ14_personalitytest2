<?php include '../../mimes/includes/_central.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de"><!-- InstanceBegin template="/Templates/master.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<title>
<?php /*?><?php echo $row_Allgemein['Meta Titel']; ?><?php */

include("");


?>
</title>
<meta name="language" content="<?php /*?><?php echo $row_Allgemein['language']; ?><?php */?>" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="<?php /*?><?php echo $row_Allgemein['Robots']; ?><?php */?>" />
<meta name="description" content="<?php /*?><?php echo $row_Allgemein['Meta Description']; ?><?php */?>" />
<meta name="keywords" content="<?php /*?><?php echo $row_Allgemein['Meta Keywords']; ?><?php */?>" />
<base href="http://www.ja2.cc" />
<link rel="stylesheet" type="text/css" href="/mimes/styles/central.css" />
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="/mimes/styles/patches/patch_central.css" />
<![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="/mimes/images/favicon.ico" />
<!-- InstanceBeginEditable name="header" -->

<!-- InstanceEndEditable -->

</head>
<body class="hideboth" id="" onload="" onunload="">

<!-- beginn: skip link navigation -->
    <ul id="skiplinks">
        <li><a class="skip" href="#nav">Skip to navigation (Press Enter).</a></li>
        <li><a class="skip" href="#col3">Skip to main content (Press Enter).</a></li>
    </ul>
<!--end: skip link navigation-->
<!--beginn: page_margin-->
<div class="page_margins">
    <!--beginn: page-->
    <div class="page">
        <div id="topnav">
            <div class="langMenu">
                <a href="/de/personalitytest/questions.php">Test</a>
                <span class="text2">
                &#124;
                </span>
                <a href="#faq.html">FAQ</a>
                <span class="text2">
                &#124;
                </span>
                <?php 
                    $sql_login="SELECT firstname FROM user WHERE s_id='".session_id()."' LIMIT 1"; 
					$result_login = mysql_query($sql_login); 
					if (mysql_num_rows($result_login)==1) 
						{
							echo 'Sie sind eingeloggt als ';
							while ($row = mysql_fetch_assoc($result_login)) 
							{
								echo $row["firstname"];
							}
						}
						else
							{
							echo '<a href="#login.html">Login</a>';
							}  
					mysql_free_result($result_login);					
				?>
            </div>
        </div>
        <div id="header">
        </div>
        <!-- begin: #main -->
        <div id="main">
            
            <!-- begin: #col1 - first float column -->
            <div id="col1" >
                <div id="col1_content" class="clearfix">
                </div>
            </div>
            <!-- end: #col1 -->
            
            <!-- begin: #col2 second float column -->
            <div id="col2">
                <div id="col2_content" class="clearfix">
                </div>
            </div>
            <!-- end: #col2 -->
            
            <!-- begin: #col3 static column -->
            <div id="col3">
                <div id="col3_content" class="clearfix">
                    <!-- InstanceBeginEditable name="col3" -->


Testing


Testing


<!-- InstanceEndEditable -->
                </div>
                <!-- IE column clearing -->
                <div id="ie_clearing">&nbsp;</div>
            </div>
            <!-- end: #col3 -->
            
        </div>
        <!-- end: #main -->
    </div>
    <!--end: page-->
</div>
<!--end: page_margin-->
<!-- begin: #footer -->
<div id="footer">
    <div id="footer_content">
        <!-- begin: main navigation #nav -->
        <div id="nav">
            <a href="/de/index.php">Home</a>
            | <a href="/de/legal/datenschutz.php">Datenschutz</a>
            | <a href="/de/legal/kontakt.php">Kontakt</a>
            | <a href="/de/legal/impressum.php">Impressum</a>
            | <a href="/de/legal/agb.php">AGB</a>
            | <a href="#">FAQ</a>
        </div>
        <!-- end: main navigation -->
    </div>
</div>
<!-- end: #footer -->

<p><!-- full skiplink functionality in webkit browsers --></p>
<script src="/mimes/scripts/js/yaml-focusfix.js" type="text/javascript"></script>
</body>
<!-- InstanceEnd --></html>
