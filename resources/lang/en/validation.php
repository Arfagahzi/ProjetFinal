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

    'accepted' => 'Le :attribute doit être accepté.',
    'active_url' => "Le :attribute n'est pas une URL valide.",
    'after' => 'Le :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'Le :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le :attribute ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num' => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le :attribute doit être un tableau.',
    'before' => 'Le :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Le :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le :attribute doit être compris entre :min et :max.',
        'file' => 'Le :attribute doit être compris entre :min et :max kilo-octets.',
        'string' => 'Le :attribute doit être compris entre les caractères :min et :max.',
        'array' => 'Le :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation :attribute ne correspond pas.',
    'date' => "Le :attribute n'est pas une date valide.",
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'different' => 'Le :attribute et :other doivent être différents.',
    'digits' => 'Le :attribute doit être :digits digits.',
    'digits_between' => 'Le :attribute doit être compris entre :min et :max digits.',
    'dimensions' => "Le :attribute a des dimensions d'image invalides.",
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Le :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => "Le :attribute sélectionné n'est pas valide.",
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => "Le :attribute sélectionné n'est pas valide.",
    'in_array' => "Le champ :attribute n'existe pas dans :other.",
    'integer' => 'Le :attribute doit être un entier.',
    'ip' => 'Le :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Le :attribute ne peut pas être supérieur à :max.',
        'file' => 'Le :attribute ne doit pas dépasser :max kilo-octets.',
        'string' => 'Le :attribute ne peut pas dépasser :max caractères.',
        'array' => 'Le :attribute ne peut pas avoir plus de :max items.',
    ],
    'mimes' => 'Le :attribute doit être un fichier de type : :values.',
    'mimetypes' => 'Le :attribute doit être un fichier de type : :values.',
    'min' => [
        'numeric' => 'Le :attribute doit être au moins :min.',
        'file' => 'Le :attribute doit faire au moins :min kilo-octets.',
        'string' => 'Le :attribute doit contenir au moins :min caractères.',
        'array' => 'Le :attribute doit avoir au moins :min items.',
    ],
    'not_in' => "Le :attribute sélectionné n'est pas valide.",
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'Le :attribute doit être un nombre.',
    'password' => 'Mot de passe incorrect.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => "Le format :attribute n'est pas valide.",
    'required' => 'Ce Champs est obligatoire.',
    'required_if'           => 'Le champ :attribute est obligatoire lorsque :other vaut :value.' ,
    'required_unless'       => 'Le champ :attribute est obligatoire sauf si :other est dans :values.' ,
    'required_with'         => 'Le champ :attribute est obligatoire lorsque :values ​​est présent.' ,
    'required_with_all'     => 'Le champ :attribute est requis lorsque :values ​​est présent.' ,
    'required_without'      => "Le champ :attribute est obligatoire lorsque :values ​​n'est pas présent." ,
    'required_without_all' => "Le champ :attribute est requis lorsqu'aucune des valeurs :values ​​n'est présente." ,
    'same'                  => 'Les :attribute et :other doivent correspondre.' ,
    'size' => [
        'numeric' => 'Le :attribute doit être :size.' ,
        'file'     => 'Le :attribute doit être :taille kilo-octets.' ,
        'string'   => 'Le :attribute doit être :taille caractères.' ,
        'array'    => 'Le :attribute doit contenir des éléments :taille.' ,
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string'                => 'Le :attribute doit être une chaîne.' ,
    'timezone'              => 'Le :attribute doit être une zone valide.' ,
    'unique'                => 'Le :attribute a déjà été pris.' ,
    'uploaded'              => "Le :attribute n'a pas pu être téléchargé." ,
    'url'                   => "Le format :attribute n'est pas valide." ,
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'nom-attribut' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
