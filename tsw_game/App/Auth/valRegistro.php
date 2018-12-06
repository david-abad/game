<?php 
class valRegistro{

protected static $allow = ['registro'];
	protected static function issetRequest()
		{

			if (isset($_GET['login'])){
				if (in_array($_GET['login'], self::$allow))
				{
					return false;
				}

			}
			return true;

		}

//Recibe los datos por post y los envia a StoreUser
public static function getUserAuth(){

		if(self::issetRequest())
		{
			
			if (isset($_POST['btnEnviar'])) 
			{
   
				$userEmail = $_POST['email'];
				$userName = $_POST['name'];
				$userPass = $_POST['pass'];
				self::storeUser($userEmail,$userName,$userPass);
				header('Location: index.php');
				die();
			}

		}
		else{

			echo "La cague";
		}
	}

	public static function getUserAuthEmail()
	{
		if (isset($_POST['btnEnviar'])) 
			{
   
				$userEmail = $_POST['user'];
				
				$userPass = $_POST['pass'];
				$user2 = self::checkUser($userEmail,$userPass);
				
				if ($user2 != null) {
					self::login($user2);
					header('Location: index.php');
					die();
				}
				else
				{
					echo "<p>El correo o contraseña son incorrectas.</p>";
					header('Location: index.php');
					die();
				}
				
				
			}
		else
		{
			echo "la cague x2";
		}

	}

	protected static function checkUser($userEmail,$userPass)
	{
		$db = new PDO("mysql:host=localhost;dbname=tsw","root","");
		$ps = $db -> prepare("SELECT name,email, password FROM users WHERE email = :email AND password = :pass");
		$ps->execute([
			':email' => $userEmail,
			':pass' => $userPass
		]);
		$result = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $result ? $result[0]:null;
		


	}


	//Conexion a BD y va a getExistingUser a preguntar si el usuario ya existe(email) y si no lo ingresa
	protected static function storeUser($userEmail,$userName,$userPass)
	{
		$db = new PDO("mysql:host=localhost;dbname=tsw","root","");
		$fecha = new DateTime();
		$user = self::getExistingUser($userEmail,$db);
		if ($user == null)
		{

			$user = array (
				'name' => $userName , 
				'email' => $userEmail,
				'pass'  => $userPass,
				'ca' => $fecha->getTimestamp()
			);
			$ps = $db -> prepare("INSERT INTO users (name,email,password,created_at) VALUES (:name,:email,:pass,:ca)");
			$ps -> execute($user);
			$user['id'] = $db ->lastInsertId();

			//self:: storeUserSocial($user,$socialUser,$service,$db);
self::login($user);

		}
		else
		{

			/*if(!self::checkUserSocialService($user,$socialUser,$service,$db))
			{
				self:: storeUserSocial($user,$socialUser,$service,$db);
			}*/
			echo "Ya estas registrado";
			self::logout();
		}

		


	}

	protected static function getExistingUser($userEmail,$db)
	{

		$ps = $db -> prepare("SELECT id, name, email FROM users WHERE email = :email");
		$ps->execute([
			':email' => $userEmail
		]);
		$result = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $result ? $result[0]:null;

	}

    //Guarda los datos de la red social
	protected static function storeUserSocial($user,$socialUser,$service,$db)
	{

		$ps = $db -> prepare("INSERT INTO users_social (user_id,social_id,service) VALUES (:user_id,:social_id,:service)");

			$ps -> execute([
				':user_id' => $user['id'],
				':social_id' => $socialUser->identifier,
				':service' => $service

			]);

	}


	protected static function checkUserSocialService($user,$socialUser,$service,$db)
	{

		$ps = $db -> prepare("SELECT * FROM user_social WHERE user_id = :user_id AND service = :service AND social_id = :social_id");

			$ps -> execute([
				':user_id' => $user['id'],
				':service' => $service,
				':social_id' => $socialUser->identifier
				

			]);

			return (bool) $ps ->fetchAll(PDO::FETCH_ASSOC);
	}

	//Comprobar si el usuario ya esta logeado.
	public static function isLogin()
	{
		return (bool) isset ($_SESSION['user']);

	}

	//Funcion para login.S
	protected static function login($user)
	{
		$_SESSION['user'] = $user;
	}

	//Funcion para cerrar sesión.
	public static function logout()
	{

		if (self::isLogin())
		{

			unset($_SESSION['user']);
		}
	}





	}


?>
