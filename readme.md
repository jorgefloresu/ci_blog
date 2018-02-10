# Coding Test - Blog

## Notes

I've chosen to develop with **CodeIgniter 3.1**. It's not my long term framework of choice but I've been using it since the beginning of September so I'm pretty familiar with it and I don't have the luxury of learning a framework to complete this task.

### Practicalities

I've chosen **SQLite 3** for a database, for a simple blog it is more than adequate and as it's self contained it aids making this site portable with no installation issues.

## Requirements
PHP 5.6+  
PHP built in webserver, run with:  
`php -S localhost:8000`

## Login

An account has been created with credentials:  
email: test@test.com  
password: password

### Timings

At the three hour mark - what have I achieved: Basic authentication and still writing CRUD screens for posts and categories. Using CakePHP would have saved hours.  
At 4.5 hours - basic functional system is in place. I had no idea that it would take this long (my target was 3 hours). That is all the time I can spare on this for now but it should give a good indication of my coding style.  

## Lessons learned

A framework like CakePHP or Laravel which includes a built in authentication system can save a whole load of time. I've probably spent at least an hour on creating the pages, model and controllers to do this in CodeIgniter.  
Also ran into a few time wasting issues from not changing $config['base_url'] from default - only evident when trying to use the redirect function.

# DDL for SQLite database
```SQL
CREATE TABLE users (
    id         INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name VARCHAR,
    last_name  VARCHAR,
    email      VARCHAR,
    password   VARCHAR
);

CREATE TABLE posts (
    id      INTEGER PRIMARY KEY AUTOINCREMENT,
    title   VARCHAR,
    content TEXT,
    user_id INTEGER,
    slug    VARCHAR
);

CREATE TABLE categories (
    id   INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR
);

CREATE TABLE categories_posts (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    category_id INTEGER,
    post_id     INTEGER
);
```
