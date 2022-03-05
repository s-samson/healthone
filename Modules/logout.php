<?php

function logout() {
    $_SESSION=[];
    session_destroy();
}