This project is for ECE524 - Cloud Computing at the University of Arizona. It is a basic
web server application that can be used to expose vulnerabilities of storing sensitive
data in a database and transferring data over HTTP instead of a more secure method.

The tools required to get this web server up and running:

1) PHP5 -- the code was not tested in anything other than PHP so YMMV if you use
   a newer version.
2) mySQL 5.7.21 for Ubuntu 16.04 was used for a local development
   OR 
   mySQL 5.5.59 for Ubuntu 14.04.1 was used for CLaaS development.
3) Apache2 install
4) Git


Install the apache server, mysql version and php version indicated above using a utility
such as aptitude. Once aptitude is installed, run the command:
   sudo aptitude install apache2 php5-mysql libapachemod2-mod-php5 mysql-server

In order to get the database to work properly out of the box with our application 
code, make the root password to the all configured servers as 'team1234'.

After all the above tools are installed you want to pull the latest version of the code
into the correct directory by using the following commands:
   cd /var/www
   git clone http://github.com/alexwiz91/ece524_proj .

The repo should contain a working, backup version of our database that was used for the
experiment, which is important to grab the right table names for the application code
as it construct SQL queries with specific table names. In order to import into mysql
run the following commands:
   mysql -u root -p ece524_proj < /var/www/html/databasebackup/ece524_proj.sql

At this point you'll have the latest version of the mySQL server data and the application
and you should be able to visit the server IP address and step through the application
by entering the server IP address in the URL bar of your  favorite browser.

We HIGHLY encourage playing around in this environment. Some of the features
of the web server may be quite brittle but that was the intention of this experiment. 
Our resources were primarily directed at figuring out the most secure way to mitigate
some of the attack surfaces of this simple website but we did not implement the secure
counterpart of the website to demonstrate them but we did analyze them in our final
report. Keep in mind that some of the more intrusive SQL injections may or may not 
delete information from the database so the user of those commands should be able 
to identify what is going to go wrong before executing them. In case of deletion of
information, he/she could always restore the latest backup of the database using the
import command previously shown in this file. GOOD LUCK AND HAVE FUN!

Feel free to email the developers of this project if you have any remaining questions
at: 
   awisniewski@email.arizona.edu
   jbonsu@email.arizona.edu
   simkhada@email.arizona.edu







