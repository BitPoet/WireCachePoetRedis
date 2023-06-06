<?php namespace ProcessWire;

class WireCachePoetRedisConfig extends ModuleConfig {

	function __construct() {
		$this->add([[
			"name"			=>	"servername",
			"label"			=>	$this->_("Server"),
			"description"	=>	$this->_("Enter the server ip or hostname, or the path to a unix domain socket and check the 'Unix Socket' option."),
			"type"			=>	"text",
			"value"			=>	"127.0.0.1",
			"columnWidth"	=>	60
		], [
			"name"			=>	"unix",
			"label"			=>	$this->_("Unix Socket"),
			"description"	=>	$this->_("Use a unix socket instead of a TCP connection"),
			"type"			=>	"checkbox",
			"columnWidth"	=>	40
		], [
			"name"			=>	"serverport",
			"label"			=>	$this->_("Port"),
			"description"	=>	$this->_("Server TCP port"),
			"type"			=>	"text",
			"value"			=>	"6379",
			"columnWidth"	=>	60
		], [
			"name"			=>	"tls",
			"label"			=>	$this->_("Use TLS"),
			"description"	=>	$this->_("Use transport layer security"),
			"type"			=>	"checkbox",
			"columnWidth"	=>	40
		], [
			"name"			=>	"useAuth",
			"label"			=>	$this->_("Authenticate"),
			"description"	=>	$this->_("Check this box to enter authentication data for the Redis server"),
			"type"			=>	"checkbox"
		], [
			'name'			=>	'authinfo',
			'type'			=>	'fieldset',
			'label'			=>	$this->_('Authentication Data'),
			"showIf"		=>	"useAuth=1",
			'children'		=>	[[
				"name"			=>	"useAclAuth",
				"label"			=>	$this->_("Use ACL Authentication"),
				"description"	=>	$this->_("Check this box to use new ACL authentication (username + password) available from Redis 6 onwards"),
				"type"			=>	"checkbox",
				"showIf"		=>	"useAuth=1"
			], [
				"name"			=>	"authUser",
				"label"			=>	$this->_("Username"),
				"description"	=>	$this->_("Your username to connect to Redis with"),
				"notes"			=>	$this->_("Only appliccable if you use ACL authentication, not needed if you set legacy 'requirepass' in redis.conf"),
				"type"			=>	"text",
				"size"			=>	20,
				"columnWidth"	=>	50,
				"showIf"		=>	"useAclAuth=1"
			], [
				"name"			=>	"password",
				"label"			=>	$this->_("Password"),
				"description"	=>	$this->_("Password for login"),
				"type"			=>	"text",
				"size"			=>	20,
				"columnWidth"	=>	50,
				"value"			=>	"",
				'attr'			=>	[
					'type'			=>	'password'
				]
			]
		]], [
			"name"			=>	"cacheactive",
			"label"			=>	$this->_("Active"),
			"description"	=>	$this->_("Caching is only active if this checkbox is checked, to avoid errors and delays if redis connection hasn't been configured yet."),
			"type"			=>	"checkbox",
			"value"			=>	""
		]]);
	}
	
}
