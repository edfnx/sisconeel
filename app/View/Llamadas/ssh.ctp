<?php
    App::import('Vendor','ssh_in_php');

//require_once ('ssh_in_php.php');

$host = "172.26.24.7";
$port = 22;
$user = "root";
$password = "qsupjul2013";

try {
	$ssh = new SSH_in_PHP($host,$port);
	$ssh->connect($user,$password);

	$cycle = true;
	while ($cycle) {
		$data = $ssh->read();
		echo $data;
		if (ereg('\$',$data)) {
			$cycle = false;
		}
	}
	$ssh->write("uname -a\n");
	$cycle = true;
	while ($cycle) {
		$data = $ssh->read();
		echo $data;
		if (ereg('\$',$data)) {
			$cycle = false;
		}
	}
	
	$ssh->write("ls -al\n");
	$cycle = true;
	while ($cycle) {
		$data = $ssh->read();
		echo $data;
		if (ereg('\$',$data)) {
			$cycle = false;
		}
	}

	$ssh->disconnect();

} catch (SSHException $e) {
	echo "An Exception Occured: {$e->getMessage()} ({$e->getCode()})\n";
	echo "Trace: \n";
	echo print_r($e->getTrace());
	echo "\n";
}

?>
