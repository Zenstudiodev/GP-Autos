<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/07/2017
 * Time: 7:31 PM
 */
class Formularios  extends Base_Controller
{
	public function  __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('Carros_model');
		$this->load->model('Formularios_model');
		$this->load->helper('carros');
        $this->load->model('Banners_model');
	}
	public function index(){
		$this->email->from('info@gpautos.net', 'GP AUTOS');
		$this->email->to('csamayoa@zenstudiogt.com');
		$this->email->cc('carlossamayoa27@gmail.com');
		$this->email->bcc('dlatios@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class. desde condeigniter');

		$this->email->send();

	}
	public function info_anunciate(){
		//comprobamos que exista post
		if($this->input->post('correo')){
			//leemos datos desde post
			$tipo = $this->input->post('tipo');
			$nombre = $this->input->post('nombre');
			$correo = $this->input->post('correo');
			$telefono= $this->input->post('telefono');

			//configuracion de correo
			$config['mailtype'] = 'html';

			/*$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'info@gpautos.net',
				'smtp_pass' => 'JdGg2005gp',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);*/
			$this->email->initialize($config);

			$this->email->from('info@gpautos.net', 'GP AUTOS - anunciate');
			$this->email->to('gerencia@gpautos.net');
			$this->email->bcc('csamayoa@zenstudiogt.com');
			$this->email->subject('Cliente interesado en anunciarse: '.$tipo);

			//mensaje
			$message = '<html><body>';
			$message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUTOS" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($correo) . "</td></tr>";
			$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";


			$this->email->message($message);

			//enviar correo
			$this->email->send();

			echo'send';
		}else{
			//redirigir al home
			redirect(base_url());
		}

	}
	public function predio_interesado(){
        //comprobamos que exista post
        if($this->input->post('predio_correo')){
            //leemos datos desde post
            $contacto = $this->input->post('predio_contacto');
            $predio_nombre = $this->input->post('predio_nombre');
            $predio_vehiculos = $this->input->post('predio_vehiculos');
            $predio_correo= $this->input->post('predio_correo');
            $predio_telefono= $this->input->post('predio_telefono');
            $predio_direccion= $this->input->post('predio_direccion');
            //configuracion de correo
            $config['mailtype'] = 'html';

            $configGmail = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'info@gpautos.net',
                'smtp_pass' => 'JdGg2005gp',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            );
            $this->email->initialize($configGmail);

            $this->email->from('info@gpautos.net', 'GP AUTOS - anunciate');
            $this->email->to('gerencia@gpautos.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Predio interesado : ');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUTOS" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Contacto:</strong> </td><td>" .strip_tags($contacto) ."</td></tr>";
            $message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($predio_nombre) . "</td></tr>";
            $message .= "<tr><td><strong>Vehiculos:</strong> </td><td>" . strip_tags($predio_vehiculos) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($predio_correo) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($predio_telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Dirección:</strong> </td><td>" . strip_tags($predio_direccion) . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";


            $this->email->message($message);

            //enviar correo
            $this->email->send();

            echo'send';
        }else{
            //redirigir al home
            redirect(base_url());
        }
    }
	public function info_carro(){
		//comprobamos que exista post
		if($this->input->post('correo')){
			//leemos datos desde post
			$nombre = $this->input->post('nombre');
			$apellido =$this->input->post('apellido');
			$correo = $this->input->post('correo');
			$telefono= $this->input->post('telefono');
			$comentario= $this->input->post('comentario');
			$carro_codigo= $this->input->post('carro_codigo');
			$fecha = new DateTime();

			$dataFromulario = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'email' => $correo,
				'telefono' => $telefono,
				'comentario' => $comentario,
				'codigo_carro' => $carro_codigo,
				'fecha' => $fecha->format('Y-m-d H:i:s')
			);


			$datos_carro = $this->Carros_model->get_datos_carro($carro_codigo);
            $datos_carro = $datos_carro->row();
            $email_contacto = $datos_carro->crr_contacto_email;
           // if ($email_contacto == '' or $email_contacto== null or $email_contacto =="0" or $datos_carro->id_predio_virtual == '9'){
            if ($email_contacto == '' or $email_contacto== null or $email_contacto =="0"){
                $email_contacto = 'gppredio@gpautos.net';
            }

			//configuracion de correo
			$config['mailtype'] = 'html';

			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'info@gpautos.net',
				'smtp_pass' => 'JdGg2005gp',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);
			$this->email->initialize($configGmail);


			$this->email->from('info@gpautos.net', 'GP AUTOS');
			$this->email->to($email_contacto);
			$this->email->bcc('csamayoa@zenstudiogt.com');

			$this->email->subject('Información sobre carro COD:'.$carro_codigo);

			//mensaje
			$message = '<html><body>';
			$message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUTOS" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."  ".strip_tags($apellido)."</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($correo) . "</td></tr>";
			$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
			$message .= "<tr><td><strong>Comentario:</strong> </td><td>" . strip_tags($comentario) . "</td></tr>";
			$message .= "<tr><td><strong>Codigo de carro:</strong> </td><td><a target='_blank' href='". base_url()."index.php/Carro/ver/".$carro_codigo."'>".strip_tags($carro_codigo) . "</a></td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";


			$this->email->message($message);

			//Guardamos el formulario
			$this->Formularios_model->guardar_formulario_carro($dataFromulario);
			//enviar correo
			$this->email->send();


			echo'send';
		}else{
			//redirigir al home
			redirect(base_url());
		}

	}
	public function credito_carro(){
		//comprobamos que exista post
		if($this->input->post('correo')){
			//leemos datos desde post
			$nombre = $this->input->post('nombre');
			$apellido =$this->input->post('apellido');
			$correo = $this->input->post('correo');
			$telefono= $this->input->post('telefono');
			$carro_codigo= $this->input->post('carro_codigo');
			$precio_carro= $this->input->post('precio_carro');
			$enganche= $this->input->post('enganche');
			$plazo= $this->input->post('plazo');
			$cuota= $this->input->post('cuota');
			$fecha = new DateTime();


			$dataFromulario = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'email' => $correo,
				'telefono' => $telefono,
				'precio_carro' => $precio_carro,
				'enganche' => $enganche,
				'plazo' => $plazo,
				'cuota' => $cuota,
				'codigo_carro' => $carro_codigo,
				'fecha' => $fecha->format('Y-m-d H:i:s')
			);

			//configuracion de correo
			$config['mailtype'] = 'html';

			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'info@gpautos.net',
				'smtp_pass' => 'JdGg2005gp',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);
			$this->email->initialize($configGmail);


			$this->email->from('info@gpautos.net', 'GP AUTOS');
			$this->email->to('creditos@gpautos.net,');
			$this->email->cc($correo);
			$this->email->bcc('csamayoa@zenstudiogt.com');

			$this->email->subject('Solicitude de credito para carro COD:'.$carro_codigo);

			//mensaje
			$message = '<html><body>';
			$message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUTOS" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."  ".strip_tags($apellido)."</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($correo) . "</td></tr>";
			$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
			$message .= "<tr><td><strong>Precio del carro:</strong> </td><td>" . strip_tags($precio_carro) . "</td></tr>";
			$message .= "<tr><td><strong>Enganche:</strong> </td><td>" . strip_tags($enganche) . "</td></tr>";
			$message .= "<tr><td><strong>Plazo:</strong> </td><td>" . strip_tags($plazo) . "</td></tr>";
			$message .= "<tr><td><strong>Cuota:</strong> </td><td>" . strip_tags($cuota) . "</td></tr>";
			$message .= "<tr><td><strong>Codigo de carro:</strong> </td><td><a target='_blank' href='". base_url()."index.php/Carro/ver/".$carro_codigo."'>".strip_tags($carro_codigo) . "</a></td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";

			$this->email->message($message);

			//Guardamos el formulario
			$this->Formularios_model->guardar_formulario_credito($dataFromulario);
			//enviar correo
			$this->email->send();


			echo'send';
		}else{
			//redirigir al home
			redirect(base_url());
		}

	}
	public function seguros(){
		//leemos datos desde post
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$nacimiento = $this->input->post('nacimiento');
		$telefono= $this->input->post('telefono');
		$genero = $this->input->post('genero');
		$tipo_vehiculo = $this->input->post('tipo_vehiculo');
		$marca = $this->input->post('marca');
		$linea = $this->input->post('linea');
		$modelo = $this->input->post('modelo');
		$valor = $this->input->post('valor');
		$covertura_menores = $this->input->post('covertura_menores');
		$aseguradora = $this->input->post('aseguradora');
		$fecha = new DateTime();


		$dataFromulario = array(
			'nombre' => $nombre,
			'email' => $email,
			'fecha_nacimiento' => $nacimiento,
			'telefono' => $telefono,
			'genero' => $genero,
			'tipo_vehiculo' => $tipo_vehiculo,
			'marca' => $marca,
			'linea' => $linea,
			'modelo' => $modelo,
			'valor' => $valor,
			'covertura_menores' => $covertura_menores,
			'aseguradora' => $aseguradora,
			'fecha' => $fecha->format('Y-m-d H:i:s')
		);


		//configuracion de correo
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'info@gpautos.net',
			'smtp_pass' => 'JdGg2005gp',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);
		$this->email->initialize($configGmail);

		$this->email->from('info@gpautos.net', 'GP AUTOS');
		$this->email->to('gerencia@gpautos.net');
		$this->email->bcc('csamayoa@zenstudiogt.com');

		$this->email->subject('Informacion sobre seguros');

		//mensaje
		$message = '<html><body>';
		$message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUTOS" />';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
		$message .= "<tr><td><strong>Fecha de nacimiento:</strong> </td><td>" . $nacimiento . "</td></tr>";
		$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . $telefono . "</td></tr>";
		$message .= "<tr><td><strong>Genero:</strong> </td><td>" .$genero . "</td></tr>";
		$message .= "<tr><td><strong>Tipo de vehiculo:</strong> </td><td>" .$tipo_vehiculo . "</td></tr>";
		$message .= "<tr><td><strong>Marca:</strong> </td><td>" .$marca . "</td></tr>";
		$message .= "<tr><td><strong>Linea:</strong> </td><td>" .$linea . "</td></tr>";
		$message .= "<tr><td><strong>Modelo:</strong> </td><td>" .$modelo . "</td></tr>";
		$message .= "<tr><td><strong>Valor:</strong> </td><td>" .$valor . "</td></tr>";
		$message .= "<tr><td><strong>Covertura a menores:</strong> </td><td>" .$covertura_menores . "</td></tr>";
		$message .= "<tr><td><strong>Aseguradora:</strong> </td><td>" .$aseguradora . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";


		$this->email->message($message);

		//Guardamos el formulario
		$this->Formularios_model->guardar_formulario_seguro($dataFromulario);

		//enviar correo
		$this->email->send();

		echo'send';
	}
    public function pre_calificacion(){
        //comprobamos que exista post

        //print_contenido($_POST);
        //exit();
        if($this->input->post('correo')){
            //leemos datos desde post
            $nombre = $this->input->post('nombre');
            $numero_telefono= $this->input->post('numero_telefono');
            $numero_celular= $this->input->post('numero_celular');
            $correo= $this->input->post('correo');
            $monto_vehiculo= $this->input->post('monto_vehiculo');
            $que_vehiculo= $this->input->post('que_vehiculo');
            $vehiculo_deseado= $this->input->post('vehiculo_deseado');
            $terminos= $this->input->post('acepto_terminos');

            //configuracion de correo
            $config['mailtype'] = 'html';

            $configGmail = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'creditos@gpautos.net',
                'smtp_pass' => 'Chinitoweb2020',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            );
            $this->email->initialize($configGmail);

            $this->email->from('creditos@gpautos.net', 'GP AUTOS - Precalificación');
            $this->email->to('creditos@gpautos.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Cliente interesado en precalificación:');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="http://gp.carrosapagos.com/ui/public/images/logoGp.png" alt="GP AUT OS" />';
            $message .= '<table>';
            $message .= "<tr><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($correo) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($numero_telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Celular:</strong> </td><td>" . strip_tags($numero_celular) . "</td></tr>";
            $message .= "<tr><td><strong>Monto vehículo:</strong> </td><td>" . strip_tags($monto_vehiculo) . "</td></tr>";
            $message .= "<tr><td><strong>ya tiene vehículo para comprar?</strong> </td><td>" . strip_tags($que_vehiculo) . "</td></tr>";
            $message .= "<tr><td><strong>desea que le busquemos alguna opcion?</strong> </td><td>" . strip_tags($vehiculo_deseado) . "</td></tr>";
            $message .= "<tr><td><strong>Terminos:</strong> </td><td>" . strip_tags($terminos) . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";


            $this->email->message($message);

            //enviar correo
            $this->email->send();

           // echo'send';

            $this->email->from('creditos@gpautos.net', 'GP AUTOS - Precalificaci&oacute;n');
            $this->email->to($correo);
            //$this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Gracias por precalificarte por medio de GPautos');

            //mensaje
            $message = '<html><body>';
            $message .= '<h1>Gracias por cotizar con GPAUTOS.NET</h1>';
            $message .= '<img src="https://gpautos.net/ui/public/images/logoGp.png" alt="GP AUTOS" />';
            $message .= "<h2>En un momento uno de nuestros asesores te enviará tu cotización y se comunicará con tu persona.</h2>";
            $message .= "<p>En caso desees aplicar a crédito te enviamos los requisitos solicitados por el banco:<br>";
            $message .= "- 3 últimos estados de cuenta bancarios.<br>";
            $message .= "- Carta de ingresos de la empresa donde laboras.<br>";
            $message .= "- Copia de DPI - copia de 2do.documento de identificación.</p>";
            $message .= "<p>Atentamente:<br>";
            $message .= "<p>Creditos Gpautos: <br>";
            $message .= "creditos@gpautos.net <br>";
            $message .= "2 av 20-29 Zona 10<br>";
            $message .= "PBX:2294-5656</p>";
            $message .= "</body></html>";


            $this->email->message($message);

            //enviar correo
            $this->email->send();
           // print_contenido($message);
           // echo'send';
            redirect(base_url().'formularios/gracias_precalificacion');
        }else{
            //redirigir al home
            redirect(base_url());
        }

    }
    public function gracias_precalificacion(){
        $data = cargar_componentes_buscador();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_financiamiento_gracias', $data);
    }
}