#!/bin/sh
cat <<EOF
Content-Type: text/html; charset=utf-8
echo
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tables de multiplication par 2</title>
</head><body>
<table>
<caption>Table de multiplication par 2 sur 2 colonnes</caption>
<tr><th>x</th><th>2x</th></tr>
EOF
i=0
while [ $i -lt 10 ]
do
echo "<tr><td>$i</td><td>$(($i*2))</td></tr>"
i=$(($i+1))
done
echo '</table></body></html>'
