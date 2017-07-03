<?php
//include("includes/system.ini.php");

class Usuarios {
    private $mysql;
    private $nombre;
    private $apellido;	
	private $telefono;
	private $password;
	private $confirmarPassword;
	private $email;
	private $bValidado;

    public function __construct($nombre,$apellido,$telefono,$password,$confirmarPassword,$email){
        $this->mysql = new Mysql_i();
        $this->nombre = $nombre;
        $this->apellido = $apellido; 
		$this->telefono = $telefono;		
		$this->password = $password;
		$this->confirmarPassword = $confirmarPassword;
		$this->email = $email;
		$this->bValidado = false;
		
    }   
    public function validar(){
        if(!$this->nombre){
            throw new ValidationException("El campo nombre debe no debe estar vacio");
        }
        if(!$this->apellido){
			throw new ValidationException("El campo Apellido no debe no debe estar vacio");
        }
		if(!$this->password){
			throw new ValidationException("El campo Password no debe no debe estar vacio");
        }
		if(!$this->confirmarPassword){
			throw new ValidationException("El campo ConfirmarPassword no debe no debe estar vacio");
        }
		if(!$this->telefono){
			throw new ValidationException("El campo Telefono no debe no debe estar vacio");
        }
		if(!$this->email){
			throw new ValidationException("El campo E-mail no debe no debe estar vacio");
        }
		if(strcmp($this->password, $this->confirmarPassword) !== 0 )
		{
			throw new ValidationException("Las contraseñas deben coincidir");
		}
		$this->bValidado = true;
    }
    public function enviarEmail(){
        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        //$mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "";

        //Password to use for SMTP authentication
        $mail->Password = "";

        //Set who the message is to be sent from
        $mail->setFrom('leangilutn@gmail.com', 'First Last');

        //Set an alternative reply-to address
        $mail->addReplyTo('leangilutn@gmail.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($this->email, 'First Last');

        //Set the subject line
        $mail->Subject = 'Confirmacion de registro';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML("Confirmacion de registro Body");

        //Replace the plain text body with one created manually
        /** $mail->AltBody = 'This is a plain-text message body'; **/

        //Attach an image file
        /** $mail->addAttachment('images/phpmailer_mini.png'); **/

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
			throw new GenericException("Email no enviado");
			return false;
        } else {
            echo "Message sent!";
			return true;
        }
    }
    
	public function agregar()
	{
		if(!$this->existeUsuario())
		{	
			if($this->bValidado)
			{
				
				$query = "INSERT INTO usuarios (falta,fmodificacion,feliminado,habilitado,email,clave,nombre,apellido) VALUES (now(),now(),null,0,'".$this->email."','".md5($this->password)."','".$this->nombre."','".$this->apellido."') ";
				$qry = mysqli_query( $this->mysql->link, $query );
				//echo $query;
				if(mysqli_affected_rows($this->mysql->link) >= 1)
				{
					echo "Usuario registrado"; 
					
				}else
				{
					throw new ValidationException("No se pudo guardar el nuevo usuario");
				}
			}else
			{
				echo "Primero se deben validar los campos";
			}
		}else
		{
			throw new ValidationException("Usuario ya existente");
		}
	}
	
	private function existeUsuario()
	{
		$datos = $this->mysql->consulta("SELECT * FROM usuarios WHERE email = '".$this->email."'");
		if( empty($datos))
		{
			echo "Usuario no existe";
			return false;
		}else
		{
			echo "Usuario ya existe";
			return true;
			
		}
	}
	public static function buscarUsuario($email,$contraseña)
	{
		$mysql = new Mysql_i();
		$datos = $mysql->consulta("SELECT * FROM usuarios WHERE email = '".$email."' AND clave='".md5($contraseña)."'");
		if( empty($datos))
		{
			return false;
		}else
		{
			echo "Usuario ya existe";
			return true;
			
		}
		
	}
	public function emailVerificado()
	{
		$query = "UPDATE usuarios SET fmodificacion = now() WHERE email = '".$this->email."'";
		$qry = mysqli_query( $this->mysql->link, $query );
		//echo $query;
		if(mysqli_affected_rows($this->mysql->link) >= 1)
		{
			echo "Usuario Verificado"; 
		

		}else
		{
			throw new ValidationException("No se pudo verificar el email");
		}
	}
    
}
?>
