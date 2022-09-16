<style type="text/css">
    body {
        background: #eef;
    }
    a, p, span {
        font-family: Verdana;
        font-size: 17px;
        color: #333;
    }
    .header {
        font-size: 22px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 60px;
        background: #ccf;
        padding: 8px;
    }
</style>

<?php
echo '<p class="header">You are running PHP (version ' . phpversion() . ') in a Docker container</p>';

