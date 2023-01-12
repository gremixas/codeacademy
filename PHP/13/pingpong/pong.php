<?php
if (isset($_GET['ping']) && $_GET['ping'] === "1") {
    header("Location: ping.php?pong=1");
}