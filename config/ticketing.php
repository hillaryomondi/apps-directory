<?php

return [
    'email'=>env('TICKETING_EMAIL',"systems@strathmore.edu"),
    'cc'=>explode("," , env('TICKETING_CC', "" ))
];
