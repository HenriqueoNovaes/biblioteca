<?php

return [
    'custom' => [
        'name' => [
            'required' => 'O campo nome é obrigatório.',
            'max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'unique' => 'Já utilizado',
        ],
        'email' => [
            'required' => 'O campo email é obrigatório.',
            'email' => 'O email deve ser um endereço de email válido.',
            'max' => 'O campo email não pode ter mais de 255 caracteres.',
            'unique' => 'O email já está sendo usado por outro usuário.',
        ],
        'registration_number' => [
            'required' => 'O campo número de cadastro é obrigatório.',
            'max' => 'O campo número de cadastro não pode ter mais de 255 caracteres.',
            'unique' => 'O número de cadastro já está sendo usado por outro usuário.',
        ],
        'registration_number_book'=> [
            'required' => 'O campo número de registro é obrigatório.',
            'max' => 'O campo número de registro não pode ter mais de 255 caracteres.',
            'unique' => 'O número de registro já está sendo usado por outro livro.',
        ],
        'title' => [
            'required' => 'O campo nome é obrigatório.',
            'max' => 'O campo nome não pode ter mais de 255 caracteres.',
        ],
    ],
];

