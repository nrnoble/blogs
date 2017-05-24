<?php

function logout($f3,$blogger)
{
    $blogger->setisLoggedIn(false);
    $f3->set('signedin', false);
    $f3->set('SESSION.signedin', false);
}