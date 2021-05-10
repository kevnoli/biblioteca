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

    'accepted' => 'O campo :attribute deve ser aceito.',
    'active_url' => 'O campo :attribute não é uma URL válida.',
    'after' => 'O campo :attribute deve ser depois de :date.',
    'after_or_equal' => 'O campo :attribute deve ser igual ou depois de :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números, traços e underlines.',
    'alpha_num' => 'O campo :attribute deve conter apenas letra e números.',
    'array' => 'O campo :attribute deve ser um array.',
    'before' => 'O campo :attribute deve ser antes de :date.',
    'before_or_equal' => 'O campo :attribute deve ser igual ou antes de :date.',
    'between' => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file' => 'O campo :attribute deve estar entre :min e :max kilobytes.',
        'string' => 'O campo :attribute deve estar entre :min e :max caracteres.',
        'array' => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'O campo de confirmação de :attribute deve ser igual a :attribute.',
    'date' => 'O campo :attribute não é uma data válida.',
    'date_equals' => 'O campo :attribute deve ser igual a :date.',
    'date_format' => 'O campo :attribute não é compatível com o formato :format.',
    'different' => 'O campo :attribute e :other devem ser diferentes.',
    'digits' => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between' => 'O campo :attribute deve estar entre :min e :max dígitos.',
    'dimensions' => 'As dimensões de :attribute inválidas.',
    'distinct' => 'Campo :attribute tem valor duplicado.',
    'email' => 'O campo :attribute deve ser um e-mail válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes valores: :values.',
    'exists' => 'O campo :attribute é inválido.',
    'file' => 'O campo :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve estar preenchido.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file' => 'O campo :attribute deve ser maior que :value kilobytes.',
        'string' => 'O campo :attribute deve ser maior que :value caracteres.',
        'array' => 'O campo :attribute deve ter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file' => 'O campo :attribute deve ser maior ou igual a :value kilobytes.',
        'string' => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
        'array' => 'O campo :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O campo :attribute deve ser uma imagem.',
    'in' => 'O campo :attribute é inválido.',
    'in_array' => 'O campo :attribute não está presente em :other.',
    'integer' => 'O campo :attribute deve ser uma inteiro.',
    'ip' => 'O campo :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O campo :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file' => 'O campo :attribute deve ser menor que :value kilobytes.',
        'string' => 'O campo :attribute deve ser menor que :value caracteres.',
        'array' => 'O campo :attribute deve ter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file' => 'O campo :attribute deve ser menor ou igual a :value kilobytes.',
        'string' => 'O campo :attribute deve ser menor ou igual a :value caracteres.',
        'array' => 'O campo :attribute não deve ter mais do que :value itens.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file' => 'O campo :attribute não pode ser maior que :max kilobytes.',
        'string' => 'O campo :attribute não pode ser maior que :max caracteres.',
        'array' => 'O campo :attribute não deve ter mais do que :max itens.',
    ],
    'mimes' => 'O campo :attribute deve ser um arquivo dos tipos: :values.',
    'mimetypes' => 'O campo :attribute deve ser um arquivo dos tipos: :values.',
    'min' => [
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file' => 'O campo :attribute deve ter pelo menos :min kilobytes.',
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O campo :attribute deve ter pelo menos :min itens.',
    ],
    'not_in' => 'O campo :attribute é inválido.',
    'not_regex' => 'O formato do campo :attribute é inválido.',
    'numeric' => 'O campo :attribute deve ser um número.',
    'password' => 'Senha incorreta.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato do campo :attribute é inválido.',
    'required' => 'O campo :attribute é inválido.',
    'required_if' => 'O campo :attribute é exigido quando :other é :value.',
    'required_unless' => 'O campo :attribute é exigido a não ser que :other está em :values.',
    'required_with' => 'O campo :attribute é exigido quando :values estão presentes.',
    'required_with_all' => 'O campo :attribute é exigido quando :values estão presentes.',
    'required_without' => 'O campo :attribute é exigido quando :values não estão presentes.',
    'required_without_all' => 'O campo :attribute é exigido quando :values não estão presentes.',
    'same' => 'O campo :attribute e :other devem ser iguais.',
    'size' => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file' => 'O campo :attribute deve ter :size kilobytes.',
        'string' => 'O campo :attribute deve ter :size caracteres.',
        'array' => 'O campo :attribute deve ter :size itens.',
    ],
    'starts_with' => 'O campo :attribute deve começar com: :values.',
    'string' => 'O campo :attribute deve ser uma string.',
    'timezone' => 'O campo :attribute deve ser um fuso-horário.',
    'unique' => 'O campo :attribute já está sendo usado.',
    'uploaded' => 'Falha no upload do campo :attribute.',
    'url' => 'O formato do campo :attribute é inválido.',
    'uuid' => 'O campo :attribute deve ser um UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
