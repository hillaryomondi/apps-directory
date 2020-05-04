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
            'username' => "Username",
            'user_number' => "User number",
            'first_name' => "First name",
            'middle_name' => "Middle name",
            'last_name' => "Last name",
            'activated' => "Activated",
            'last_login_at' => "Last login at",
            'last_login_ip' => "Last login ip",
                
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

    'department' => [
        'title' => 'Departments',

        'actions' => [
            'index' => 'Departments',
            'create' => 'New Department',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
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
            'description' => 'Description',
            'activated' => 'Activated',
            
        ],
    ],

    'bug' => [
        'title' => 'Bugs',

        'actions' => [
            'index' => 'Bugs',
            'create' => 'New Bug',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'resolved' => 'Resolved',
            
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
            'description' => 'Description',
            'activated' => 'Activated',
            
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

    'bug' => [
        'title' => 'Bugs',

        'actions' => [
            'index' => 'Bugs',
            'create' => 'New Bug',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'resolved' => 'Resolved',
            
        ],
    ],

    'bug' => [
        'title' => 'Bugs',

        'actions' => [
            'index' => 'Bugs',
            'create' => 'New Bug',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'display_title' => 'Display title',
            'description' => 'Description',
            'resolved' => 'Resolved',
            
        ],
    ],

    'bug' => [
        'title' => 'Bugs',

        'actions' => [
            'index' => 'Bugs',
            'create' => 'New Bug',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'reference_number' => 'Reference number',
            'title' => 'Title',
            'description' => 'Description',
            'resolved' => 'Resolved',
            'created_by' => 'Created by',
            'resolved_by' => 'Resolved by',
            'resolved_at' => 'Resolved at',
            
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
            'activated' => 'Activated',
            
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
            
        ],
    ],

    'screenshot' => [
        'title' => 'Screenshots',

        'actions' => [
            'index' => 'Screenshots',
            'create' => 'New Screenshot',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'file_path' => 'File path',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation












];