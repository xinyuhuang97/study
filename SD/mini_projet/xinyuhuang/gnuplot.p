set multiplot layout 3,1 rowsfirst
set title	'numero'
set xlabel	'numero'
set ylabel	'temps'
set xrange [-5:15]
set yrange [900:1200]
plot 'numero.txt' using	1:2 with lines title 'liste', 'numero.txt' using 1:3 with lines title 'tabdyn', 'numero.txt' using 1:4 with lines title 'hachage', 'numero.txt' using 1:5 with lines title 'arbrelex'

set title	'titre'
set xlabel  'titre'
set ylabel  'temps'
set xrange [-5:15]
set yrange [900:1200]
plot 'titre.txt' using	1:2 with lines title 'liste', 'titre.txt' using 1:3 with lines title 'tabdyn', 'titre.txt' using 1:4 with lines title 'hachage', 'titre.txt' using 1:5 with lines title 'arbrelex'

set title	'artiste'
set xlabel	'artiste'
set ylabel	'temps'
set xrange [-5:15]
set yrange [900:1200]
plot 'artiste.txt' using	1:2 with lines title 'liste', 'artiste.txt' using 1:3 with lines title 'tabdyn', 'artiste.txt' using 1:4 with lines title 'hachage', 'artiste.txt' using 1:5 with lines title 'arbrelex'

unset multiplot
