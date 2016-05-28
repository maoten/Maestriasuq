<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Este campo debe ser aceptado.',
    'active_url'           => 'Este campo no es una URL válida.',
    'after'                => 'Este campo debe ser una fecha posterior a :date.',
    'alpha'                => 'Este campo sólo puede contener letras.',
    'alpha_dash'           => 'Este campo sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'Este campo sólo puede contener letras y números.',
    'array'                => 'Este campo debe ser un array.',
    'before'               => 'Este campo debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => 'Este campo debe ser un valor entre :min y :max.',
        'file'    => 'El archivo debe pesar entre :min y :max kilobytes.',
        'string'  => 'Este campo debe contener entre :min y :max caracteres.',
        'array'   => 'Este campo debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'Este campo debe ser verdadero o falso.',
    'confirmed'            => 'El campo de confirmación no coincide.',
    'date'                 => 'Este campo no corresponde con una fecha válida.',
    'date_format'          => 'Este campo no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other han de ser diferentes.',
    'digits'               => 'Este campo debe ser un número de :digits dígitos.',
    'digits_between'       => 'Este campo debe contener entre :min y :max dígitos.',
    'email'                => 'Este campo no corresponde con una dirección de e-mail válida.',
    'filled'               => 'Este campo es obligatorio.',
    'exists'               => 'Este campo no existe.',
    'image'                => 'Este campo debe ser una imagen.',
    'in'                   => 'Este campo debe ser igual a alguno de estos valores :values',
    'integer'              => 'Este campo debe ser un número entero.',
    'ip'                   => 'Este campo debe ser una dirección IP válida.',
    'json'                 => 'Este campo debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'Este campo debe ser menor que :max.',
        'file'    => 'El archivo debe pesar meno que :max kilobytes.',
        'string'  => 'Este campo debe contener menos de :max caracteres.',
        'array'   => 'Este campo debe contener al menos :max elementos.',
    ],
    'mimes'                => 'Este campo debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'Este campo debe tener al menos :min.',
        'file'    => 'El archivo debe pesar al menos :min kilobytes.',
        'string'  => 'Este campo debe contener al menos :min caracteres.',
        'array'   => 'Este campo no debe contener más de :min elementos.',
    ],
    'not_in'               => 'Este campo seleccionado es invalido.',
    'numeric'              => 'Este campo debe ser un numero.',
    'regex'                => 'El formato de este campo es inválido.',
    'required'             => 'Este campo es obligatorio',
    'required_if'          => 'Este campo es obligatorio cuando el campo :other es :value.',
    'required_with'        => 'Este campo es obligatorio cuando :values está presente.',
    'required_with_all'    => 'Este campo es obligatorio cuando :values está presente.',
    'required_without'     => 'Este campo es obligatorio cuando :values no está presente.',
    'required_without_all' => 'Este campo es obligatorio cuando ningún campo :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'Este campo debe ser :size.',
        'file'    => 'El archivo debe pesar :size kilobytes.',
        'string'  => 'Este campo debe contener :size caracteres.',
        'array'   => 'Este campo debe contener :size elementos.',
    ],
    'string'               => 'Este campo debe contener solo caracteres.',
    'timezone'             => 'Este campo debe contener una zona válida.',
    'unique'               => 'El valor de este campo ya está en uso.',
    'url'                  => 'Este formato no corresponde con el de una URL válida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [ ],

];
