# A PHP module for log in
This module consists of two parts:
 - config.php which contains a php script for connection to MySQL database
 - index.php which contains main script for authorization and basic HTML page with ```<form></form>``` tag
 
 ## config.php
 Connection to a database provides function ```mysqli_connect()```. This function take four mandatory arguments:
 1. Host name
 2. Username
 3. Password
 4. Database name
 If necessary they could be easly changed.
 
 ## index.php
 Script checks if input by client login and password are presented in database. If verification will succeed, their information will be saved
 in global variables ```_SESSION[]``` and ```_COOKIE[]```. Web page appearence will change as well. Cookies allow client to stay logged in 
 without being needed to reinput log in information, cookie lifespan is 8 hours.
 After logging in clien has a choice to exit. By doing so he'll destroy data stored in ```_SESSION[]``` and ```_COOKIE[]``` and will unset session.
