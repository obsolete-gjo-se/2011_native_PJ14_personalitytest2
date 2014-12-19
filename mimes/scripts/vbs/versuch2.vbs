class Person

  public name

  public function gibname
    gibname = "Ich heisse " & name
  end function

end class

set a = new Person
a.name = "Klaus"
b = a.gibname

MsgBox b


######################
Klassen und Objekte

Eine Klasse ist die Definition für ein Objekt. Objekte wiederum sind Ansammlungen von Eigenschaften (Variablen) und Methoden (Funktionen/Prozeduren). Sie vereinen meist bestimmte zusammengehörige Fähigkeiten.

Eine Klasse wird mit dem Wort class gefolgt vom Klassennamen definiert. Innerhalb der Klasse können dann die Eigenschaften und Methoden definiert werden. Die Klassendefinition selbst endet mit den Worten end class. Beispiel:

class meineKlasse
  ' Klassendefinition
end class

Eigenschaften definieren
Eine Eigenschaft einer Klasse wird dadurch erstellt, dass man innerhalb der Klassendefinition eine öffentliche Variable erzeugt. Beispiel:

class meineKlasse
  public name
end class


Methoden definieren
Eine Methode wird dadurch erstellt, dass man innerhalb der Klassendefinition eine öffentliche Prozedur oder Funktion erzeugt. Beispiel:

class meineKlasse

  public name

  public function gibname
    gibname = "Ich heisse: " & name
  end function

end class


Objekte erzeugen
Soll nun aus einer Klasse ein Objekt erzeugt werden, geschieht dies mittels der set-new-Anweisung. Hierbei wird einer Variablen der Klassenname zugewiesen. Zusätzlich notiert man vor dem Variablennamen das Wort set und vor dem Klassennamen das Wort new. Anschließend ist das Objekt erstellt und kann verwendet werden. Beispiel:

class Person
  public name
  public function gibname
    gibname = "Ich heisse " & name
  end function
end class

set a = new Person
a.name = "Klaus"
b = a.gibname
