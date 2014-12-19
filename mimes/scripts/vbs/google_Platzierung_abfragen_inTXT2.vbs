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
Dim objFileSystem, objOutputFile, s, Datumstr
Const SUMA = "Google.de (Das Web)"
Const OPEN_FILE_FOR_APPENDING = 8
Const STROUTPUTFILE = "E:\Datentransfer\Google\Platzierung\platz.txt"


Datumstr = cstr(Date)

set rsout = CreateObject("ADODB.Connection")
connstring = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=E:\Daten\webprojekte\_works\SEO10.accdb"
rsout.Open (connstring)
sqlout = "SELECT Keyword_Wert.Keywords, Keyword_Wert.PJ02 FROM Keyword_Wert WHERE (((Keyword_Wert.PJ02)=True)) AND (((Keyword_Wert.Keywords)>'unterkunft')) ORDER BY Keyword_Wert.Keywords;"

set rsout = rsout.Execute(sqlout)

set iim1 = CreateObject("imacros")
iret = iim1.iimInit("", false)

Set objFileSystem = CreateObject("Scripting.fileSystemObject")
Set objOutputFile = objFileSystem.OpenTextFile(STROUTPUTFILE,OPEN_FILE_FOR_APPENDING,TRUE)

step1 = "CODE:"
step1 = step1 + "VERSION BUILD=6021121" + vbNewLine
step1 = step1 + "TAB T=1" + vbNewLine
step1 = step1 + "TAB CLOSEALLOTHERS" + vbNewline
step1 = step1 + "URL GOTO=http://www.google.de/"
iret = iim1.iimPlay(step1)
if iret < 0 Then
MsgBox  "Error in Macro#1: "+ iim1.iimGetLastError()
	rsout.Close
	iret = iim1.iimExit
	objOutputFile.Close
End If

do until rsout.eof
	iret = iim1.iimSet("-var_KEYWORD", rsout.fields(0))
	keyword = rsout.fields(0)

	step2 = "CODE:"
	step2 = step2 + "TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:f ATTR=NAME:q CONTENT={{KEYWORD}}" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:f ATTR=NAME:btnG"
	iret = iim1.iimPlay(step2)
	if iret < 0 Then
		MsgBox  "Error in Macro#1: "+ iim1.iimGetLastError()
		rsout.Close
		iret = iim1.iimExit
		objOutputFile.Close
	End If

	For num = 1 To 100
		str = cstr(num)
		iret = iim1.iimDisplay("Nummer: " + str)
		pos = num 
		str = cstr(pos)
		iret = iim1.iimSet("-var1", pos)
		step3 = "CODE:"
		step3 = step3 + "CMDLINE !VAR1 1" + vbNewLine
		step3 = step3 + "TAG POS=1 TYPE=H2 ATTR=TXT:Suchergebnisse" + vbNewLine
		step3 = step3 + "TAG POS=R{{!VAR1}} TYPE=H3 ATTR=CLASS:r&&TXT:*" + vbNewLine
		step3 = step3 + "TAG POS=R1 TYPE=A ATTR=CLASS:l&&TXT:* EXTRACT=HREF"
		iret = iim1.iimPlay(step3)
		If iret = 1  Then
			s = str + "," + keyword + ","+ iim1.iimGetLastExtract(1) + "," + SUMA + "," + Datumstr
			objOutputFile.WriteLine(s)	
		End If
		if iret < -300 Then
			EXIT for
		End If
		if iret < 0 Then
			MsgBox  "Error in Macro#3: "+ iim1.iimGetLastError()
			rsout.Close
			iret = iim1.iimExit
			objOutputFile.Close
		End If
	Next
	rsout.movenext
loop

rsout.Close
iret = iim1.iimExit
objOutputFile.Close

'set ... = nothing (diverse Objekte)
WScript.Quit(0)