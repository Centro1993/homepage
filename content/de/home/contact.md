+++
widget = "contact_form"
title = "Kontakt" 

# Uncomments the following line for
# standard forms.
#
# Form handler
# action = "/contact_handler.php"
# Form submit method
# method = "GET" # Default is POST

# For Netlify form
#
netlify = true

# Add a contact via email button if your email
# is configured in the config file of your website.
useEmail = true

# Form inputs
[[inputs]]
label = "Dein Name"
# Input type
type = "text"
# minimum input length
minlength = "3"
# maxlength = "25"
name = "name"
# pattern matching
#pattern = "[a-zA-Z]"
placeholder = "Name"
# The input is required to submit the form
# required = true

[[inputs]]
label = "Deine Email"
type = "email"
name = "email"
# pattern = ""
placeholder = "Email"
required = true

# Textarea works same as input but doesn't support pattern matching
[[inputs]]
label = "Deine Nachricht (mindestens 10 Buchstaben)"
type = "textarea"
minlength = "10"
name = "message"
placeholder = "Deine Nachricht..."
required = true

+++

Brauchst du einen Programmierer für dein Projekt oder dein Büro? Lass es mich wissen.