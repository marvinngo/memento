To generate the documentation, use:
php phpDocumentor.phar -d ./tests/acceptance -t ./docs


# Memento

This application helps groups of people who would usually buy gifts for an event by aggregating personal budgets (from what people would have spent) into a communal budget. From the communal budget it suggests communal activities or events. Memento helps users reduce waste from giving gifts (wrapping paper, boxes, plastics) by suggesting group events and activities for them to participate in. This reduces their ecological footprint and create long lasting memories by allowing people to participate in a social event together.

## Team Members

* A01040888 Justin Cervantes 
* A01037955 Mark Kropivnitski 
* A00885541 Evan Morrow 
* A01038948 Marvin Ngo 
* A01040750 Johnny Pham 

## Completion

This project is 100% complete.

### Known bugs

* If there are spaces and non utf-8 characters in the name of a file that is uploaded as a group picture, the upload won't work.
* When a file is uploaded as the group picture, the page is refreshed as intended when run locally, however on the website you are redirected to a blank page.

## Getting Started

To run this project on your own development machine:

1. Clone the github repo into your XAMPP/htdocs folder.
2. In PHPMyAdmin, create a database named "evanmorr_mementodb".
3. Under priveleges, create a Database user with the following credentials:
    * User Name: evanmorr_team5
    * Host Name: localhost
    * Password: Team5!Team5!
4. Check all for Global Priveleges, and click Go.
5. Import evanmorr_mementodb.sql into the database that you created.
6. Launch Apache and MySQL through XAMPP.
7. You can now see the website running locally at localhost/memento
    * To login, you can either sign up an account or use these credentials:
```
username: newtest
password: password1
```
### Prerequisites

* [XAMPP](https://www.apachefriends.org/index.html)

## Challenges

Challenges we faced in this project included:
* Seperating our app into small, agnostic parts.
* Dividing the work when our team members are specialized.
* Communicating and coordinating the code we are writing/will write.
* Managing our time when under external constraints.

## Testing

### Prerequisites

In order for the testing to work, you need to:

1. Put the location of your PHP executable in your system PATH.
2. Download chromedriver.exe from [the Chromium website](https://sites.google.com/a/chromium.org/chromedriver/downloads) and put it in a folder in your PATH environment variable.

## Running the tests

1. First, run the Selenium server with "java -jar selenium-server-standalone-3.12.0.2.
2. Then run the tests by opening another command prompt in your root project directory and running "php codecept.phar run --steps".

The tests are located in the tests/ directory.

## Acknowledgments

All the COMP2910 instructors were helpful to us, but in particular we would like to thank:

* Aaron Ferguson, for helping us with the database and backend
* Chris Thompson, for mentoring
* Carly Orr, for helping us use GitHub