<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EstudiantesController;

class Test extends TestCase
{
    
    public function testFrontRespuestaIngreso_estudiante(){
        $this->visit('/login')
            ->type('admin@hotmail.com','email')
            ->type('12345','password')

            ->press('registrar')

            ->seePageIs('/admin');

        $this->visit('/admin/estudiantes/create')
            ->type('Juan Manuel', 'nombre')
            ->type('87654865', 'cc')
            ->type('juan12@hotmail.com', 'email')
            ->type('38457849', 'telefono')
            ->type('Ing de sistemas', 'profesion')
            ->type('Universidad del quindio', 'universidad')
            ->type('12345', 'password')

            ->press('registrar')
            ->seePageIs('/admin/estudiantes'); 

        $e=App\User::where('cc',"87654865")->first();
        $e->delete();

    }
    public function testFrontRespuestaIngreso_Directores(){
        $this->visit('/login')
            ->type('admin@hotmail.com','email')
            ->type('12345','password')

            ->press('registrar')
            ->seePageIs('/admin');
        $this->visit('/admin/directores/create')
            ->type('Jhuly', 'nombre')
            ->type('8765434', 'cc')
            ->type('jhuly@hotmail.com', 'email')
            ->type('384578492', 'telefono')
            ->type('Ing de sistemas', 'profesion')
            ->type('Universidad del quindio', 'universidad')
            ->type('12345', 'password')

            ->press('registrar')
            ->seePageIs('/admin/directores');
        $e=App\User::where('cc',"8765434")->first();
        $e->delete();
    }
    public function testFrontRespuestaIngreso_consejo(){
        $this->visit('/login')
            ->type('admin@hotmail.com','email')
            ->type('12345','password')

            ->press('registrar')
            ->seePageIs('/admin');

        $this->visit('/admin/consejo/create')
            ->type('Nefrectery', 'nombre')
            ->type('876543412', 'cc')
            ->type('nefre@hotmail.com', 'email')
            ->type('384578', 'telefono')
            ->type('Ing de sistemas', 'profesion')
            ->type('Universidad del quindio', 'universidad')
            ->type('12345', 'password')

            ->press('registrar')
            ->seePageIs('/admin/consejo');
        $e=App\User::where('cc',"384578")->first();
        $e->delete();
        
    }
    public function testIngresoBackEstudiante(){
        $name='user.jpg';
        $estudiante = new App\User();
        $estudiante->nombre='Jaime';
        $estudiante->email='jaime@hotmail.com';
        $estudiante->cc="12345689";
        $estudiante->profesion='ing de sistemas';
        $estudiante->universidad='Quindio';
        $estudiante->password =bcrypt(12345);
        $estudiante->rol='estudiante';
        $estudiante->imagen='/imagenes/usuarios/'.$name;
        $estudiante->save();

        $this->seeInDatabase('users', ['id' => $estudiante->id]);
        
        $e=App\User::where('cc',"12345689")->first();
        $e->delete();



    }
    public function testIngresoBackDirectores(){
        $name='user.jpg';
        $directores = new App\User();
        $directores->nombre='Andres';
        $directores->email='andres@hotmail.com';
        $directores->cc="1234567";
        $directores->profesion='ing de sistemas';
        $directores->universidad='Quindio';
        $directores->password =bcrypt(12345);
        $directores->rol='director';
        $directores->imagen='/imagenes/usuarios/'.$name;
        $directores->save();

        $this->seeInDatabase('users', ['id' => $directores->id]);
        $e=App\User::where('cc',"1234567")->first();
        $e->delete();


    } public function testBackIngresoConsejo(){
        $name='user.jpg';
        $consejo = new App\User();
        $consejo->nombre='Julian';
        $consejo->cc="1234568";
        $consejo->email='julian@hotmail.com';
        $consejo->profesion='ing Electronico';
        $consejo->universidad='Quindio';
        $consejo->password =bcrypt(12345);
        $consejo->rol='director';
        $consejo->imagen='/imagenes/usuarios/'.$name;
        $consejo->save();

        $this->seeInDatabase('users', ['id' => $consejo->id]);
        $e=App\User::where('cc',"1234568")->first();
        $e->delete();


    }


}
