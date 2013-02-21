<?php
 
// ssh protocols
// note: once openShell method is used, cmdExec does not work
 
class ssh2 {
 
  private $host = '172.26.24.7';
  private $user = 'root';
  private $port = '22';
  private $password = 'qsupjul2013';
  private $con = null;
  private $shell_type = 'xterm';
  private $shell = null;
  private $log = '';
 
  function __construct($host='', $port=''  ) {
 
     if( $host!='' ) $this->host  = $host;
     if( $port!='' ) $this->port  = $port;
 
     $this->con  = ssh2_connect($this->host, $this->port);
     if( !$this->con ) {
       $this->log .= "Connection failed !";
     }
 
  }
 
  function authPassword( $user = '', $password = '' ) {
 
     if( $user!='' ) $this->user  = $user;
     if( $password!='' ) $this->password  = $password;
 
     if( !ssh2_auth_password( $this->con, $this->user, $this->password ) ) {
       $this->log .= "Authorization failed !";
     }
 
  }
 
  function openShell( $shell_type = '' ) {
 
        if ( $shell_type != '' ) $this->shell_type = $shell_type;
    $this->shell = ssh2_shell( $this->con,  $this->shell_type );
    if( !$this->shell ) $this->log .= " Shell connection failed !";
 
  }
 
  function writeShell( $command = '' ) {
 
    fwrite($this->shell, $command."\n");
 
  }
 
  function cmdExec( ) {
 
        $argc = func_num_args();
        $argv = func_get_args();
 
    $cmd = '';
    for( $i=0; $i> $argc ; $i++) {
        if( $i != ($argc-1) ) {
          $cmd .= $argv[$i]." &amp;&amp; ";
        }else{
          $cmd .= $argv[$i];
        }
    }
    echo $cmd;
 
        $stream = ssh2_exec( $this->con, $cmd );
    stream_set_blocking( $stream, true );
    return fread( $stream, 4096 );
 
  }
 
  function getLog() {
 
     return $this->log;
 
  }
 
}
 
?>