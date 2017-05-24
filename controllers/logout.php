function logout($f3)
{
    $f3->set('SESSION.signedin' = false);
}