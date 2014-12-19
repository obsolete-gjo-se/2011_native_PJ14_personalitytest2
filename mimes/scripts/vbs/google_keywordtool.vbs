' VB Script Document
'Schritte:
'step1: gehe zu google.de / auf mein Konto / Adwords / Keywordtoll
'step2: Suchbegriff eingeben und Bottom drücken
'step2: alle Spalten auswählen, Download1 und Download2

Option Explicit
Dim iim1, iret, i
Dim step1, step2
Dim rsout, connstring, sqlout, keyword

'MsgBox ("step1: Google Verbindung aufbauen und zum Keywordtoll gehen:")
'MsgBox WScript.ScriptFullName
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
'if iret < 0 Then
'   MsgBox  "Fehler in Step1: "+ iim1.iimGetLastError()
'End If

'MsgBox ("step2: Suchbegriff eingeben und Bottom drücken:")

set rsout = CreateObject("ADODB.Connection")
connstring = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=E:\Daten\webprojekte\_works\SEO10.accdb"
rsout.Open (connstring)
sqlout = "SELECT Keyword.Keyword FROM Keyword WHERE (((Keyword.Keyword)>'ferienwohnung mallorca es trenc')) ORDER BY Keyword.Keyword;"
set rsout = rsout.Execute(sqlout)

do 	while not i > 34
	i = i + 1
	'until rsout.eof
	iret = iim1.iimSet("-var_KEYWORD", rsout.fields(0))
	keyword = rsout.fields(0)

	step2 = "CODE:"
	step2 = step2 + "TAG POS=1 TYPE=TEXTAREA FORM=NAME:NoFormName ATTR=ID:kpVariationsTool-keyword CONTENT={{KEYWORD}}" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=INPUT:BUTTON FORM=NAME:NoFormName ATTR=ID:kpKeywordPlanner-getKeywordsButton" + vbNewLine
	step2 = step2 + "WAIT SECONDS=10" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpKeywordPlannerColumnSelect CONTENT=0" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=0" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_weitgehend FILE={{KEYWORD}}_1_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_weitgehend FILE={{KEYWORD}}_2_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=1" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_wortgruppe FILE={{KEYWORD}}_1_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_wortgruppe FILE={{KEYWORD}}_2_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "TAG POS=1 TYPE=SELECT FORM=NAME:NoFormName ATTR=ID:kpMatchTypeSelector CONTENT=2" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_exact FILE={{KEYWORD}}_1_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv" + vbNewLine
	step2 = step2 + "WAIT SECONDS=1" + vbNewLine
	step2 = step2 + "ONDOWNLOAD FOLDER=E:\Datentransfer\Google\Keywordtool_exact FILE={{KEYWORD}}_2_{{!NOW:ddmmyy_hhmmss}}" + vbNewLine
	step2 = step2 + "TAG POS=R1 TYPE=A ATTR=TXT:.csv"
	iret = iim1.iimPlay(step2)
'	if iret < 0 Then
'	   MsgBox  "Fehler in step2: "+ iim1.iimGetLastError()
'	End If
	rsout.movenext
loop

'ONDOWNLOAD FOLDER=* FILE=+_{{!NOW:yyyymmdd_hhnnss}}    
'TAG POS=1 TYPE=A ATTR=TXT:.csv<SP>(für<SP>Excel)   

iret = iim1.iimExit
WScript.Quit(0)