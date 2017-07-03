<?php
/* 1- Confeccione un programa que muestre una serie de mensajes en la página empleando el 
comando echo. Tenga en cuenta que cuando utiliza el comando echo el mensaje se debe 
encerrar entre comillas dobles
o simples.
Toda instrucción finaliza con punto y coma. */
echo "Mensaje 1 con doble comillas";
echo "<br>";
echo 'Mensaje 2 con comillas simples';
echo "<br>";
/* 2- Sabiendo que la función rand nos retorna un valor aleatorio entre un rango de dos 
enteros:
$num=rand(1,100);
En la variable $num se almacena un valor entero que la computadora genera en forma 
aleatoria entre 1 y 100.
Hacer un programa que lo muestre por p
antalla al valor generado. Mostrar además si es 
menor o igual a 50 o si es mayor.
Para imprimir el contenido de una variable también utilizamos el comando echo:
echo $num; */
$num = rand(1,100);
echo $num;
echo "<br>";
if($num<=50)
{
	echo 'Es menor o igual que 50';
	echo "<br>";
}else
{
	echo 'Es mayor que 50';
	echo "<br>";
}

/* 3- Definir una variable de cada tipo: integer, double, string y boolean. Luego impri
mirlas en la 
página, una por línea */

//Int
$variable_int = 1;
//double
$variable_double = 1.234;
//string
$variable_string = "Soy un string";
//Bool
$variable_booleana = true;
echo $variable_int;
echo "<br>";
echo $variable_double;
echo "<br>";
echo $variable_string;
echo "<br>";
echo $variable_booleana;
echo "<br>";

/* 4- Definir tres variables enteras. Luego definir un string que incorpore dichas variables y las 
sustituya en tiempo de ejecución.
Recordar que una variable se sustituye cuando el string está encerrado por comillas 
dobles:
$
precio=90;
echo "La computadora tiene un precio de $precio" */

$variable_entera1 = 1;
$variable_entera2 = 2;
$variable_entera3 = 3;
echo "Reemplazando los enteros $variable_entera1, $variable_entera2 y finalmente $variable_entera3";
echo "<br>";
/* 5- Generar un valor aleatorio entre 1 y 3. Luego imprimir en castellano el número (Ej. si se 
genera el 3 luego mostrar en la página el string "tres").
Para ver si una variable es igual a cierto val
or debemos plantear una condición similar a:
if ($valor==3)
{
//algoritmo
} */

$valor_aleatorio = rand(1,3);

switch($valor_aleatorio)
{
	case 1:
		echo "uno";
		echo "<br>";
		break;
	case 2:
		echo "dos";
		echo "<br>";
		break;
	case 3:
		echo "tres";
		echo "<br>";
		break;
	default:
		echo "El valor generado no está entre 1 y 3";
		echo "<br>";
}

/* 6- Mostrar la tabla de multiplicar del 2. Emplear el for, luego el while y por último el 
do/while.
La estructura for permite incrementar una variable de 2 en 2 */

//bucle for
for ($i = 1 ; $i<=10 ; $i++)
{
	echo "2x".$i." es: ".$i*2;
	echo "<br>";
}
//bucle while
$i = 1;
while($i<=10)
{
	echo "2x".$i." es: ".$i*2;
	echo "<br>";
	$i++;
}
//do-while
$i = 1;
do
{	
	echo "2x".$i." es: ".$i*2;
	echo "<br>";
	$i++;
	
}while($i<=10);
	
/* 7- Confeccionar un formulario que solicite la carga de un nombre de persona y su edad, 
luego mostrar en otra página si es mayor de edad (si la edad es mayor o igual a 18) */
?>
<form action ="formulario.php" method ="POST">
	Nombre:<input type = "text" name ="nombre" />
	<br>
	Edad:<input type = "text" name ="edad" />
	<br>
	<input type="submit" value="Enviar" name = "Enviar"/>
</form>

<?php
/* 8- Definir un vector con los nombres de los días de la semana. Luego imprimir el 
primero y el 
último elemento del vector. */
$dias_semana = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
var_dump($dias_semana);
for ($i = 1 ; $i<=count($dias_semana) ; $i++)
{
	if($i==1)
	{
		echo $dias_semana[$i-1];
		echo "<br>";
	}else if($i==sizeof($dias_semana))
	{
		echo $dias_semana[$i-1];
		echo "<br>";
	}
}

/* 9- Crear un vector asociativo que almacene las claves de acceso de 5 usuarios de un sistema. 
Acceder a cada componente por su nombre. Imprimir una componente del vector. */

$array_asociativo = array("nombre1" => "clave1" , "nombre2" => "clave2" , "nombre3" => "clave3" , "nombre4" => "clave4", "nombre5" => "clave5");
foreach($array_asociativo as $clave=>$valor)
{
	echo "$clave tiene contraseña: $valor";
	echo "<br>";
}

/* 10 -Confeccionar un formulario que solicite la carga
del nombre de usuario y su clave en dos 
oportunidades. En la página que se procesan los datos del formulario implementar una 
función que imprima un mensaje si las dos claves ingresadas son distintas. */
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset ="UTF-8">
	<title> Formulario con acentos y ñ</title>
</head>
<body>	
<form action ="formulario2.php" method ="post">
	Nombre de Usuario:<input type ="text" name ="usuario" />
	<br>
	Contraseña: <input type ="password" name ="psw1" />
	<br>
	Repita contraseña por favor: <input type ="password" name ="psw2" />
	<br>
	<input type="submit" value="Enviar" name = "Enviar"/>
</form>
</body>
</html>