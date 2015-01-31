<?php

/**
 * Configuration for DEVELOPMENT environment
 * To create another configuration set just copy this file to config.production.php etc. You get the idea :)
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production.
 * It's a little bit dirty to put this here, but who cares.
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Returns the full configuration.
 * This is used by the core/Config class.
 */
return array(
	/**
	 * Configuration for: Base URL
	 * This detects your URL/IP incl. sub-folder automatically. You can also deactivate auto-detection and provide the
	 * URL manually. This should then look like 'http://192.168.33.44/' ! Note the slash in the end.
	 */
	'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])),
	/**
	 * Configuration for: Folders
	 * Usually there's no reason to change this.
	 */
	'PATH_CONTROLLER' => realpath(dirname(__FILE__).'/../../') . '/application/controller/',
	'PATH_VIEW' => realpath(dirname(__FILE__).'/../../') . '/application/view/',
	/**
	 * Configuration for: Avatar paths
	 * Internal path to save avatars. Make sure this folder is writable. The slash at the end is VERY important!
	 */
	'PATH_AVATARS' => realpath(dirname(__FILE__).'/../../') . '/public/avatars/',
	'PATH_AVATARS_PUBLIC' => 'avatars/',
	/**
	 * Configuration for: Default controller and action
	 */
	'DEFAULT_CONTROLLER' => 'index',
	'DEFAULT_ACTION' => 'index',
	/**
	 * Configuration for: Database
	 * DB_TYPE The used database type. Note that other types than "mysql" might break the db construction currently.
	 * DB_HOST The mysql hostname, usually localhost or 127.0.0.1
	 * DB_NAME The database name
	 * DB_USER The username
	 * DB_PASS The password
	 * DB_PORT The mysql port, 3306 by default (?), find out via phpinfo() and look for mysqli.default_port.
	 * DB_CHARSET The charset, necessary for security reasons. Check Database.php class for more info.
	 */
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'login',
	'DB_USER' => 'root',
	'DB_PASS' => '5AHVqrjGe6B8sz3Z',
	'DB_PORT' => '3306',
	'DB_CHARSET' => 'utf8',
	/**
	 * Configuration for: Captcha size
	 * The currently used Captcha generator (https://github.com/Gregwar/Captcha) also runs without giving a size,
	 * so feel free to use ->build(); inside CaptchaModel.
	 */
	'CAPTCHA_WIDTH' => 359,
	'CAPTCHA_HEIGHT' => 100,
	/**
	 * Configuration for: Cookies
	 * 1209600 seconds = 2 weeks
	 * COOKIE_PATH is the path the cookie is valid on, usually "/" to make it valid on the whole domain.
	 * @see http://stackoverflow.com/q/9618217/1114320
	 * @see php.net/manual/en/function.setcookie.php
	 */
	'COOKIE_RUNTIME' => 1209600,
	'COOKIE_PATH' => '/',
	/**
	 * Configuration for: Avatars/Gravatar support
	 * Set to true if you want to use "Gravatar(s)", a service that automatically gets avatar pictures via using email
	 * addresses of users by requesting images from the gravatar.com API. Set to false to use own locally saved avatars.
	 * AVATAR_SIZE set the pixel size of avatars/gravatars (will be 44x44 by default). Avatars are always squares.
	 * AVATAR_DEFAULT_IMAGE is the default image in public/avatars/
	 */
	'USE_GRAVATAR' => false,
	'GRAVATAR_DEFAULT_IMAGESET' => 'mm',
	'GRAVATAR_RATING' => 'pg',
	'AVATAR_SIZE' => 44,
	'AVATAR_JPEG_QUALITY' => 85,
	'AVATAR_DEFAULT_IMAGE' => 'default.jpg',

	/**
	 * Configuration for: Email content data
	 */
	'EMAIL_PASSWORD_RESET_URL' => 'login/verifypasswordreset',
	'EMAIL_PASSWORD_RESET_FROM_EMAIL' => 'no-reply@example.com',
	'EMAIL_PASSWORD_RESET_FROM_NAME' => 'My Project',
	'EMAIL_PASSWORD_RESET_SUBJECT' => 'Password reset for PROJECT XY',
	'EMAIL_PASSWORD_RESET_CONTENT' => 'Please click on this link to reset your password: ',
	'EMAIL_VERIFICATION_URL' => 'login/verify',
	'EMAIL_VERIFICATION_FROM_EMAIL' => 'no-reply@example.com',
	'EMAIL_VERIFICATION_FROM_NAME' => 'My Project',
	'EMAIL_VERIFICATION_SUBJECT' => 'Account activation for PROJECT XY',
	'EMAIL_VERIFICATION_CONTENT' => 'Please click on this link to activate your account: ',
        /*
         * Configuration for phpass
         * HASH_COST_LOG2 - Base-2 logarithm of the iteration count used for password stretching
         * HASH_PORTABLE - Do we require the hashes to be portable to older systems (less secure)?
         */
        'HASH_COST_LOG2'=> '8',
        'HASH_PORTALBE'=>'FALSE',
);
