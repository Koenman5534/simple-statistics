# simple-statistics
This webapplication is a small and simple statistics program that can be implemented in almost every site. 

it is made from four php files:

   1. GetIp.php - get's the visitors IP. 
   2. DatabaseIp.php - Handles the check, insertion and updates for the database and includes the GetIp.php file.
   3. CallData.php - Calls all the data from the database to use on the statistics page itself.
   4. StatisticsPage.php - Contains html and css for some simple styling(this can be changed). This file is responsible for the display of the statistics data. It contains a simple but good looking graph made with Graph.js.
  
Please remember that some variables and kinds of data will be in dutch since this will be used on a dutch website.
And do not forget to fill in the database connection parameters.

# Development 

The development of this webapplication started out as a small project on my internship. I am still learning to program, but love to do it. Every time i learned something new in this project i implemented it right away. Prepared statements for example. I'll continue to improve myself and learn new tricks everyday.


#what is used?

For this project i made use of the following:

   1. html/css 
   2. Javascript/Jquery/JSON
   3. PHP
   4. MySQL Database server/Mysqli
   
#database

The Program works on this database scheme:

1. ip - INT UNSIGNED - NOT NULL - PK
2. datum - DATE - NOT NULL      ('datum' means 'date' in dutch)
3. Telling - INT - NOT NULL     ('Telling' means 'counting' in dutch)

   
