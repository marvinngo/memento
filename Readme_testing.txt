In order for the testing to work, you need two things:

1. Put the location of your PHP executable in your system PATH
2. Make sure that there is a "codecept.phar" in the root of the project. Git should have taken care of this already.

To run the tests, open a command prompt in your root project directory and use "php codecept.phar run --steps".