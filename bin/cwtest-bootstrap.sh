#!/bin/sh

# Make directories.
mkdir ./../Servers
mkdir ./../Results
mkdir ./../Results/screenshots

# Download selenium
SELENIUM_URL="https://selenium-release.storage.googleapis.com/3.4/selenium-server-standalone-3.4.0.jar"
SELENIUM_DESTINATION="./../Servers/selenium.jar"
if type wget -v >/dev/null 2>&1; then
  wget ${SELENIUM_URL} -O ${SELENIUM_DESTINATION}
elif type curl -V >/dev/null 2>&1; then
  curl ${SELENIUM_URL} -O ${SELENIUM_DESTINATION}
else
  echo "***********************"
  echo "Unable to download Selenium. Please download the latest version from https://selenium-release.storage.googleapis.com/index.html, rename it to 'selenium.jar' and place it in ${SELENIUM_DESTINATION}"
  echo "***********************"
fi

cd .. && composer install