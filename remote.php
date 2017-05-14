
<?php
include('Net/SSH2.php');

$ssh = new Net_SSH2('www.domain.tld');
if (!$ssh->login('username', 'password')) {
    exit('Login Failed');
}

echo $ssh->exec('pwd');
echo $ssh->exec('ls -la');
?>