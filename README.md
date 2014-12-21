# Holmes web application

Holmes is a software to detect images in another images using JavaCV and OpenCV.
    https://github.com/waldemarnt/holmes

The Holmes Web, is a good way to make a service to create this images for you using the web, for example, varius websites can use the same holmes web to find images in images using the http protocol.


### Installation
The Holmes web is a php application created using silex, and very easy to start.

Downloading via composer
```sh
$ composer require waldema/holmes-web
```
After download is done, rename your config.yaml.default to config.yaml and configure like this

settings:

    holmes-binaries: 'C:\\java\\holmes.jar' //default jar location in your system
    
    default-nest-image: localhost //not implemented yet
    
    result-web-dir: 'http://localhost/holmes-web/images/matches/' //url to access matches folder from browser
    
    debug: true //silex debug boolean

#### Using
after the installation is done, you can send the image and parameters using a similar url
http://localhost/holmes-web/web/match_images // match_images is the action
Send a post for this url passing this parameters
template: is a big image
nest: is a image to find in the template
width: is the width size of the new image
height: is the height of the new image
preview: is a boolean to show a window with the preview of created image, this preview is opened in the server.

After your post done , you will receive a response like this.
```sh
{
    "data": {
        "url": "http://localhost/holmes-web/images/matches/df08781cc6221daeff1b2d4d03fd63d9.jpg"
    },
    "status": "success"
}
```
```sh
{
    "data": {
    },
    "status": "error"
}
```
### Libs

We use 3 libs to make it happens
* Holmes java 
* bytedeco/javacv
* OpenCv


