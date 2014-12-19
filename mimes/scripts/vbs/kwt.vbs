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

'Zufallszahlen berechnen
DummyZahl = Int(rnd - 89089)
Randomize
Zufallszahl = Int((13 - 7 + 1) * Rnd + 7)
zfkl = Int((4 - 1 + 1) * Rnd + 1)
zfmt = Int((6 - 3 + 1) * Rnd + 3)
zfgr = Int((8 - 4 + 1) * Rnd + 4)

'Startwert auslesen
set fso = CreateObject("Scripting.FileSystemObject")
	If fso.FileExists(startpfad) Then
		set fsoFile = fso.OpenTextFile(startpfad, ForReading , true, TristateFalse)
		start = fsoFile.ReadAll
		fsoFile.close
		set fsoFile = nothing
		set fso = nothing
	Else
		MsgBox ("Kleiner Fehler: Datei ist nicht vorhanden.")
		set fsoFile = nothing
		set fso = nothing
	End if

set iim1 = CreateObject("imacros")
iret = iim1.iimInit("", false)
step1 = "CODE:"
step1 = step1 + "VERSION BUILD=6021121" + vbNewLine
step1 = step1 + "TAB T=1" + vbNewLine
step1 = step1 + "TAB CLOSEALLOTHERS" + vbNewline
step1 = step1 + "URL GOTO=http://www.google.de/" + vbNewLine
step1 = step1 + "TAG POS=1 TYPE=A ATTR=TXT:Mein<SP>Konto" + vbNewLine
step1 = step1 + "TAG POS=1 TYPE=A ATTR=TXT:AdWords" + vbNewLine
step1 = step1 + "TAG POS=1 TYPE=SPAN ATTR=TXT:Tools" + vbNewLine
step1 = step1 + "TAG POS=1 TYPE=A ATTR=TXT:Keyword-Tool"
iret = iim1.iimPlay(step1)

	IF iret < 0 Then
		MsgBox  "Fehler in step1: "+ iim1.iimGetLastError()
		iret = iim1.iimExit
		WScript.Quit(0)
	End If


'komplette Schleife: a) Dateinamen berechnen, b) Google ABfrage c) Ergebnisse speichern

ende = start + Zufallszahl
	For i = start to ende
		
		'Dateinamen bestimmen
		IF i < 10 THEN
			datei = "000" & i
		ElseIf i < 100 THEN
			datei = "00" & i
		ElseIf i < 1000 THEN
			datei = "0" & i
		Else
			datei = i
		END IF
		pfad = VERZEICHNIS & datei & ".txt"
		
		'Datei auslesen
		set fso = CreateObject("Scripting.FileSystemObject")
			If fso.FileExists(pfad) Then
				set fsoFile = fso.OpenTextFile(pfad, ForReading , true, TristateFalse)
				Keyword = fsoFile.ReadAll
				fsoFile.close
				set fsoFile = nothing
				set fso = nothing
			Else
				MsgBox ("Auszulesende Datei nicht gefunden")
				set fsoFile = nothing
				set fso = nothing
				WScript.Quit(0)				
			End if
		
		' Variablenbestimmung für iMacros
		iret = iim1.iimSet("-var_KEYWORD", Keyword)
		iret = iim1.iimSet("-var_DATEI", datei)
		iret = iim1.iimSet("-var_ZFKL", zfkl)
		iret = iim1.iimSet("-var_ZFMT", zfmt)
		iret = iim1.iimSet("-var_ZFGR", zfgr)

		step2 = "CODE:"
		step2 = step2 + "TAG POS=1 TYPE=TEXTAREA FORM=NAME:mitteilung ATTR=TXT:* CONTENT={{KEYWORD}}" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFKL}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=INPUT:CHECKBOX FORM=NAME:NoFormName ATTR=ID:kpVariationsTool-useSynonyms&&VALUE:on CONTENT=NO" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFGR}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=A ATTR=TXT:Ergebnisse<SP>filtern" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFKL}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=INPUT:CHECKBOX FORM=NAME:NoFormName ATTR=ID:kpFilters-onlyShowExistingKeywords&&VALUE:on CONTENT=YES" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFKL}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=INPUT:BUTTON FORM=NAME:NoFormName ATTR=ID:kpKeywordPlanner-getKeywordsButton" + vbNewLine
'		step2 = step2 + "WAIT SECONDS=#DOWNLOADCOMPLETE#" + vbNewLine
		step2 = step2 + "WAIT SECONDS=15" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpKeywordPlannerColumnSelect CONTENT=$Alle<SP>anzeigen" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFKL}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=0" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFMT}}" + vbNewLine
		step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool\weit FILE={{DATEI}}_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
		step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFGR}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=1" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFMT}}" + vbNewLine
		step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool\wort FILE={{DATEI}}_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
		step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFMT}}" + vbNewLine
		step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=2" + vbNewLine
		step2 = step2 + "WAIT SECONDS={{ZFGR}}" + vbNewLine
		step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool\exact FILE={{DATEI}}_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
		step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
		iret = iim1.iimPlay(step2)

		IF iret < 0 Then
			MsgBox  "Fehler in step2: "+ iim1.iimGetLastError()
			iret = iim1.iimExit
			WScript.Quit(0)
		End If

		'Endwert schreiben
		set fso = CreateObject("Scripting.FileSystemObject")
			If fso.FileExists(startpfad) Then
				set fsoFile = fso.OpenTextFile(startpfad, ForWriting , false, TristateFalse)
				endwert = i + 1
				fsoFile.Writeline(endwert)
				fsoFile.close
				set fsoFile = nothing
				set fso = nothing
			Else
				MsgBox ("Startwertdatei zum schrieben nicht vorhanden")
				set fsoFile = nothing
				set fso = nothing
				WScript.Quit(0)
			End if
	NEXT

iret = iim1.iimExit
WScript.Quit(0)