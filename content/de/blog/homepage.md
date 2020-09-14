+++
title = "Diese Homepage!"
subtitle = "Frontend made easy"
tags = ['hugo', 'github', 'actions', 'project']
date = 2020-09-14

# For description meta tag
description = "Eine Homepage samt Lebenslauf"

# Comment next line and the default banner wil be used.
#banner = 'img/shoppinglist.webp'

+++

# Links
[*Github*](https://github.com/Centro1993/homepage).

# Stack:

**Hugo** zum Rendern der Seite, **Nginx** als Reverse Proxy, und **Github Actions** für die *CI/CD-Pipeline*.

# What does it do?

**Hugo** schnappt sich ein Template, geschrieben in der *GoLang-Templating*-Sprache, und rendert daraus statisches HTML. Das Template wird dabei mit Content aus simplen *Markdown-Files* befüllt.
Dank Githubs neuen Feature "**Actions**" kann ich den Deployment-Prozess mit drei einfachen Schritten automatisieren:
- Pulle den aktuellen Master
- Builde mit Hugo das HTML
- Deploye den *public*-Folder per SCP auf den Server

Auf dem Server arbeitet ein **Nginx**, welcher das HTML served.

# But why?

Meine alte Homepage aus Unizeiten hatte mehr als ausgedient.
Hugo bietet mir die Möglichkeit, einfach Content hinzuzufügen, ohne auch nur HTML zu sehen.
Die Github Actions erlauben mir, schnell zu iterieren, und meine Homepage von überall über Github zu bearbeiten.
Bin sehr zufrieden mit der Lösung! :smile:


