' VB Script Document
'Schritte:
'step1: gehe zu google.de / auf mein Konto / Adwords / Keywordtoll
'step2: Suchbegriff eingeben und Bottom drücken
'step2: alle Spalten auswählen, Download1 und Download2

Option Explicit
Dim iim1, iret, i
Dim step1, step2, start, ende, DummyZahl, Zufallszahl, zfkl, zfmt, zfgr
Dim rsout, connstring, sqlout, keyword, fsoFile, fso, datei, startpfad, endwert, pfad
Const ForReading = 1, ForWriting = 2, ForAppending = 8
Const TristateUseDefault = -2, TristateTrue = -1, TristateFalse = 0
Const VERZEICHNIS = "E:\Datentransfer\Google\Keywordtool\Keyword-Split\"
startpfad = "E:\Datentransfer\Google\Keywordtool\start.txt"



set iim1 = CreateObject("imacros")
iret = iim1.iimInit("", false)
step1 = "CODE:"
step1 = step1 + "VERSION BUILD=6021121" + vbNewLine
step1 = step1 + "TAB T=1" + vbNewLine
step1 = step1 + "TAB CLOSEALLOTHERS" + vbNewline
step1 = step1 + "CLEAR"
iret = iim1.iimPlay(step1)

	IF iret < 0 Then
		MsgBox  "Fehler in step1: "+ iim1.iimGetLastError()
		iret = iim1.iimExit
		WScript.Quit(0)
	End If




iret = iim1.iimExit
WScript.Quit(0)