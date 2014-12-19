' VB Script Document
' Schrittfolge:
'Google Verbindung aufbauen
	'DB öffnen
'Datenbank auslesen und Keyword eingeben
'Ergebnisse auslesen
'Ergebnisse schreiben
	'DB schließen
'Google schließen

Option Explicit
Dim iim1, iret
Dim step1, step2, step3
Dim num, str, pos
Dim myname, mypath, db, sql, sqlout, rs, rsout, connstring, keyword
Const SUMA = "Google.de (Das Web)"

'MsgBox ("step1: Google Verbindung aufbauen:")
'MsgBox WScript.ScriptFullName
set iim1 = CreateObject("imacros")
iret = iim1.iimInit("", false)

step1 = "CODE:"
step1 = step1 + "VERSION BUILD=6021121" + vbNewLine
step1 = step1 + "TAB T=1" + vbNewLine
step1 = step1 + "TAB CLOSEALLOTHERS" + vbNewline
step1 = step1 + "URL GOTO=http://www.google.de/"
iret = iim1.iimPlay(step1)
if iret < 0 Then
   MsgBox  "Error in Macro#1: "+ iim1.iimGetLastError()
End If

'MsgBox ("step2: Datenbank auslesen und Keyword eingeben:")

set rsout = CreateObject("ADODB.Connection")
connstring = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=E:\Daten\webprojekte\_works\SEO10.accdb"
rsout.Open (connstring)
sqlout = "SELECT Keyword_Wert.Keywords, Keyword_Wert.PJ02 FROM Keyword_Wert WHERE (((Keyword_Wert.PJ02)=True)) AND (((Keyword_Wert.Keywords)>'apartments')) ORDER BY Keyword_Wert.Keywords;"
set rsout = rsout.Execute(sqlout)

do until rsout.eof
   iret = iim1.iimSet("-var_KEYWORD", rsout.fields(0))
'   keyword = iim1.iimSet("-var_KEYWORD", rsout.fields(0)) - klappt nicht
'	keyword = KEYWORD - gibt Wert NULL
	keyword = rsout.fields(0)

step2 = "CODE:"
step2 = step2 + "TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:f ATTR=NAME:q CONTENT={{KEYWORD}}" + vbNewLine
'step2 = step2 + "WAIT SECONDS=2" + vbNewLine
step2 = step2 + "TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:f ATTR=NAME:btnG"
iret = iim1.iimPlay(step2)
if iret < 0 Then
   MsgBox  "Error in Macro#1: "+ iim1.iimGetLastError()
End If

'#####################################################

'MsgBox ("step3: Ergebnisse auslesen und schreiben:")

'myname = WScript.ScriptFullName
'mypath = Left(myname, InstrRev(myname, "\"))
set db = CreateObject("ADODB.Connection")
db.Open("DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=E:\Daten\webprojekte\_works\SEO10.accdb")

For num = 1 To 100 
	str = cstr(num)  'Convert integer to string
	iret = iim1.iimDisplay("Nummer: " + str)
	pos = num '+ 4'start at 5: Offset for POS= statement
	str = cstr(pos)  'Convert integer to string
	iret = iim1.iimSet("-var1", pos) 'Select a new link for each run
	step3 = "CODE:"
	step3 = step3 + "CMDLINE !VAR1 1" + vbNewLine
	step3 = step3 + "TAG POS=1 TYPE=H2 ATTR=TXT:Suchergebnisse" + vbNewLine
	step3 = step3 + "TAG POS=R{{!VAR1}} TYPE=H3 ATTR=CLASS:r&&TXT:*" + vbNewLine
	step3 = step3 + "TAG POS=R1 TYPE=A ATTR=TXT:* EXTRACT=HREF"
	iret = iim1.iimPlay(step3)
	If iret = 1  Then
	sql = "insert into Platzierung_Import (Suchbegriff, Datum, Suchmaschine, URL, Position) values ('" _
	& keyword & "' ,'" & Date & "', '" & SUMA & "' ,  '" & iim1.iimGetLastExtract(1) & "', '" & num & "')"
	set rs = db.Execute(sql)
   End If

	if iret < -300 Then
		EXIT for
	End If
	if iret < 0 Then
	   MsgBox  "Error in Macro#3: "+ iim1.iimGetLastError()
	End If
Next
   If iret < 0 Then
      MsgBox iim1.iimGetLastError()
   End If
  rsout.movenext
loop


iret = iim1.iimExit
WScript.Quit(0)
