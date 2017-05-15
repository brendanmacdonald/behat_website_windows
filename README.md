#GUIDE

## Dependencies
### Composer
This command will download and install Composer as a system-wide command named composer, under /usr/local/bin.
```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

### Java
Java v1.7 is required.

## INITIAL SET-UP

Select a location for the framework
--------------------------------------
Create a folder for the Behat framework, anywhere on your machine.


Clone this repository.
---------------------------------------------------
```
git clone git@github.com:brendanmacdonald/behat_website_windows.git
cd behat_website
```

Create the Behat folder structure
------------------------------------
Run the bootstrap shell script:

```
cd bin && ./cwtest-bootstrap.sh
cd ..
```

Update your PATH
------------------------------------

Add behat to your path.
E.g. C:\Users\<username>\Desktop\Behat\behat_website\bin

Update your local configuration (for the included website)
-------------------------------------------------------------
Add the following to your hosts file:
```
127.0.0.1     behat.demo
```

Add the following to your Virtual Hosts file being sure to update the path of this repository on your local machine:
```
<VirtualHost *:80>
    DocumentRoot "<<<THE PATH ON YOUR LOCAL MACHINE>>>/website"
    ServerName behat.demo
</VirtualHost>
```

Verify Setup Successful
--------------------------
Navigate to the Behat folder inside your Test folder:

```
cd Behat
```

Execute the following:

```
sh run-behat.sh feedback firefox
```

Selenium will launch and run a test. You should see `6 scenarios (6 passed)` in the terminal window after 15-20 seconds.


## Test Execution

Navigate to the Behat folder inside your Test folder:

```
cd Behat
```

To execute all of the tests, select one of the following options based on the format `./run-behat.sh [tag] [profile]`:

```
./run-behat.sh regression firefox
```

or

```
./run-behat.sh regression chrome
```

## Test Results

The results of all tests will be stored in 
`/Results/Twig_***.html`
and 
`/Results/Behat2_***.html`
and 
`/Results/behat.xml`


## Potential issues
--------------------------
### you mave have to 'dos2unix' all of the .sh files included in the repository.
### you may have to update the location of your chromedriver and gecko driver in ..\behat_website_windows\bin\start_selenium_server.sh (line 15).