In order for the testing to work, you need to:

1. Put the location of your PHP executable in your system PATH
2. Make sure that there is a "codecept.phar" in the root of the project. Git should have taken care of this already.
3. Download chromedriver.exe from https://sites.google.com/a/chromium.org/chromedriver/downloads and put it in a folder in your PATH environment variable

First, run the Selenium server with "java -jar selenium-server-standalone-3.12.0.jar"
Then run the tests by opening another command prompt in your root project directory and running "php codecept.phar run --steps".