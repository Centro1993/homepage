+++
title = "Busradar-Mining"
subtitle = "Eine Analyse von Flensburgs Busdaten."
tags = ['nodejs', 'leaflet', 'project']
date = 2017-06-10

# For description meta tag
description = "Eins meiner liebsten Studienprojekte."

# Comment next line and the default banner wil be used.
banner = 'img/busradar.webp'

+++

# Links
[*Github*](https://github.com/Centro1993/Busradar-Visualization) und [*das Projekt selber*](https://busradar.jonasleitner.de).

# Stack:

Das ganze Projekt baut auf **NodeJS** auf. Zum Speichern der Daten vor der Verwertung wurde **MongoDB** genutzt.
Das ganze wird visualisiert mit **LeafletJS** und dessen **Heatmap-Plugin**.

# What does it do?

Über mehrere Wochen habe ich fleißig Live-Busdaten des [*Flensburger Busradars*](http://www.busradar-flensburg.de/) gescraped.
Die Daten der Linien 11 und 4 wurden dann von einem Script ausgewertet. Zuerst wurden die Ticks der Busse auf die GPS-Linie angeglichen, welche ich in **Google Maps** nachgemalt und exportiert habe.
Dann wurde zwischen diesen normalisierten Punkten die Fahrtrichtung, Geschwindigkeit und Beschleunigung ausgerechnet.
Man kann also z.B. die Durchschnittsgeschwindigkeit der Linie 4 am ZOB Mittwoch nachts herausfinden.

# But why?

Das Ganze war ein Projekt für das hervorragende Fach **Informationsvisualisierung** von Herrn Hartmann.
Außerdem ist das Busradar ein toller Service, den ich unbedingt mal in einem Projekt verwenden wollte. 


