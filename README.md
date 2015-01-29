# Surge
__A php library for push notifications__

[![Build Status](https://magnum.travis-ci.com/Minds/Surge.svg?token=vHzWaxguqXbJqkudCFTn&branch=master)](https://magnum.travis-ci.com/Minds/Surge)

### Getting started

Add the following to your composer.json file.

````
{
    "require": {
        "Minds/Surge: "v1.0",
        ...
    },
    ...
}
````

### Configure Apple Push Notifications (APN)

Ok, this is a bit of a pain. Follow carefully. 

- Go to `https://developer.apple.com/` and follow the steps to create a new certificate. Create a Push Notification certificate and download.
- Add this certificat to your keychain (double clicking should do this). 
- Navigate to Certificate and look for the certificate you just added.
- Ctrl click the certificate and click export. Enter a password.
- the run `openssl pkcs12 -in Certificates.p12 -out apns.pem -nodes -clcerts`

Then your app should be able to do the rest..

An example call:

```
$apple = Surge\Service\Factory::build('Apple', array('cert'=>'/var/secure/apple.pem'));

```