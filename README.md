# Hillside-Gardens
This is the repository for IT 328 final project

-Separates all database/business logic using the MVC pattern.
Classes, controllers, and models have their own separate directories. Each user 
has their own database instance upon completing the form

-Routes all URLs and leverages a templating language using the Fat-Free framework.
all routes occur through our index.php page which uses the Fat-free framework

-Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
when data is uploaded to the database, information in the Orders table connects to
primary keys in the Product and Customer tables

-Data can be viewed and added.
data is added to the database through the form (since a new order should be 
the only time data is added), and this can be view through an admin page

-Has a history of commits from both team members to a Git repository. Commits are clearly commented.
many commits have been made from both members

-Uses OOP, and defines multiple classes, including at least one inheritance relationship.
two classes have been defined, Delivery_customers inherits 
the default Customer class.

-Contains full Docblocks for all PHP files and follows PEAR standards.
add PHP files have docblocks

-Has full validation on the client side through JavaScript and server side through PHP.
While the user fills out the form, JavaScript checks their inputs.
Upon submission the form is then validated by a PHP file.

-All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
code is separated to be clear and is commented for better understanding

-Your submission shows adequate effort for a final project in a full-stack web development course.
lots of time and energy has been put into the project, many roadblocks
have come up along the way and we have done our best to try and overcome them.

-GitHub repo includes readme file outlining how each requirement was met; UML diagram; and ER diagram

