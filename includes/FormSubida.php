<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormSubida extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {

        $html = '<div>';

        $html .= '<select name="archivo" id="archivo">
        <option value="profesores">Profesores</option>
        <option value="usuarios">Usuarios</option>
        <option value="asignaturas">Asignaturas</option>
        <option value="grupos">Grupos</option>
    </select>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <br>
    <b>Carga de Archivo </b>
    <br>
    <input id="userfile" name="userfile" type="file">
    <br>
    <button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>';

        if (is_file(LOGS . '/log_errores.txt')) {
            $html .= '<a href="downloadlog.php">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Descargar Log
		</button>
        </a>';
        }

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $huboerror = false;
        $erroresFormulario = array();
        $archivo = $datos['archivo'];

        date_default_timezone_set("Europe/Madrid");
        $controller = new ControllerImplements();
        if (isset($_FILES['userfile'])) {
            $nombre_archivo = $_FILES['userfile']['name'];
            //echo STORAGE;
            //aqui debo verificar antes que el directorio storage exista
            if (!file_exists(STORAGE)) {

                mkdir(STORAGE, 0777, true);
            }

            if (!file_exists(LOGS)) {

                mkdir(LOGS, 0777, true);
            }

            //$nombre_con_ruta = RUTA_APP. '/../storage/' . $nombre_archivo;
            $nombre_con_ruta = STORAGE . "/" . $nombre_archivo;

            //$tipo_archivo = $_FILES['userfile']['type'];
            $tamano_archivo = $_FILES['userfile']['size'];
            $info = new \SplFileInfo($nombre_archivo);
            $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
            if ($extension != "csv" || $tamano_archivo > 100000) {
                $erroresFormulario[] = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .csv y se permiten archivos de 100 KB máximo.";
            } else {
                if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $nombre_con_ruta)) {

                    //aqui ya puedo abrir el archivo
                    $handle = fopen($nombre_con_ruta, "r");
                    $cabeceras = fgetcsv($handle, 0, ";");

                    $cabeceras_utf8 = array();
                    $registros = array();
                    //creo un array nuevo con utf-8 para leer correctamente acentos
                    foreach ($cabeceras as $cab) {
                        array_push($cabeceras_utf8, utf8_encode($cab));
                    }
                    $num_cabeceras = count($cabeceras);
                    //verifico por el numero de cabeceras si el archivo que sube el usuario, realmente es el que selecciono en el select
                    //archivo profesores debe tener 6 cabeceras
                    //archivo usuarios debe tener 2 cabeceras
                    //archivo asignaturas debe tener 19 cabeceras
                    //archivo grupos debe tener 10 cabeceras
                    if ($archivo == "grupos") {
                        if ($num_cabeceras != 10) {
                            $erroresFormulario[] = "El archivo no tiene el formato de grupos";
                        }
                        if (count($erroresFormulario) === 0) {
                            $fila = 2;
                            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                for ($icampo = 0; $icampo < $num_cabeceras; $icampo++) {
                                    $registro[$cabeceras_utf8[$icampo]] = utf8_encode($data[$icampo]);
                                    if ($icampo == 0) {
                                        $codigo_asignatura = trim($data[$icampo]); //int(6)
                                        if ($codigo_asignatura != "" && $codigo_asignatura != null)
                                            $codigo_asignatura = (int)trim($data[$icampo]); //int(6)
                                    }

                                    if ($icampo == 2) {
                                        $insertaenGrupoLab = false;
                                        $insertaenGrupoClase = false;
                                        $clase_actividad = utf8_encode(trim($data[$icampo])); //varchar
                                        if ($clase_actividad == "Laboratorios") {
                                            $insertaenGrupoLab = true;
                                        } else {
                                            $insertaenGrupoClase = true;
                                        }
                                    }



                                    if ($icampo == 3)
                                        $grupo_letra = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 4) {
                                        //debo tomar solo la letra1
                                        $dia = utf8_encode(trim($data[$icampo])); //char(1)	
                                        if ($dia != "" && $dia != null) {
                                            if ($dia == "MIÉRCOLES" || $dia == "MIERCOLES") {
                                                $dia = "X";
                                            } else {
                                                $dia = substr($dia, 0, 1);
                                            }
                                        } else {
                                            $dia = "";
                                        }
                                    }

                                    if ($icampo == 5)
                                        $hora_inicio = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 6)
                                        $hora_fin = utf8_encode(trim($data[$icampo])); //varchar					


                                    if ($icampo == 8)
                                        $aula = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 9)
                                        $email_profesor = utf8_encode(trim($data[$icampo])); //varchar
                                } //For

                                $context = new Context(FIND_ASIGNATURA, $codigo_asignatura);
                                $as = $controller->action($context);
                                if ($as->getEvent() === FIND_ASIGNATURA_OK) {
                                    if ($codigo_asignatura != "" && $codigo_asignatura != null) {
                                        $comparacion = array(
                                            'email' => $email_profesor,
                                            'asignatura' => $codigo_asignatura
                                        );
                                        $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $comparacion);
                                        $contextPermisos = $controller->action($context);
                                        if ($contextPermisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_FAIL) {
                                            if($as->getData()->getCoordinadorAsignatura() === $email_profesor){
                                            $permisos = new Permisos(null, 1, 0, 0, 1, 1, 1, 1, $codigo_asignatura, $email_profesor);

                                            }
                                            else{
                                            $permisos = new Permisos(null, 1, 0, 0, 1, 0, 0, 1, $codigo_asignatura, $email_profesor);
                                            }
                                            $context = new Context(CREATE_PERMISOS, $permisos);
                                            $contextProfesor = $controller->action($context);
                                            if ($contextProfesor->getEvent() === CREATE_PERMISOS_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No se pudo crear los permisos del profesor con email " . $email_profesor . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }
                                        }
                                        if ($insertaenGrupoClase) {
                                            $comparacion = array(0 => $codigo_asignatura, 1 => $grupo_letra);
                                            $context = new Context(FIND_GRUPO_CLASE_LETRA, $comparacion);
                                            $contextGL = $controller->action($context);
                                            if ($contextGL->getEvent() === FIND_GRUPO_CLASE_LETRA_FAIL) {
                                                $grupoClase = new GrupoClase(null, $grupo_letra, 'español', $codigo_asignatura);
                                                $context = new Context(CREATE_GRUPO_CLASE, $grupoClase);
                                                $contextGC = $controller->action($context);
                                            } else {
                                                $grupoClase = new GrupoClase($contextGL->getData()->getIdGrupoClase(), $grupo_letra, $contextGL->getData()->getIdioma(), $codigo_asignatura);
                                                $context = new Context(UPDATE_GRUPO_CLASE, $grupoClase);
                                                $contextGC = $controller->action($context);
                                            }
                                            $comparacion = array(0 => $codigo_asignatura, 1 => $grupo_letra);
                                            $context = new Context(FIND_GRUPO_CLASE_LETRA, $comparacion);
                                            $contextGL = $controller->action($context);
                                            $data = array("idGrupoClase" => $contextGL->getData()->getIdGrupoClase(), "emailProfesor" => $email_profesor);
                                            $context = new Context(FIND_GRUPO_CLASE_PROFESOR, $data);
                                            $contextGCP = $controller->action($context);
                                            if ($contextGCP->getEvent() === FIND_GRUPO_CLASE_PROFESOR_FAIL) {
                                                $grupoClaseP = new GrupoClaseProfesor($contextGL->getData()->getIdGrupoClase(), "", date("Y-m-d H:i:s", strtotime($hora_inicio)), date("Y-m-d H:i:s", strtotime($hora_fin)), $email_profesor);
                                                $context = new Context(CREATE_GRUPO_CLASE_PROFESOR, $grupoClaseP);
                                                $contextGCP = $controller->action($context);
                                            } else {
                                                $grupoClaseP = new GrupoClaseProfesor($contextGL->getData()->getIdGrupoClase(), "", date("Y-m-d H:i:s", strtotime($hora_inicio)), date("Y-m-d H:i:s", strtotime($hora_fin)), $email_profesor);
                                                $context = new Context(UPDATE_GRUPO_CLASE_PROFESOR, $grupoClaseP);
                                                $contextGCP = $controller->action($context);
                                            }
                                            $comparacion = array(0 => $contextGL->getData()->getIdGrupoClase(), 1 => $dia);
                                            $context = new Context(FIND_HORARIO_CLASE_GRUPO_DIA, $comparacion);
                                            $contextGCD = $controller->action($context);
                                            $horario = new HorarioClase(null, $aula, $dia, date("Y-m-d H:i:s", strtotime($hora_inicio)), date("Y-m-d H:i:s", strtotime($hora_fin)), $contextGL->getData()->getIdGrupoClase());
                                            if ($contextGCD->getEvent() === FIND_HORARIO_CLASE_GRUPO_DIA_FAIL) {
                                                $context = new Context(CREATE_HORARIO_CLASE, $horario);
                                                $contextGCD = $controller->action($context);
                                            } elseif ($contextGCD->getEvent() === FIND_HORARIO_CLASE_GRUPO_DIA_OK) {
                                                $horario->setIdHorarioClase($contextGCD->getData()->getIdHorarioClase());
                                                $context = new Context(UPDATE_HORARIO_CLASE, $horario);
                                                $contextGCD = $controller->action($context);
                                            }
                                        }
                                        if ($insertaenGrupoLab) {
                                            $comparacion = array(0 => $codigo_asignatura, 1 => $grupo_letra);
                                            $context = new Context(FIND_GRUPO_LABORATORIO_LETRA, $comparacion);
                                            $contextGL = $controller->action($context);
                                            if ($contextGL->getEvent() === FIND_GRUPO_LABORATORIO_LETRA_FAIL) {
                                                $grupoLaboratorio = new GrupoLaboratorio(null, $grupo_letra, 'español', $codigo_asignatura);
                                                $context = new Context(CREATE_GRUPO_LABORATORIO, $grupoLaboratorio);
                                                $contextGL = $controller->action($context);
                                            } else {
                                                $grupoLaboratorio = new GrupoLaboratorio($contextGL->getData()->getIdGrupoLab(), $grupo_letra, $contextGL->getData()->getIdioma(), $codigo_asignatura);
                                                $context = new Context(UPDATE_GRUPO_LABORATORIO, $grupoLaboratorio);
                                                $contextGL = $controller->action($context);
                                            }
                                            
                                            $comparacion = array(0 => $codigo_asignatura, 1 => $grupo_letra);
                                           
                                            $context = new Context(FIND_GRUPO_LABORATORIO_LETRA, $comparacion);
                                            $contextGL = $controller->action($context);
                                           
                                            $data = array("idGrupoLaboratorio" => $contextGL->getData()->getIdGrupoLab(), "emailProfesor" => $email_profesor);
                                            $context = new Context(FIND_GRUPO_LABORATORIO_PROFESOR, $data);
                                            $contextGCP = $controller->action($context);
                                            if ($contextGCP->getEvent() === FIND_GRUPO_LABORATORIO_PROFESOR_FAIL) {
                                                $grupoLaboratorioP = new GrupoLaboratorioProfesor($contextGL->getData()->getIdGrupoLab(), date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $email_profesor);
                                                $context = new Context(CREATE_GRUPO_LABORATORIO_PROFESOR, $grupoLaboratorioP);
                                                $contextGCP = $controller->action($context);
                                            } else {
                                                $grupoLaboratorioP = new GrupoLaboratorioProfesor($contextGL->getData()->getIdGrupoLab(), date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $email_profesor);
                                                $context = new Context(UPDATE_GRUPO_LABORATORIO_PROFESOR, $grupoLaboratorioP);
                                                $contextGCP = $controller->action($context);
                                            }
                                            $comparacion = array(0 => $contextGL->getData()->getIdGrupoLab(), 1 => $dia);
                                            $context = new Context(FIND_HORARIO_LABORATORIO_GRUPO_DIA, $comparacion);
                                            $contextLGD = $controller->action($context);
                                            $horario = new HorarioLaboratorio(null, $aula, $dia, date("Y-m-d H:i:s", strtotime($hora_inicio)), date("Y-m-d H:i:s", strtotime($hora_fin)), $contextGL->getData()->getIdGrupoLab());
                                            if ($contextLGD->getEvent() === FIND_HORARIO_LABORATORIO_GRUPO_DIA_FAIL) {
                                                $context = new Context(CREATE_HORARIO_LABORATORIO, $horario);
                                                $contextGCD = $controller->action($context);
                                            } elseif ($contextLGD->getEvent() === FIND_HORARIO_LABORATORIO_GRUPO_DIA_OK) {
                                                $horario->setIdHorarioLab($contextLGD->getData()->getIdHorarioLab());
                                                $context = new Context(UPDATE_HORARIO_LABORATORIO, $horario);
                                                $contextGCD = $controller->action($context);
                                            }
                                            
                                        }
                                    
                                    } //null
                                } else {
                                    error_log(date("Y-m-d H:i:s") . " La asignatura que intenta añadir no existe \r\n", 3, LOGS . "/log_errores.txt");
                                }
                            } //while
                        } //Sinerrores

                    } elseif ($archivo == "profesores") {
                        if ($num_cabeceras != 6) {
                            $erroresFormulario[] = "El archivo no tiene el formato de profesores";
                        }
                        if (count($erroresFormulario) === 0) {
                            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                // Crea un array asociativo con los nombres y valores de los campos
                                for ($icampo = 0; $icampo < $num_cabeceras; $icampo++) {
                                    $registro[$cabeceras_utf8[$icampo]] = utf8_encode($data[$icampo]);

                                    //leo el nombre de las cabeceras y lo convierto a minusculas
                                    $id_cab = $cabeceras_utf8[$icampo];

                                    if ($id_cab == "email")
                                        $email = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Profesor")
                                        $profesor = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Departamento")
                                        $depto = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Despacho")
                                        $despacho = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Tutorías" || $id_cab == "Tutorias")
                                        $tutorias = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Facultad")
                                        $facultad = utf8_encode($data[$icampo]);
                                }
                                // se agrega la posibilidad de hacer update si el registro ya existe
                                $context = new Context(FIND_PROFESOR, $email);
                                $contextProfesor = $controller->action($context);
                                $profesor = new Profesor($email, $profesor, $depto, $despacho, $tutorias, $facultad);

                                if ($contextProfesor->getEvent() === FIND_PROFESOR_OK) {
                                    $context = new Context(UPDATE_PROFESOR, $profesor);
                                    $contextProfesor = $controller->action($context);
                                    if ($contextProfesor->getEvent() === UPDATE_PROFESOR_FAIL) {
                                        $huboerror = true;
                                        //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                        error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el profesor con email" . $email . "\r\n", 3, LOGS . "/log_errores.txt");
                                    }
                                } elseif ($contextProfesor->getEvent() === FIND_PROFESOR_FAIL) {
                                    $context = new Context(CREATE_PROFESOR, $profesor);
                                    $contextProfesor = $controller->action($context);
                                    if ($contextProfesor->getEvent() === CREATE_PROFESOR_FAIL) {
                                        $huboerror = true;
                                        //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                        error_log(date("Y-m-d H:i:s") . " No pudo crearse el profesor con email" . $email . "\r\n", 3, LOGS . "/log_errores.txt");
                                    }
                                }
                            } //FinWhile

                            fclose($handle);
                            //echo $huboerror;
                            if ($huboerror) {
                                //$erroresFormulario = "indexAdmin.php";
                                //descargarLog($txt_log);
                            } else {
                                $erroresFormulario = "indexAdmin.php";
                            }
                        }
                    } //FinProfesores
                    elseif ($archivo == "usuarios") {
                        if ($num_cabeceras != 2) {
                            $erroresFormulario[] = "El archivo no tiene el formato de usuarios";
                        }
                        if (count($erroresFormulario) === 0) {
                            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                // Crea un array asociativo con los nombres y valores de los campos
                                for ($icampo = 0; $icampo < $num_cabeceras; $icampo++) {
                                    $registro[$cabeceras_utf8[$icampo]] = utf8_encode($data[$icampo]);

                                    //leo el nombre de las cabeceras y lo convierto a minusculas
                                    $id_cab = $cabeceras_utf8[$icampo];

                                    if ($id_cab == "email")
                                        $email = utf8_encode($data[$icampo]);
                                    if ($id_cab == "Password") {
                                        $password = utf8_encode($data[$icampo]);
                                        if ($password != "") {
                                            $pass_hash = password_hash(trim($password), PASSWORD_BCRYPT);
                                        } else {
                                            $pass_hash = password_hash(trim(explode('@', $email)[0]), PASSWORD_BCRYPT);
                                        }
                                    }
                                } //finFor
                                $context = new Context(FIND_USUARIO, $email);
                                $contextUsuario = $controller->action($context);
                                $usuario = new Usuario($email, $pass_hash);
                                if ($contextUsuario->getEvent() === FIND_USUARIO_OK) {
                                    $context = new Context(UPDATE_USUARIO, $usuario);
                                    $contextUsuario = $controller->action($context);
                                    if ($contextUsuario->getEvent() === UPDATE_USUARIO_FAIL) {
                                        $huboerror = true;
                                        //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                        error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el usuario con email" . $email . "\r\n", 3, LOGS . "/log_errores.txt");
                                    }
                                } elseif ($contextUsuario->getEvent() === FIND_USUARIO_FAIL) {
                                    $context = new Context(CREATE_USUARIO, $usuario);
                                    $contextUsuario = $controller->action($context);
                                    if ($contextUsuario->getEvent() === CREATE_USUARIO_FAIL) {
                                        $huboerror = true;
                                        //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                        error_log(date("Y-m-d H:i:s") . " No pudo crearse el usuario con email" . $email . "\r\n", 3, LOGS . "/log_errores.txt");
                                    }
                                }
                            } //FinWhile
                            fclose($handle);

                            if ($huboerror) {

                                // descargarLog($txt_log);
                            } else {
                                $erroresFormulario = "indexAdmin.php";
                            }
                        }
                    } //FinUsuarios
                    elseif ($archivo == "asignaturas") {
                        if ($num_cabeceras != 19) {
                            $erroresFormulario[] = "El archivo no tiene el formato de asignaturas";
                        }
                        if (count($erroresFormulario) === 0) {
                            $fila = 2;
                            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                // Crea un array asociativo con los nombres y valores de los campos
                                for ($icampo = 0; $icampo < $num_cabeceras; $icampo++) {
                                    $registro[$cabeceras_utf8[$icampo]] = utf8_encode($data[$icampo]);
                                    if ($icampo == 0) {
                                        $codigo_grado = trim($data[$icampo]); //int(6)
                                        if ($codigo_grado != "" && $codigo_grado != null)
                                            $codigo_grado = (int)trim($data[$icampo]); //int(6)
                                    }

                                    if ($icampo == 1)
                                        $nombre_grado = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 2) {
                                        $id_modulo = trim($data[$icampo]); //int(7)
                                        if ($id_modulo != "" && $id_modulo != null)
                                            $id_modulo = (int)trim($data[$icampo]); //int(7)
                                    }


                                    if ($icampo == 3)
                                        $nombre_modulo = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 4) {
                                        $id_materia = trim($data[$icampo]); //int(8)
                                        if ($id_materia != "" && $id_materia != null)
                                            $id_materia = (int)trim($data[$icampo]); //int(8)
                                    }


                                    if ($icampo == 5)
                                        $nombre_materia = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 6)
                                        $caracter_materia = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 7) {
                                        $codigo_asignatura = trim($data[$icampo]); //int(6)
                                        if ($codigo_asignatura != "" && $codigo_asignatura != null)
                                            $codigo_asignatura = (int)trim($data[$icampo]); //int(6)
                                    }


                                    if ($icampo == 8)
                                        $nombre_asignatura = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 9)
                                        $nombre_asignatura_ingles = utf8_encode(trim($data[$icampo])); //varchar

                                    if ($icampo == 10) {
                                        $curso = trim($data[$icampo]); //int(1)
                                        if ($curso != "" && $curso != null)
                                            $curso = (int)utf8_encode($data[$icampo]); //int(1)
                                    }


                                    if ($icampo == 11) {
                                        $semestre = trim($data[$icampo]); //int(1)
                                        if ($semestre != "" && $semestre != null)
                                            $semestre = (int)trim($data[$icampo]); //int(1)
                                    }


                                    if ($icampo == 12) {
                                        $t = trim($data[$icampo]); //float
                                        $t = floatval(str_replace(',', '.', $t));
                                        if ($t == "" || $t == null)
                                            $t = 0;
                                        //$t = (float)trim($data[$icampo]); //float

                                    }


                                    if ($icampo == 13) {
                                        $p = trim($data[$icampo]); //float
                                        $p = floatval(str_replace(',', '.', $p));
                                        if ($p == "" || $p == null)
                                            $p = 0;
                                        //$p = trim($data[$icampo]); //float
                                    }


                                    if ($icampo == 14) {
                                        $l = trim($data[$icampo]); //float
                                        $l = floatval(str_replace(',', '.', $l));
                                        if ($l == "" || $l == null)
                                            $l = 0;
                                        //$l = (float)trim($data[$icampo]); //float
                                    }


                                    if ($icampo == 15) {
                                        $porciento_t = trim($data[$icampo]); //float
                                        if ($porciento_t == "" || $porciento_t == null)
                                            $porciento_t = 0;
                                        //$porciento_t = (float)trim($data[$icampo]); //float
                                    }


                                    if ($icampo == 16) {
                                        $porciento_p = trim($data[$icampo]); //float
                                        if ($porciento_p == "" || $porciento_p == null)
                                            $porciento_p = 0;
                                        //$porciento_p = (float)trim($data[$icampo]); //float*/
                                    }


                                    if ($icampo == 17) {
                                        $porciento_l = trim($data[$icampo]); //float
                                        if ($porciento_l == "" || $porciento_l == null)
                                            $porciento_l = 0;
                                        //$porciento_l = (float)trim($data[$icampo]); //float
                                    }


                                    if ($icampo == 18)
                                        $coordinador = utf8_encode(trim($data[$icampo])); //varchar

                                } //FinFor
                                if ($codigo_grado != "" && $codigo_grado != null) {
                                    $context = new Context(FIND_GRADO, $codigo_grado);
                                    $contextGrado = $controller->action($context);
                                    $grado = new Grado($codigo_grado, $nombre_grado, '', 1, 25);
                                    if ($contextGrado->getEvent() === FIND_GRADO_OK) {
                                        $context = new Context(UPDATE_GRADO, $grado);
                                        $contextGrado = $controller->action($context);
                                        if ($contextGrado->getEvent() === UPDATE_GRADO_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            //error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el grado" . $nombre_grado . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } elseif ($contextGrado->getEvent() === FIND_GRADO_FAIL) {
                                        $context = new Context(CREATE_GRADO, $grado);
                                        $contextGrado = $controller->action($context);
                                        if ($contextGrado->getEvent() === CREATE_GRADO_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            error_log(date("Y-m-d H:i:s") . " No pudo crearse el grado" . $nombre_grado . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } //Grado
                                    $context = new Context(FIND_MODULO, $id_modulo);
                                    $contextModulo = $controller->action($context);
                                    $modulo = new Modulo($id_modulo, $nombre_modulo, 0, 1, $codigo_grado);
                                    if ($contextModulo->getEvent() === FIND_MODULO_OK) {
                                        $context = new Context(UPDATE_MODULO, $modulo);
                                        $contextModulo = $controller->action($context);
                                        if ($contextModulo->getEvent() === UPDATE_MODULO_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            //error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el modulo" . $nombre_modulo . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } elseif ($contextModulo->getEvent() === FIND_MODULO_FAIL) {
                                        $context = new Context(CREATE_MODULO, $modulo);
                                        $contextModulo = $controller->action($context);
                                        if ($contextModulo->getEvent() === CREATE_MODULO_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            error_log(date("Y-m-d H:i:s") . " No pudo crearse el modulo" . $nombre_modulo . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } //Modulo
                                    $context = new Context(FIND_MATERIA, $id_materia);
                                    $contextMateria = $controller->action($context);
                                    $materia = new Materia($id_materia, $nombre_materia, $caracter_materia, 0, 1, $id_modulo);
                                    if ($contextMateria->getEvent() === FIND_MATERIA_OK) {
                                        $context = new Context(UPDATE_MATERIA, $materia);
                                        $contextMateria = $controller->action($context);
                                        if ($contextMateria->getEvent() === UPDATE_MATERIA_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            //error_log(date("Y-m-d H:i:s") . " No pudo actualizarse la materia " . $nombre_materia . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } elseif ($contextMateria->getEvent() === FIND_MATERIA_FAIL) {
                                        $context = new Context(CREATE_MATERIA, $materia);
                                        $contextMateria = $controller->action($context);
                                        if ($contextMateria->getEvent() === CREATE_MATERIA_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            error_log(date("Y-m-d H:i:s") . " No pudo crearse la materia " . $nombre_materia . "\r\n", 3, LOGS . "/log_errores.txt");
                                        }
                                    } //Materia

                                    $context = new Context(FIND_ASIGNATURA, $codigo_asignatura);
                                    $contextAsignatura = $controller->action($context);

                                    //echo $t . $p.$l;
                                    $suma_creditos = $t + $p + $l;
                                    $asignatura = new Asignatura($codigo_asignatura, $nombre_asignatura, "", $curso, $semestre, $nombre_asignatura_ingles, $suma_creditos, $coordinador, 'B', 1, $id_materia);
                                    $teorico = new Teorico(null, $t, $porciento_t, $codigo_asignatura);
                                    $laboratorio = new Laboratorio(null, $l, $porciento_l, $codigo_asignatura);
                                    $problema = new Problema(null, $p, $porciento_p, $codigo_asignatura);
                                    //echo "hola fuera";
                                    //echo $nombre_asignatura;
                                    if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK) {
                                        //echo "hola";
                                        $context = new Context(UPDATE_ASIGNATURA, $asignatura);
                                        $contextAsignatura = $controller->action($context);

                                        if ($contextAsignatura->getEvent() === UPDATE_ASIGNATURA_FAIL) {
                                            $huboerror = true;
                                            //echo "hola error";
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            error_log(date("Y-m-d H:i:s") . " No pudo actualizarse la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                        } else {
                                            //Actualizamos teorico, laboratorio y problemas. Si de por si la asignatura ya creada los tenia los actualizamos
                                            $context = new Context(FIND_TEORICO, $codigo_asignatura);
                                            $contextTeorico = $controller->action($context);
                                            if ($contextTeorico->getEvent() === FIND_TEORICO_OK) {
                                                $teorico->setIdTeorico($contextTeorico->getData()->getIdTeorico());
                                                $context = new Context(UPDATE_TEORICO, $teorico);
                                                $contextTeorico = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === UPDATE_TEORICO_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el teorico de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            } elseif ($contextTeorico->getEvent() === FIND_TEORICO_FAIL) {
                                                $context = new Context(CREATE_TEORICO, $teorico);
                                                $contextTeorico = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === CREATE_TEORICO_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo crearse el teorico de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            }

                                            $context = new Context(FIND_PROBLEMA, $codigo_asignatura);
                                            $contextProblema = $controller->action($context);

                                            if ($contextProblema->getEvent() === FIND_PROBLEMA_OK) {
                                                $problema->setIdProblema($contextProblema->getData()->getIdProblema());
                                                $context = new Context(UPDATE_PROBLEMA, $problema);
                                                $contextProblema = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === UPDATE_PROBLEMA_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el problema de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            } elseif ($contextProblema->getEvent() === FIND_PROBLEMA_FAIL) {
                                                $context = new Context(CREATE_PROBLEMA, $problema);
                                                $contextProblema = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === CREATE_PROBLEMA_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo crearse el problema de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            }

                                            $context = new Context(FIND_LABORATORIO, $codigo_asignatura);
                                            $contextLaboratorio = $controller->action($context);

                                            if ($contextLaboratorio->getEvent() === FIND_LABORATORIO_OK) {
                                                $laboratorio->setIdLaboratorio($contextLaboratorio->getData()->getIdLaboratorio());
                                                $context = new Context(UPDATE_LABORATORIO, $laboratorio);
                                                $contextLaboratorio = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === UPDATE_LABORATORIO_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo actualizarse el laboratorio de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            } elseif ($contextLaboratorio->getEvent() === FIND_LABORATORIO_FAIL) {
                                                $context = new Context(CREATE_LABORATORIO, $laboratorio);
                                                $contextLaboratorio = $controller->action($context);
                                                if ($contextAsignatura->getEvent() === CREATE_LABORATORIO_FAIL) {
                                                    $huboerror = true;
                                                    //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                    error_log(date("Y-m-d H:i:s") . " No pudo crearse el laboratorio de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                                }
                                            }
                                        }
                                    } elseif ($contextAsignatura->getEvent() === FIND_ASIGNATURA_FAIL) {
                                        //echo "hola fail";
                                        $context = new Context(CREATE_ASIGNATURA, $asignatura);
                                        $contextAsignatura = $controller->action($context);
                                        if ($contextAsignatura->getEvent() === CREATE_ASIGNATURA_FAIL) {
                                            $huboerror = true;
                                            //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                            //error_log(date("Y-m-d H:i:s") . " No pudo crearse la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                        } else {
                                            //Creamos su Mod asignatura
                                            $modAsignatura = new ModAsignatura($codigo_asignatura, date("Y-m-d H:i:s"), null, $codigo_asignatura);
                                            $context = new Context(CREATE_MODASIGNATURA, $modAsignatura);
                                            $contextMA = $controller->action($context);
                                            if ($contextMA->getEvent() === CREATE_MODASIGNATURA_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No pudo crearse el control de versiones de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }
                                            //Creamos las tablas vacias
                                            $configuracion = new Configuracion(null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, $codigo_asignatura);
                                            $context = new Context(CREATE_CONFIGURACION, $configuracion);
                                            $contextC = $controller->action($context);

                                            $metodologia = new Metodologia(null, "", "", $codigo_asignatura);
                                            $context = new Context(CREATE_METODOLOGIA, $metodologia);
                                            $contextM = $controller->action($context);

                                            $bibliografia = new Bibliografia(null, "", "", $codigo_asignatura);
                                            $context = new Context(CREATE_BIBLIOGRAFIA, $bibliografia);
                                            $contextB = $controller->action($context);

                                            $competenciasAsignatura = new CompetenciaAsignatura(null, "", "", "", "", "", "", "", "", $codigo_asignatura);
                                            $context = new Context(CREATE_COMPETENCIAS_ASIGNATURA, $competenciasAsignatura);
                                            $contextCA = $controller->action($context);

                                            $evaluacion = new Evaluacion(null, "", "", 0, "", "", 0, "", "", 0, "", "", $codigo_asignatura);
                                            $context = new Context(CREATE_EVALUACION, $evaluacion);
                                            $contextE = $controller->action($context);

                                            $programaasignatura = new ProgramaAsignatura(null, "", "", "", "", "", "", "", "", "", "", $codigo_asignatura);
                                            $context = new Context(CREATE_PROGRAMA_ASIGNATURA, $programaasignatura);
                                            $contextP = $controller->action($context);

                                            $verifica = new Verifica(null, 0, 0, 0, 0, 0, 0, $codigo_asignatura);
                                            $context = new Context(CREATE_VERIFICA, $verifica);
                                            $contextv = $controller->action($context);

                                            //Actualizamos teorico, laboratorio y problemas. Si de por si la asignatura ya creada los tenia los actualizamos
                                            $context = new Context(CREATE_TEORICO, $teorico);
                                            $contextTeorico = $controller->action($context);
                                            if ($contextTeorico->getEvent() === CREATE_TEORICO_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No pudo crearse el teorico de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }
                                            $context = new Context(CREATE_PROBLEMA, $problema);
                                            $contextProblema = $controller->action($context);
                                            if ($contextProblema->getEvent() === CREATE_PROBLEMA_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No pudo crearse el problema de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }
                                            $context = new Context(CREATE_LABORATORIO, $laboratorio);
                                            $contextLaboratorio = $controller->action($context);
                                            if ($contextLaboratorio->getEvent() === CREATE_LABORATORIO_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No pudo crearse el laboratorio de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }

                                            if ($contextC->getEvent() === CREATE_CONFIGURACION_FAIL) {
                                                $huboerror = true;
                                                //throw new \PDOException($e->getMessage(), (int)$e->getCode());						
                                                error_log(date("Y-m-d H:i:s") . " No pudo crearse la configuración de la asignatura " . $nombre_asignatura . "\r\n", 3, LOGS . "/log_errores.txt");
                                            }
                                        }
                                    }
                                } //Asignatura
                            } //Nul o vacio
                        } //FinWhile
                        fclose($handle);

                        if ($huboerror) {

                            // descargarLog($txt_log);
                        } else {
                            $erroresFormulario = "indexAdmin.php";
                        }
                    }
                } //Finasignaturas
                //Fingrupos
            }
        }
        return $erroresFormulario;
    } //FInMetodo
}//FinClase
