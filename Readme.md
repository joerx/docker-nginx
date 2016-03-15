# Docker Nginx

Yet another Docker/Nginx/FPM image. FPM and Nginx are in the same container for simplicity. Trying
to make sure all output is directed to stdout (to be [12-factor](http://12factor.net/) compliant)

## Issues

Nothing coming out of PHP-land has ever been straightforward and facepalm free - e.g. FPM's 
configuration-resistant habit of prefixing a ton of crap to each workers output:

```
[15-Mar-2016 10:32:44] WARNING: [pool www] child 11 said into stderr: "not found: /bla"
```

(the part in quotes is the actual output generated by the app)

## Build

```
docker build -t bla/bla .
```

## Run

```
docker run -it --rm -P joerx/nginx
```

## Sample: Lumen Project

```
composer create-project --prefer-dist laravel/lumen rainbow-emitter
docker run -it --rm -v $(pwd)/rainbow-emitter:/src -P joerx/nginx
```
