<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrarEstudianteTest extends TestCase
{
    /**
     *  functional test.
     *
     * @return void
     */
    public function testUrl()
    {
        $response=$this->call('GET','admin/estudiantes/registrar');
        $this->assertEquals(200,$response->status());
    }

    /**
     *  functional test.
     *
     * @return void
     */
    public function testCamposVacios()
    {
        $this->visit('admin/estudiantes/registrar')
            ->press('registrar')
            ->seePageIs('admin/estudiantes/registrar');
    }
    /**
     *  functional test.
     *
     * @return void
     */
    public function testCamposMalos()
    {
        $this->visit('admin/estudiantes/registrar')
            ->type('fe', 'nombre') //campo malo
            ->type('123454', 'cedula')
            ->type('ingeniero', 'profesion')
            ->type('eam', 'universidad')
            ->type('hello1@in.com', 'correo')
            ->type('12345', 'contrasena')
            ->press('registrar')
            ->seePageIs('admin/estudiantes/registrar');
    }

    /**
     *  functional test.
     *
     * @return void
     */
    public function testCamposBien()
    {
        $this->visit('admin/estudiantes/registrar')
            ->type('fernando', 'nombre')
            ->type('123454', 'cedula')
            ->type('ingeniero', 'profesion')
            ->type('eam', 'universidad')
            ->type('hello1@in.com', 'correo')
            ->type('12345', 'contrasena')
            ->press('registrar')
            ->seePageIs('admin/estudiantes/registrar');
    }

    public function testVista()
    {
        $this->visit('admin/estudiantes/registrar')
            ->see('Generar contraseña');

    }
    public function testInsert()
    {
        
    }
}
