<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Defines all messages sent from flash
    |--------------------------------------------------------------------------
    |
    |
    */

    'user_already_registered_in_category' => 'The user is already registered to this category.',

    // Torneo
    'tournament_create_successful' => 'Tournament <b>:name</b><br/> created',
    'tournament_update_successful' => 'Tournament <b>:name</b><br/> updated',
    'tournament_delete_successful' => 'Tournament <b>:name</b><br/> deleted',
    'tournament_restored_successful' => 'Tournament <b>:name</b><br/> restored',

    'tournament_create_error' => 'Oooops! Error creating Tournament ',
    'tournament_update_error' => 'Oooops! Error updating Tournament ',
    'tournament_delete_error' => 'Error Deleting Tournament :name',
    'tournament_restored_error' => 'Error Restoring Tournament :name',


    // Usuario
    'user_create_successful' => 'User <b>:name</b><br/> created',
    'user_update_successful' => 'User <b>:name</b><br/> updated',
    'user_delete_successful' => 'User <b>:name</b><br/> deleted',
    'user_restore_successful' => 'User <b>:name</b><br/> restored',
    'user_registered_successful' => 'User <b>:name</b><br/> were added to tournament :tournament',

    'user_create_error' => 'Oooops! Error creating User',
    'user_update_error' => 'Oooops! Error updating User',
    'user_delete_error' => 'Error deleting User  :name',
    'user_restore_error' => 'Error restoring User :name',
    'user_registered_error' => 'Error registering User :name',

    'user_status_successful' => ':name : Status updated',
    'user_status_error' => 'Error updating :name',


    // Categoria
    'category_create_successful' => 'Category configured',
    'category_update_successful' => 'Category updated',
    'category_delete_successful' => 'Category deleted',

    'category_create_error' => 'Oooops! Category creation error',
    'category_update_error' => 'Oooops! Category update error',
    'category_delete_error' => 'Category deletion error :name',


    //Invitation

    'invitation_needed' => 'You need an invitation to register to this tournament.',
    'invitation_expired' => 'Invitation expired.',
    'invitation_used' => 'Invitation already used',
    'invitation_sent' => 'Invitation has been sent',
    'tx_for_register_tournament' => 'Thanks for register tournament :tournament',
    // Permisos
    'access_denied' => 'Access Denied',



];
