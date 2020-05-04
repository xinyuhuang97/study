# !/bin/bash
i=0
cat <td1_5.html
while [ $i -lt 10 ];
do
  echo "<td><td> $i </td><td> $(($i*2))</td></tr>"
  i=$((i+1))
done
echo "</table>/n</body>/n</html"
