#This is the README file for the c-server
#THe C-server has been designed as an API-Server
#Requests are made following the HTTP request protocol, and the C-server serves the valid requests with responses
#The Server also holds the MySQL database, therefore calls from Laravel that require database operations simply make 
#requests to the server for responses

##Building the c-server program
$ mkdir build

$ make

## Running the server program
$ ./main

## To Recompile and rerun
$ make clean

$ make

$ ./main

