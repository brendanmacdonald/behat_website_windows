#!/bin/bash

function checkAndStartSeleniumServer {
  if ! lsof -i:4444
  then
    printf "Port 4444 is free - starting selenium server...\n"
    runSeleniumServer
    sleep 4;
  else
    printf "Port 4444 is in use - selenium server already running.\n"
  fi
}

function runSeleniumServer {
  java -Dwebdriver.chrome.driver="C:\Users\Brendan\Desktop\Drivers\chromedriver_win32\chromedriver.exe" -Dwebdriver.gecko.driver="C:\Users\Brendan\Desktop\Drivers\geckodriver_0.16.1.exe" -Dwebdriver.firefox.bin="C:\Program Files\Mozilla Firefox\firefox.exe" -jar ../Servers/selenium.jar &
}

checkAndStartSeleniumServer
