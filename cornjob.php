<pre><?php
        include './php/config/autoload.php';

        $htmlfile = file_get_contents('https://newweb.nepalstock.com/api/nots/nepse-data/today-price?&size=2000');
        $htmldata = (json_decode($htmlfile, true));
        $user->entryStockData($htmldata['content']);
