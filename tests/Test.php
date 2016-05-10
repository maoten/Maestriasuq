<?php

class Test extends TestCase
{

    /**
     * Test en el Front-end para registrar un estudiante.
     *
     * @return void
     */
    public function testFrontRespuestaIngreso_estudiante()
    {
        $this->visit('/login')->type('admin@hotmail.com', 'email')->type('12345',
            'password')->press('registrar')->seePageIs('/admin');

        $this->visit('/admin/estudiantes/create')->type('Juan Manuel', 'nombre')->type('87654865',
            'cc')->type('juan12@hotmail.com', 'email')->type('38457849', 'telefono')->type('Ing de sistemas',
            'profesion')->type('Universidad del quindio', 'universidad')->type('12345',
            'password')->press('registrar')->seePageIs('/admin/estudiantes');

        $e = App\User::where('cc', "87654865")->first();
        $e->delete();

    }


    /**
     * Test en el Front-end para registrar un director de grado.
     *
     * @return void
     */
    public function testFrontRespuestaIngreso_Directores()
    {
        $this->visit('/login')->type('admin@hotmail.com', 'email')->type('12345',
            'password')->press('registrar')->seePageIs('/admin');
        $this->visit('/admin/directores/create')->type('Jhuly', 'nombre')->type('8765434',
            'cc')->type('jhuly@hotmail.com', 'email')->type('384578492', 'telefono')->type('Ing de sistemas',
            'profesion')->type('Universidad del quindio', 'universidad')->type('12345',
            'password')->press('registrar')->seePageIs('/admin/directores');
        $e = App\User::where('cc', "8765434")->first();
        $e->delete();
    }


    /**
     * Test en el Front-end para registrar un miembro del consejo curricular.
     *
     * @return void
     */
    public function testFrontRespuestaIngreso_consejo()
    {
        $this->visit('/login')->type('admin@hotmail.com', 'email')->type('12345',
            'password')->press('registrar')->seePageIs('/admin');

        $this->visit('/admin/consejo/create')->type('Nefrectery', 'nombre')->type('876543412',
            'cc')->type('nefre@hotmail.com', 'email')->type('384578', 'telefono')->type('Ing de sistemas',
            'profesion')->type('Universidad del quindio', 'universidad')->type('12345',
            'password')->press('registrar')->seePageIs('/admin/consejo');
        $e = App\User::where('cc', "876543412")->first();
        $e->delete();

    }


    /**
     * Test en el Back-end para registrar un estudiante.
     *
     * @return void
     */
    public function testIngresoBackEstudiante()
    {
        $name                    = 'user.jpg';
        $estudiante              = new App\User();
        $estudiante->nombre      = 'Jaime';
        $estudiante->email       = 'jaime@hotmail.com';
        $estudiante->cc          = "12345689";
        $estudiante->profesion   = 'ing de sistemas';
        $estudiante->universidad = 'Quindio';
        $estudiante->password    = bcrypt(12345);
        $estudiante->rol         = 'estudiante';
        $estudiante->imagen      = '/imagenes/usuarios/' . $name;
        $estudiante->save();

        $this->seeInDatabase('users', [ 'id' => $estudiante->id ]);

        $e = App\User::where('cc', "12345689")->first();
        $e->delete();


    }


    /**
     * Test en el Back-end para registrar un director de grado.
     *
     * @return void
     */
    public function testIngresoBackDirectores()
    {
        $name                    = 'user.jpg';
        $directores              = new App\User();
        $directores->nombre      = 'Andres';
        $directores->email       = 'andres@hotmail.com';
        $directores->cc          = "1234567";
        $directores->profesion   = 'ing de sistemas';
        $directores->universidad = 'Quindio';
        $directores->password    = bcrypt(12345);
        $directores->rol         = 'director';
        $directores->imagen      = '/imagenes/usuarios/' . $name;
        $directores->save();

        $this->seeInDatabase('users', [ 'id' => $directores->id ]);
        $e = App\User::where('cc', "1234567")->first();
        $e->delete();


    }


