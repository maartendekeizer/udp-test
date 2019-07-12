Easy UDP test tool in PHP.

On your UDP server:

    php server.php -d 0.0.0.0 -p 3000
    
On your UDP client (replace 127.0.0.1 with the IP address of the server):

    php client.php -d 127.0.0.1 -p 3000
    
On the server it is reporting the following values

t = timestamp request was send by the client

m = timestamp in microtime

c = counter for each packet the client sends

d = timestamp request was send by the client in yyyymmddhhiiss format

mr = timestamp in microtime of the server (when packet is received)

diff = microtime difference between send and receive

!0 = if the client sends an unexpected counter value, the number indicated the expected number



License: MIT
