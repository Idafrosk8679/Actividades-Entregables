fichero="precipitaciones.txt"

maximo=`cat $fichero | wc -l`
while i in `seq 1 $maximo`; do
	 echo $1 line 
	dias=`cat $fichero | awk '{print $1}'`
	litros=`cat $fichero | awk '{print $2}'`
	if [ $litros -eq 0 ]; then
		if [ $((dias%7)) -eq 1 ] then echo "El lunes no llovió"; then
		if [ $((dias%7)) -eq 2 ] then echo "El martes no llovió"; then
		if [ $((dias%7)) -eq 3 ] then echo "El miércoles no llovió"; then
		if [ $((dias%7)) -eq 4 ] then echo "El jueves no llovió"; then
		if [ $((dias%7)) -eq 5 ] then echo "El viernes no llovió"; then
		if [ $((dias%7)) -eq 6 ] then echo "El sábado no llovió"; then
		if [ $((dias%7)) -eq 7 ] then echo "El domingo no llovió";
done
fi


