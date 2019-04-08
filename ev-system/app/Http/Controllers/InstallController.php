<?php namespace App\Http\Controllers;

use App\Posts;
use App\User;
use App\Settings;
use Redirect;
use Artisan;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

use Illuminate\Http\Request;

class InstallController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['errors'] = array();
		$this->data['success'] = array();

		// Check PHP version
		if (phpversion() < "5.3") {
			$this->data['errors'][] = 'You are running PHP old version!';
		} else {
			$phpversion = phpversion();
			$this->data['success'][] = ' You are running PHP '.$phpversion;
		}
		// Check Mcrypt PHP exention
		if(!extension_loaded('mcrypt')) {
			$this->data['errors'][] = 'Mcrypt PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mcrypt PHP exention loaded!';
		}
		// Check Mysql PHP exention
		if(!extension_loaded('mysql')) {
			$this->data['errors'][] = 'Mysql PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mysql PHP exention loaded!';
		}
		// Check Mysql PHP exention
		if(!extension_loaded('mysqli')) {
			$this->data['errors'][] = 'Mysqli PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mysqli PHP exention loaded!';
		}
		// Check MBString PHP exention
		if(!extension_loaded('mbstring')) {
			$this->data['errors'][] = 'MBString PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'MBString PHP exention loaded!';
		}
		// Check GD PHP exention
		if(!extension_loaded('gd')) {
			$this->data['errors'][] = 'GD PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'GD PHP exention loaded!';
		}
		// Check CURL PHP exention
		if(!extension_loaded('curl')) {
			$this->data['errors'][] = 'CURL PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'CURL PHP exention loaded!';
		}
		// Check Config Path
		if (config_path()) { 
			$this->data['success'][] = 'Database file is loaded';
			@chmod(config_path(), FILE_WRITE_MODE);
			if(config_path()) {
				$this->data['success'][] = 'Config PHP exention loaded!';
			} else {
				$this->data['errors'][] = 'Config PHP exention unloaded!';
			}
		} else {
			$this->data['errors'][] = 'Config file is unloaded';
		}
		// Check Database Path
		if (config_path()) { 
			$this->data['success'][] = 'Database file is loaded';
			@chmod(config_path(), FILE_WRITE_MODE);
			if (!config_path()) {
				$this->data['errors'][] = 'database file is unwritable';
			} else {
				$this->data['success'][] = 'Database file is writable';
			}

		} else {
			$this->data['errors'][] = 'Database file is unloaded';
		}
		$success = $this->data['success'];
		$errors = $this->data['errors'];
		return view('install.index')->with(compact(['success','errors']));
	}
	public function purchasecode()
	{
		return view('install.purchase');
	}
	public function checkpurchasecode(Request $request)
	{
		$code = $request->get('purchase_code');
		$purchase_data = $this->verify_envato_purchase_code($code);
		if ($purchase_data && count($purchase_data) > 0) {
			if ( isset($purchase_data['verify-purchase']) && $purchase_data['verify-purchase']) {
				$file = fopen(realpath(base_path('config/purchase.php')), 'w');
			fwrite($file, "<?php
	return[
		'purchase' => '1'
	];");
			fclose($file);
				return redirect('install/database');		
			}
			else
			{
				$message = "incorrect purchase code";
				return back()->with(compact(['message']));
			}
		}
		else
		{
			$message = "incorrect purchase code";
			return back()->with(compact(['message']));
		}
		
	}
	public function database()
	{
		if ($this->isokay()) {
			return view('install.database');
		}
		return redirect('purchase_code');
	}
	public function databaseprocess(Request $request)
	{
		$host = $request->get('host');
		$database = $request->get('database');
		$username = $request->get('user');
		$password = $request->get('password');
		if ($this->isokay()) {
		if ($database && $username && $password) {
		$file = fopen(realpath(base_path('config/database.php')), 'w');
		fwrite($file, "<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '$host'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', '$database'),
            'username' => env('DB_USERNAME', '$username'),
            'password' => env('DB_PASSWORD', '$password'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];?>
");
			fclose($file);
			$file2 = fopen(realpath(base_path('.env')), 'w');
			fwrite($file2, "APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:S6+h9PucxDcpxyd+DUFgl/mb3omvluQxXh3u7+MjpTo=
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=$database
DB_USERNAME=$username
DB_PASSWORD=$password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
");
		fclose($file2);
		ini_set('max_execution_time', 300);
		\Session::flush();
        \Session::regenerate();
		Artisan::call("cache:clear");
		Artisan::call("config:clear");
		Artisan::call("migrate:refresh");
		Artisan::call("db:seed");
		return redirect('/install/site');
		}
		else
		{
			return back();
		}
		}
		return redirect('purchase_code');
	}
	

	public function timezone()
	{
		if ($this->isokay()) {
		return view('install.timezone');
		}
		return redirect('purchase_code');
	}
	public function site()
	{
		if ($this->isokay()) {
		return view('install.site');
		}
		return redirect('purchase_code');
	}
	public function setsite(Request $request)
	{	
		if ($this->isokay()) {
		$post = Settings::find(1);
        $post->system_name = $request->get('sname');
        $post->address = $request->get('address');
        $post->system_email = $request->get('semail');
        $post->currency = $request->get('currency_code');
        $message =  trans('topbar_menu_lang.success');
        $post->save();
        $user = User::find(1);
        $user->name = $request->get('adminname');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $message =  trans('topbar_menu_lang.success');
        $user->save();
        $pass = $request->get('password');
        $file = fopen(realpath(base_path('routes/installed.php')), 'r');
        $show = fopen(realpath(base_path('routes/web.php')), 'r');
        $res = fopen(realpath(base_path('routes/reserve.php')), 'w');
        fwrite($res, fread($show,filesize(realpath(base_path('routes/web.php')))));
        $filen = fopen(realpath(base_path('routes/web.php')), 'w');
        fwrite($filen, fread($file,filesize(realpath(base_path('routes/installed.php')))));
        fclose($filen);
        fclose($file);
        fclose($show);
        fclose($res);
        $file = fopen(realpath(base_path('config/install.php')), 'w');
		fwrite($file, "<?php
return[
	'site_installed' => 'yes'
];");
		return redirect('install/done')->with(compact(['pass']));
		}
		return redirect('purchase_code');
	}
	public function done()
	{
		return view('install.done');
	}
	public function issettled()
	{
		if (config('purchase.purchase') == "1") {
			return true;
		}
		else {
			return false;
		}
	}
	function verify_envato_purchase_code($code_to_verify) {
		$purchase_code = $code_to_verify;
		$username = 'mixpealtech';  
	    $api_key = 'lm7dbaayufsclekkesk35o45sdefbzdo';
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_USERAGENT, 'API');
	    curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $purchase_code .".json");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $purchase_data = json_decode(curl_exec($ch), true);
		return $purchase_data;
	}
	public function isokay()
	{
		if ($this->issettled()) {
			return true;
		}
		else {
			return false;
		}
	}

}
