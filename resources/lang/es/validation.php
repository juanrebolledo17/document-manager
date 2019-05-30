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

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'El :attribute no es una URL válida.',
    'after'                => 'El :attribute debe ser una fecha despues de :date.',
    'after_or_equal'       => 'El :attribute debe ser una fecha despues de o igual que :date.',
    'alpha'                => 'El :attribute solo puede contener letras.',
    'alpha_dash'           => 'El :attribute solo puede contener letras, nuúmeros, y guiones.',
    'alpha_num'            => 'El :attribute solo puede contener números y guiones.',
    'array'                => 'El :attribute debe ser un arreglo.',
    'before'               => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal'      => 'El :attribute debe ser una fecha antes de o igual que :date.',
    'between'              => [
        'numeric' => 'El :attribute debe ser entre :min y :max.',
        'file'    => 'El :attribute debe ser entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe ser entre :min y :max carácteres.',
        'array'   => 'El :attribute debe ser entre :min y :max artículos.',
    ],
    'boolean'              => 'El :attribute campo debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación del atributo :attribute. no concuerda',
    'date'                 => 'El :attribute no es una fecha válida.',
    'date_format'          => 'El :attribute no concuerda con el formato :format.',
    'different'            => 'El :attribute y :other deben ser diferentes.',
    'digits'               => 'El :attribute debe ser :digits digitos.',
    'digits_between'       => 'El :attribute debe ser entre :min y :max digitos.',
    'dimensions'           => 'El :attribute tiene dimenciones de imagen inválidas.',
    'distinct'             => 'El :attribute campo tiene un valor duplicado.',
    'email'                => 'El :attribute debe ser un correo electrónico válido.',
    'exists'               => 'El :attribute seleccionado es inválido.',
    'file'                 => 'El :attribute debe ser un archivo.',
    'filled'               => 'El :attribute campo debe tener un valor.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'El :attribute seleccionado es inválido.',
    'in_array'             => 'El :attribute campo no existe en :other.',
    'integer'              => 'El :attribute Debe ser un número entero.',
    'ip'                   => 'El :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El :attribute debe ser una direccion IPv4 válida.',
    'ipv6'                 => 'El :attribute debe ser una direccion IPv6 válida.',
    'json'                 => 'El :attribute debe ser un string JSON válido.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file'    => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max carácteres.',
        'array'   => 'El :attribute no puede tener mas de :max articulos.',
    ],
    'mimes'                => 'El :attribute debe se run archivo de tipo: :values.',
    'mimetypes'            => 'El :attribute debe ser un archivo de tipos: :values.',
    'min'                  => [
        'numeric' => 'El :attribute debe ser de al menos :min.',
        'file'    => 'El :attribute debe ser de al menos :min kilobytes.',
        'string'  => 'El :attribute debe ser de al menos :min carácteres.',
        'array'   => 'El :attribute debe tener al menos :min articulos.',
    ],
    'not_in'               => 'El :attribute seleccionado es inválido.',
    'numeric'              => 'El :attribute debe contener un número.',
    'present'              => 'El :attribute campo debe estar presente.',
    'regex'                => 'El :attribute formato es inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El :attribute campo es requerido a menos que :oElr esta en :values.',
    'required_with'        => 'El :attribute campo es requerido cuando :values estan presente.',
    'required_with_all'    => 'El :attribute campo es requerido cuando :values estan presentes.',
    'required_without'     => 'El :attribute campo es requerido cuando :values no estan presentes.',
    'required_without_all' => 'El :attribute campo es requerido cuando ninguno de :values estan presentes.',
    'same'                 => 'El :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El :attribute debe ser de :size.',
        'file'    => 'El :attribute debe ser de :size kilobytes.',
        'string'  => 'El :attribute debe ser de :size carácteres.',
        'array'   => 'El :attribute debe contener :size articulos.',
    ],
    'string'               => 'El :attribute debe ser un string.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => 'El :attribute ya ha sido usado.',
    'uploaded'             => 'El :attribute fallo en subir.',
    'url'                  => 'El :attribute formato es inválido.',
    'custom' => [
        'filename' => [
            'required' => 'El nombre del archivo es requerido.'
        ]
    ],
];
