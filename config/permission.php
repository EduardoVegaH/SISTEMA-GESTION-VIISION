<?php

return [
    /*
     * When using the Teams feature, we need to know which column on the teams table
     * holds the key used to identify a team. This is used when building relationships
     * in the package.
     */
    'teams' => false,

    /*
     * The models' fully qualified class names.
     */
    'models' => [
        'permission' => Spatie\Permission\Models\Permission::class,
        'role' => Spatie\Permission\Models\Role::class,
    ],

    /*
     * Table names used by the package.
     */
    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
     * Column names used by the package.
     */
    'column_names' => [
        'model_morph_key' => 'model_id',
        'team_foreign_key' => 'team_id',
    ],

    /*
     * Cache settings
     */
    'cache' => [
        'expiration_time' => DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',
    ],

    /*
     * By default the package will display the required permission/role names in the
     * exception message. For some this may be considered an information leak, so you
     * may want to disable it.
     */
    'display_permission_in_exception' => false,
];
