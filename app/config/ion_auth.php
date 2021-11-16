<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['database_group_name'] = '';
$config['tables']['users']           = 'users';
$config['tables']['groups']          = 'groups';
$config['tables']['users_groups']    = 'users_groups';
$config['tables']['login_attempts']  = 'login_attempts';
$config['join']['users']  = 'user_id';
$config['join']['groups'] = 'group_id';
$config['hash_method']    = 'bcrypt';
$config['default_rounds'] = 8;
$config['random_rounds']  = FALSE;
$config['min_rounds']     = 5;
$config['max_rounds']     = 9;
$config['salt_prefix']    = version_compare(PHP_VERSION, '5.3.7', '<') ? '$2a$' : '$2y$';

$config['site_title']                 = 'Gubia';
$config['admin_email']                = 'noreply@gubia.art';
$config['default_group']              = 'members';
$config['admin_group']                = 'admin';
$config['identity']                   = 'email';
$config['min_password_length']        = 8;
$config['max_password_length']        = 20;
$config['email_activation']           = TRUE;
$config['manual_activation']          = TRUE;
$config['remember_users']             = TRUE;
$config['user_expire']                = 86500;
$config['user_extend_on_login']       = FALSE;
$config['track_login_attempts']       = TRUE;
$config['track_login_ip_address']     = TRUE;
$config['maximum_login_attempts']     = 3;
$config['lockout_time']               = 600;
$config['forgot_password_expiration'] = 0;
$config['recheck_timer']              = 0;

$config['remember_cookie_name'] = 'remember_code';
$config['identity_cookie_name'] = 'identity';

$config['use_ci_email'] = TRUE;
$config['email_config'] = array(
	'mailtype' => 'html',
);

$config['email_templates'] = 'auth/email/';
$config['email_activate'] = 'activate.tpl.php';
$config['email_forgot_password'] = 'forgot_password.tpl.php';
$config['email_forgot_password_complete'] = 'new_password.tpl.php';
$config['salt_length'] = 22;
$config['store_salt']  = FALSE;

$config['delimiters_source']       = 'config';
$config['message_start_delimiter'] = '<p>';
$config['message_end_delimiter']   = '</p>';
$config['error_start_delimiter']   = '<p>';
$config['error_end_delimiter']     = '</p>';
