1. make database and import both sql files inside of /app/webroot/build_data
2. edit /app/Config/database.php.default with your mysql settings, save as database.php
3. create dir /app/tmp/ with chmod 777
4. rename 0.htaccess to .htaccess
5. if site loads, point url to /admin/cities/import then log in with:
username: admin
password: doorkeep-tacit-ramp-uppity

6. for js and css changes edit inside of /app/webroot/src/ and run: "gulp watch" to concat and compress sass and js


(optionally install filemanager inside of /app/webroot/file-manager/ from https://github.com/servocoder/RichFilemanager)


API example:
http://dev.atlasofurbanexpansion.org/API/cities/id/1
