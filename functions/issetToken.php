<?php

if (isset($_COOKIE['access_token'])) {
    echo 1;
} else {
    echo 0;
}
