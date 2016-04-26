<?php

use Illuminate\Database\Migrations\Migration;

class AddTablePaises extends Migration
{

    /**
     * Run the migrations.
     *
     * @return vocod
     */
    public function up()
    {
        Schema::create('paises', function ($table) {
            $table->string('cod', 2);
            $table->string('nombre', 65);

        });
        DB::statement("ALTER TABLE paises add primary key (cod)");

        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AF', 'Afganistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AL', 'Albania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DE', 'Alemania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AD', 'Andorra')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AO', 'Angola')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AI', 'Anguila')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AQ', 'Antártcoda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AG', 'Antigua y Barbuda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SA', 'Arabia Saudí')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DZ', 'Argelia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AR', 'Argentina')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AM', 'Armenia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AW', 'Aruba')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AU', 'Australia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AT', 'Austria')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AZ', 'Azerbaiyán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BS', 'Bahamas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BD', 'Bangladés')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BB', 'Barbados')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BH', 'Baréin')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BE', 'Bélgica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BZ', 'Belice')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BJ', 'Benín')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BM', 'Bermudas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BY', 'Bielorrusia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BO', 'Bolivia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BA', 'Bosnia-Herzegovina')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BW', 'Botsuana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BR', 'Brasil')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BN', 'Brunéi')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BG', 'Bulgaria')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BF', 'Burkina Faso')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BI', 'Burundi')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BT', 'Bután')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CV', 'Cabo Verde')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KH', 'Camboya')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CM', 'Camerún')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CA', 'Canadá')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BQ', 'Caribe neerlandés')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('QA', 'Catar')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('EA', 'Ceuta y Melilla')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TD', 'Chad')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CL', 'Chile')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CN', 'China')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CY', 'Chipre')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VA', 'Ciudad del Vaticano')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CO', 'Colombia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KM', 'Comoras')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KP', 'Corea del Norte')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KR', 'Corea del Sur')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CI', 'Costa de Marfil')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CR', 'Costa Rica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('HR', 'Croacia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CU', 'Cuba')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CW', 'Curazao')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DG', 'Diego García')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DK', 'Dinamarca')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DM', 'Dominica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('EC', 'Ecuador')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('EG', 'Egipto')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SV', 'El Salvador')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AE', 'Emiratos Árabes Uncodos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ER', 'Eritrea')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SK', 'Eslovaquia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SI', 'Eslovenia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ES', 'España')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('US', 'Estados Uncodos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('EE', 'Estonia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ET', 'Etiopía')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PH', 'Filipinas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FI', 'Finlandia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FJ', 'Fiyi')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FR', 'Francia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GA', 'Gabón')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GM', 'Gambia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GE', 'Georgia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GH', 'Ghana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GI', 'Gibraltar')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GD', 'Granada')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GR', 'Grecia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GL', 'Groenlandia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GP', 'Guadalupe')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GU', 'Guam')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GT', 'Guatemala')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GF', 'Guayana Francesa')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GG', 'Guernesey')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GN', 'Guinea')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GQ', 'Guinea Ecuatorial')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GW', 'Guinea-Bisáu')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GY', 'Guyana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('HT', 'Haití')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('HN', 'Honduras')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('HU', 'Hungría')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IN', 'India')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ID', 'Indonesia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IR', 'Irán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IQ', 'Iraq')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IE', 'Irlanda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CX', 'Isla Christmas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AC', 'Isla de la Ascensión')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IM', 'Isla de Man')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NU', 'Isla Niue')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NF', 'Isla Norfolk')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IS', 'Islandia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AX', 'Islas Åland')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KY', 'Islas Caimán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IC', 'islas Canarias')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CC', 'Islas Cocos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CK', 'Islas Cook')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FO', 'Islas Feroe')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GS', 'Islas Georgia del Sur y Sandwich del Sur')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FK', 'Islas Malvinas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MP', 'Islas Marianas del Norte')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MH', 'Islas Marshall')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('UM', 'Islas menores alejadas de EE. UU.')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PN', 'Islas Pitcairn')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SB', 'Islas Salomón')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TC', 'Islas Turcas y Caicos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VG', 'Islas Vírgenes Británicas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VI', 'Islas Vírgenes de EE. UU.')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IL', 'Israel')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IT', 'Italia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('JM', 'Jamaica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('JP', 'Japón')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('JE', 'Jersey')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('JO', 'Jordania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KZ', 'Kazajistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KE', 'Kenia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KG', 'Kirguistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KI', 'Kiribati')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('XK', 'Kosovo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KW', 'Kuwait')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LA', 'Laos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LS', 'Lesoto')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LV', 'Letonia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LB', 'Líbano')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LR', 'Liberia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LY', 'Libia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LI', 'Liechtenstein')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LT', 'Lituania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LU', 'Luxemburgo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MK', 'Macedonia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MG', 'Madagascar')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MY', 'Malasia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MW', 'Malaui')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MV', 'Maldivas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ML', 'Mali')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MT', 'Malta')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MA', 'Marruecos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MQ', 'Martinica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MU', 'Mauricio')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MR', 'Mauritania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('YT', 'Mayotte')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MX', 'México')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('FM', 'Micronesia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MD', 'Moldavia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MC', 'Mónaco')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MN', 'Mongolia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ME', 'Montenegro')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MS', 'Montserrat')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MZ', 'Mozambique')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MM', 'Myanmar (Birmania)')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NA', 'Namibia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NR', 'Nauru')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NP', 'Nepal')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NI', 'Nicaragua')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NE', 'Níger')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NG', 'Nigeria')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NO', 'Noruega')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NC', 'Nueva Caledonia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NZ', 'Nueva Zelanda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('OM', 'Omán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('NL', 'Países Bajos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PK', 'Pakistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PW', 'Palau')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PA', 'Panamá')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PG', 'Papúa Nueva Guinea')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PY', 'Paraguay')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PE', 'Perú')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PF', 'Polinesia Francesa')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PL', 'Polonia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PT', 'Portugal')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PR', 'Puerto Rico')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('HK', 'RAE de Hong Kong (China)')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MO', 'RAE de Macao (China)')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('GB', 'Reino Uncodo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CF', 'República Centroafricana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CZ', 'República Checa')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CG', 'República del Congo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CD', 'República Democrática del Congo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DO', 'República Dominicana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('RE', 'Reunión')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('RW', 'Ruanda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('RO', 'Rumanía')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('RU', 'Rusia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('EH', 'Sáhara Occcodental')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('WS', 'Samoa')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('AS', 'Samoa Americana')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('BL', 'San Bartolomé')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('KN', 'San Cristóbal y Nieves')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SM', 'San Marino')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('MF', 'San Martín')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PM', 'San Pedro y Miquelón')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VC', 'San Vicente y las Granadinas')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SH', 'Santa Elena')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LC', 'Santa Lucía')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ST', 'Santo Tomé y Príncipe')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SN', 'Senegal')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('RS', 'Serbia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SC', 'Seychelles')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SL', 'Sierra Leona')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SG', 'Singapur')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SX', 'Sint Maarten')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SY', 'Siria')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SO', 'Somalia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('LK', 'Sri Lanka')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SZ', 'Suazilandia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ZA', 'Sudáfrica')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SD', 'Sudán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SS', 'Sudán del Sur')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SE', 'Suecia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('CH', 'Suiza')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SR', 'Surinam')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('SJ', 'Svalbard y Jan Mayen')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TH', 'Tailandia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TW', 'Taiwán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TZ', 'Tanzania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TJ', 'Tayikistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('IO', 'Territorio Británico del Océano Índico')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TF', 'Territorios Australes Franceses')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('PS', 'Territorios Palestinos')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TL', 'Timor Oriental')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TG', 'Togo')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TK', 'Tokelau')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TO', 'Tonga')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TT', 'Trincodad y Tobago')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TA', 'Tristán da Cunha')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TN', 'Túnez')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TM', 'Turkmenistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TR', 'Turquía')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('TV', 'Tuvalu')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('UA', 'Ucrania')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('UG', 'Uganda')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('UY', 'Uruguay')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('UZ', 'Uzbekistán')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VU', 'Vanuatu')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VE', 'Venezuela')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('VN', 'Vietnam')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('WF', 'Wallis y Futuna')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('YE', 'Yemen')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('DJ', 'Yibuti')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ZM', 'Zambia')");
        DB::statement("INSERT INTO `paises` (`cod`,`nombre`) VALUES ('ZW', 'Zimbabue')");

    }


    /**
     * Reverse the migrations.
     *
     * @return vocod
     */
    public function down()
    {
        Schema::drop('paises');

    }
}