    /**
     * Test en el Back-end para registrar un miembro del consejo curricular.
     *
     * @return void
     */
    public function testBackIngresoConsejo()
    {
        $name                 = 'user.jpg';
        $consejo              = new App\User();
        $consejo->nombre      = 'Julian';
        $consejo->cc          = "1234568";
        $consejo->email       = 'julian@hotmail.com';
        $consejo->profesion   = 'ing Electronico';
        $consejo->universidad = 'Quindio';
        $consejo->password    = bcrypt(12345);
        $consejo->rol         = 'director';
        $consejo->imagen      = '/imagenes/usuarios/' . $name;
        $consejo->save();

        $this->seeInDatabase('users', [ 'id' => $consejo->id ]);
        $e = App\User::where('cc', "1234568")->first();
        $e->delete();

    }
    public function testBackIngresoCertificado(){
        $certificado= new App\Certificado();
        $certificado->nombre="ingles 3";
        $certificado->user_id=1;
        $certificado->save();
        $this->seeInDatabase('certificados', [ 'id' => $certificado->id ]);
        $e = App\Certificado::where('nombre', "ingles 3")->first();
        $e->delete();

    }
    public function testBackIngresoEnfasis(){
        $enfasis= new \App\Enfasis();
        $enfasis->nombre="Ingenieria de software3";
        $enfasis->save();
        $this->seeInDatabase('enfasis', [ 'id' => $enfasis->id ]);
        $e = App\Enfasis::where('nombre', "Ingenieria de software3")->first();
        $e->delete();

    }
    public function testBackIngresoEvento(){
        $evento=new \App\Evento();
        $evento->asunto="disertacion";
        $evento->descripcion="disertacion de la propuesta";
        $evento->lugar="universidad del quindio";
        $evento->save();
        $this->seeInDatabase('eventos', [ 'id' => $evento->id ]);
        $e = App\Evento::where('asunto', "disertacion")->first();
        $e->delete();
    }
    public function testBackIngresoModalidad(){
        $modalidad= new \App\Modalidad();
        $modalidad->nombre="Distancia";
        $modalidad->save();
        $this->seeInDatabase('modalidad', [ 'id' => $modalidad->id ]);
        $e = App\Modalidad::where('nombre', "Distancia")->first();
        $e->delete();
    }
    public function testBackIngresoNotificacion(){
        $noti= new \App\Notificacion();
        $noti->notificacion="Hola, bienvenido";
        $noti->user_id=1;
        $noti->save();
        $this->seeInDatabase('notificaciones', [ 'id' => $noti->id ]);
        $e = App\Notificacion::where('notificacion', "hola, bienvenido")->first();
        $e->delete();

    }
    public function testBackUpdateEstudiante(){
        $name                    = 'user.jpg';
        $estudiante              = new App\User();
        $estudiante->nombre      = 'Jaime';
        $estudiante->email       = 'jaime@hotmail.com';
        $estudiante->cc          = "12345689";
        $estudiante->profesion   = 'ing de sistemas';
        $estudiante->universidad = 'Quindio';
        $estudiante->password    = bcrypt(12345);
        $estudiante->rol         = 'estudiante';
        $estudiante->imagen      = '/imagenes/usuarios/' . $name;
        $estudiante->save();

        $this->seeInDatabase('users', [ 'nombre' => "Jaime"]);
        DB::table('users')->where('id', $estudiante->id)->update(array('nombre' => "juan"));
        $this->seeInDatabase('users', [ 'nombre' => "juan" ]);
        $e = App\User::where('cc', "12345689")->first();
        $e->delete();
    }
    public function testBackUpdateDirectores(){
        $name                    = 'user.jpg';
        $directores              = new App\User();
        $directores->nombre      = 'Andres';
        $directores->email       = 'andres@hotmail.com';
        $directores->cc          = "1234567";
        $directores->profesion   = 'ing de sistemas';
        $directores->universidad = 'Quindio';
        $directores->password    = bcrypt(12345);
        $directores->rol         = 'director';
        $directores->imagen      = '/imagenes/usuarios/' . $name;
        $directores->save();

        $this->seeInDatabase('users', [ 'id' => $directores->id ]);
        DB::table('users')->where('id', $directores->id)->update(array('nombre' => "juan"));
        $this->seeInDatabase('users', [ 'nombre' => "juan" ]);
        $e = App\User::where('cc', "1234567")->first();
        $e->delete();
    }
    public function testBackUpdateConsejo(){
        $name                 = 'user.jpg';
        $consejo              = new App\User();
        $consejo->nombre      = 'Julian';
        $consejo->cc          = "1234568";
        $consejo->email       = 'julian@hotmail.com';
        $consejo->profesion   = 'ing Electronico';
        $consejo->universidad = 'Quindio';
        $consejo->password    = bcrypt(12345);
        $consejo->rol         = 'director';
        $consejo->imagen      = '/imagenes/usuarios/' . $name;
        $consejo->save();

        $this->seeInDatabase('users', [ 'id' => $consejo->id ]);
        DB::table('users')->where('id', $consejo->id)->update(array('nombre' => "juan"));
        $this->seeInDatabase('users', [ 'nombre' => "juan" ]);
        $e = App\User::where('cc', "1234568")->first();
        $e->delete();
    }
    public function testBackUpdateCertificado(){
        $certificado= new App\Certificado();
        $certificado->nombre="ingles 3";
        $certificado->user_id=1;
        $certificado->save();
        $this->seeInDatabase('certificados', [ 'id' => $certificado->id ]);
        DB::table('certificados')->where('id', $certificado->id)->update(array('nombre' => "Pedagogia"));
        $this->seeInDatabase('certificados', [ 'nombre' => "Pedagogia" ]);
        $e = App\Certificado::where('nombre', "Pedagogia")->first();
        $e->delete();
    }
    public function testBackUpdateEnfasis(){
        $enfasis= new \App\Enfasis();
        $enfasis->nombre="Ingenieria de software3";
        $enfasis->save();
        $this->seeInDatabase('enfasis', [ 'id' => $enfasis->id ]);
        DB::table('enfasis')->where('id', $enfasis->id)->update(array('nombre' => "Analisis"));
        $this->seeInDatabase('enfasis', [ 'nombre' => "Analisis" ]);
        $e = App\Enfasis::where('nombre', "Analisis")->first();
        $e->delete();
    }
    public function testBackUpdateEvento(){
        $evento=new \App\Evento();
        $evento->asunto="disertacion";
        $evento->descripcion="disertacion de la propuesta";
        $evento->lugar="universidad del quindio";
        $evento->save();
        $this->seeInDatabase('eventos', [ 'id' => $evento->id ]);
        DB::table('eventos')->where('id', $evento->id)->update(array('asunto' => "Charla"));
        $this->seeInDatabase('eventos', [ 'asunto' => "Charla" ]);
        $e = App\Evento::where('asunto', "Charla")->first();
        $e->delete();
    }
    public function testBackUpdateModalidad(){
        $modalidad= new \App\Modalidad();
        $modalidad->nombre="Distancia";
        $modalidad->save();
        $this->seeInDatabase('modalidad', [ 'id' => $modalidad->id ]);
        DB::table('modalidad')->where('id', $modalidad->id)->update(array('nombre' => "Presencial"));
        $this->seeInDatabase('modalidad', [ 'nombre' => "Presencial" ]);
        $e = App\Modalidad::where('nombre', "Presencial")->first();
        $e->delete();
    }
    public function testUpdateNotificacion(){
        $noti= new \App\Notificacion();
        $noti->notificacion="Hola, bienvenido";
        $noti->user_id=1;
        $noti->save();
        $this->seeInDatabase('notificaciones', [ 'id' => $noti->id ]);
        DB::table('notificaciones')->where('id', $noti->id)->update(array('notificacion' => "Hola, soy una"));
        $this->seeInDatabase('notificaciones', [ 'notificacion' => "Hola, soy una" ]);
        $e = App\Notificacion::where('notificacion', "Hola, soy una")->first();
        $e->delete();
    }

}
