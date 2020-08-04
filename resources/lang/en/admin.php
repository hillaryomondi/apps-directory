<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'username' => 'Username',
            'user_number' => 'User number',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'email' => "Email",
            'email_verified_at' => "Email verified at",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'first_name' => "First name",
            'middle_name' => "Middle name",
            'last_name' => "Last name",
            'dob' => "Dob",
            'gender' => "Gender",
            'username' => "Username",
            'guid' => "Guid",
            'domain' => "Domain",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'permission' => [
        'title' => 'Permissions',

        'actions' => [
            'index' => 'Permissions',
            'create' => 'New Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'service-endpoint' => [
        'title' => 'Service Endpoints',

        'actions' => [
            'index' => 'Service Endpoints',
            'create' => 'New Service Endpoint',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'endpoint' => 'Endpoint',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'department' => [
        'title' => 'Departments',

        'actions' => [
            'index' => 'Departments',
            'create' => 'New Department',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'display_name' => 'Display name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'su-application' => [
        'title' => 'Su Applications',

        'actions' => [
            'index' => 'Su Applications',
            'create' => 'New Su Application',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'department_id' => 'Department',
            'tags' => 'Tags',
            'url' => 'Url',
            
        ],
    ],

    'ticket' => [
        'title' => 'Tickets',

        'actions' => [
            'index' => 'Tickets',
            'create' => 'New Ticket',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'reference_number' => 'Reference number',
            'title' => 'Title',
            'description' => 'Description',
            'resolved' => 'Resolved',
            'reporter_name' => 'Reporter name',
            'reporter_email' => 'Reporter email',
            'created_by' => 'Created by',
            'su_application_id' => 'Su application',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation






];