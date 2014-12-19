<?php include '../includes/_central.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Formularvorlage</title>
<base href="http://www.ja2.cc/" />
<link href="/mimes/styles/central.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="page_margins">
  <div class="page"> 
    <!-- begin: main content area #main -->
    <div id="main"> 
      
      <!-- begin: #col1 - first float column -->
      <div id="col1">
        <div id="col1_content" class="clearfix"> </div>
      </div>
      <!-- end: #col1 --> 
      
      <!-- begin: #col3 static column -->
      <div id="col3">
        <div id="col3_content" class="clearfix">
          <form method="post" action="" class="yform columnar">
            <fieldset>
              <legend>1. Legende</legend>
              <div class="type-text">
                <label for="firstname">Vorname</label>
                <input type="text" name="vorname" id="vorname" size="20" />
              </div>
              <div class="type-text error" role="alert"> <strong class="message">Das Feld ist nicht ausgefüllt</strong>
                <label for="nachname">Nachname <sup title="Dies ist ein Pflichtfeld.">*</sup></label>
                <input type="text" name="nachname" id="nachname" size="20"/>
              </div>
              <div class="type-text">
                <label for="email">E-Mail <sup title="Dies ist ein Pflichtfeld.">*</sup></label>
                <input type="text" name="email" id="email" size="20"/>
              </div>
            </fieldset>
            <fieldset>
              <legend>2. Legende</legend>
              <div class="type-select">
                <label for="mehr">Mehr Auswahl</label>
                <select name="mehr" id="mehr" size="1">
                  <option value="" selected="selected" disabled="disabled">Bitte Auswählen</option>
                  <optgroup label="1. Überschrift">
                  <option value="Empfehlung">Empfehlung</option>
                  <option value="Suchmaschine">Suchmaschine</option>
                  </optgroup>
                  <optgroup label="2. Überschrift">
                  <option value="Weblog">Weblog</option>
                  <option value="Werbung">Werbung</option>
                  <option value="Zeitung">Zeitung</option>
                  <option value="Sonstiges">Sonstiges</option>
                  </optgroup>
                </select>
              </div>
              <div class="type-text">
                <label for="nachricht">Nachricht</label>
                <textarea name="nachricht" id="nachricht" cols="30" rows="7">Hier steht die Nachricht drin</textarea>
              </div>
              <div class="type-check">
                <input type="checkbox" name="newsletter" id="newsletter" />
                <label for="newsletter">Für Newsletter anmelden</label>
              </div>
            </fieldset>
            <fieldset>
              <legend>3. Legende</legend>
              <div class="type-check">
                <div>
                  <input type="radio" name="vote" value="Option 1" id="vote1" />
                  <label for="vote1">Option 1</label>
                </div>
                <div>
                  <input type="radio" name="vote" id="vote2" />
                  <label for="vote2">Option 2</label>
                </div>
                <div>
                  <input type="radio" name="vote" id="vote3" />
                  <label for="vote3">Option 3</label>
                </div>
              </div>
            </fieldset>
            <div class="type-button">
              <input type="button" value="button" id="button1" name="button1" />
              <input type="reset" value="reset" class="reset" id="reset" name="reset" />
              <input type="submit" value="submit"  class="submit" id="submit" name="submit" />
            </div>
          </form>
        </div>
        <!-- IE Column Clearing -->
        <div id="ie_clearing">&nbsp;</div>
        <!-- End: IE Column Clearing --> 
      </div>
      <!-- end: #col3 --> 
    </div>
    <!-- end: #main --> 
  </div>
</div>
</body>
</html>
