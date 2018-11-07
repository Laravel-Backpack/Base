<?php

// Please note it is recommended to use the subtag [pt-BR], not [pr_BR]
// That is the one formalized by the W3C in the IANA Language Subtag Registry
// - https://www.iana.org/assignments/language-subtag-registry/language-subtag-registry
// - https://www.w3.org/International/questions/qa-choosing-language-tags
//
// Also, that is the one used by the most popular Laravel translation package
// - https://github.com/caouecs/Laravel-lang/tree/master/src
//
// Backpack provides translations for both subtags, for backwards compatibility.
// But this will change at some point, and we will only support [pt-BR].

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack\Base Language Lines
    |--------------------------------------------------------------------------
    */

    'registration_closed'    => 'Novos registros estão desabiltados.',
    'first_page_you_see'     => 'A primeira página que você vê depois de logar',
    'login_status'           => 'Status do login',
    'logged_in'              => 'Você está logado!',
    'toggle_navigation'      => 'Alternar navegação',
    'administration'         => 'ADMINISTRAÇÃO',
    'user'                   => 'USUÁRIO',
    'logout'                 => 'Logout',
    'login'                  => 'Login',
    'register'               => 'Registrar',
    'name'                   => 'Nome',
    'email_address'          => 'E-Mail',
    'password'               => 'Senha',
    'old_password'           => 'Senha antiga',
    'new_password'           => 'Nova senha',
    'confirm_password'       => 'Confirmar senha',
    'remember_me'            => 'Manter-me logado',
    'forgot_your_password'   => 'Esqueci minha senha',
    'reset_password'         => 'Resetar senha',
    'send_reset_link'        => 'Enviar link de recuperação de senha',
    'click_here_to_reset'    => 'Clique aqui para resetar sua senha',
    'change_password'        => 'Mudar senha',
    'unauthorized'           => 'Sem autorização.',
    'dashboard'              => 'Dashboard',
    'handcrafted_by'         => 'Feito por',
    'powered_by'             => 'Distribuído por',
    'my_account'             => 'Minha conta',
    'update_account_info'    => 'Atualizar minha conta',
    'save'                   => 'Salvar',
    'cancel'                 => 'Cancelar',
    'error'                  => 'Erro',
    'success'                => 'Sucesso',
    'old_password_incorrect' => 'A senha antiga está incorreta.',
    'password_dont_match'    => 'Senhas não são iguais.',
    'password_empty'         => 'Certifique-se que ambos os campos de senha estão preenchidos.',
    'password_updated'       => 'Senha atualizada.',
    'account_updated'        => 'Conta atualizada com sucesso.',
    'unknown_error'          => 'Um erro desconhecido aconteceu. Por favor, tente novamente.',
    'error_saving'           => 'Erro ao salvar. Por favor, tente novamente.',
];
