# !/bin/bash
cat <<EOF
Content-Type: text/html; charset=utf-8
    <html>
      <head>
        <meta http_equiv="Content-type" cotent='text/html; charset=utf-8' />
        <title> Coucou TDG5</title>
      </head>
      <body>
      <div>
        Je suis le script<a href="www.apache.org/SCRIPT_NAME">$SCRIPT_NAME<\a> renvoie par<a href="www.apache.org/SERVER_SOFTWARE">$SERVER_SOFTWARE>\a>pour<a href="www.apache.org/HTTP_USER_AGENT">$HTTP_USER_AGENT</a>
      </div>
      </body>

EOF
