<?php

function redirect_To($newLocation){
    header("Location:". $newLocation);
    exit;
}

