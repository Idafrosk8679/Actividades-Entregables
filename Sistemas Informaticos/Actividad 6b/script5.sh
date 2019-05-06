numLinea=0
totalLineas=$(cat listado.txt |wc -l)
usuariosWin=0
usuariosLin=0
procesosWin=0
procesosLin=0
while [ $numLinea -le $totalLineas ]; do
	linea=$(head -n $numLinea listado.txt | tail -n 1 )
	os=$(echo $linea | awk '{print $2}')
	p=$(echo $linea | awk '{print $3}') 
	if [ $os=="Windows" ]; then
		usuariosWin=$(expr $usuariosWin + 1 )
		procesosWin=$(expr $procesosWin + $p )
	else
		usuariosLin=$(expr $usuariosLin + -1 )
		procesosLin=$(expr $procesosLin + $sp )
	fi
	numLinea=$(expr $numLinea + )
done
echo "Usuarios Windows $usuariosWin Nprocesos: $procesosWin"
echo "Usuarios Linux $ususariosLin Nprocesos: $procesosLin"

