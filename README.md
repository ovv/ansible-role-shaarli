ovv.shaarli
===========

[![Build Status](https://travis-ci.org/ovv/ansible-role-shaarli.svg?branch=master)](https://travis-ci.org/ovv/ansible-role-shaarli)

Ansible role to install and configure [shaarli](https://github.com/shaarli/Shaarli).

Installation
------------

To install this roles clone it into your roles directory.

```bash
$ git clone https://github.com/ovv/ansible-role-shaarli.git ovv.shaarli
```

If your playbook already reside inside a git repository you can clone it by using git submodules.

```bash
$ git submodule add -b master https://github.com/ovv/ansible-role-shaarli.git ovv.shaarli
```

Role Variables
--------------

* `shaarli_login`: Shaarli admin username.
* `shaarli_password`: Shaarli admin password.
* `shaarli_salt`: Salt used to store the password.
* `shaarli_api_secret`: Shaarli API secret
* `shaarli_title`: Title (default to `My Links`).
* `shaarli_custom_css`: Path to custom css file.

* `shaarli_api`: Enable shaarli API (default to `False`).
* `shaarli_version`: Version of shaarli to install (default to `v0.9`).
* `shaarli_git_url`: Shaarli git repo (default to `https://github.com/shaarli/Shaarli.git`).
* `shaarli_tz`: Timezone used by shaarli (default to `UTC`).

* `shaarli_local_datastore`: Local datastore path to upload to this shaarli.

Example Playbook
----------------

```yml
- hosts: localhost
  roles:
    - ovv.php7
    - pyslackers.nginx
    - ovv.shaarli
  vars:
    shaarli_login: 
    shaarli_password: 
    shaarli_salt: 
    shaarli_api_secret: 

    # ovv.php7 variables
    php_pools:
      shaarli:
        socket: /var/run/php7.0-fpm-shaarli.sock
        user: shaarli
        working_dir: /opt/shaarli

    # pyslackers.nginx variables
    nginx_sites:
      shaarli:
        directory: /opt/shaarli
        locations:
          - location: /
            custom: try_files $uri /index.php$is_args$args;
          - location: = /favicon.ico
            custom: alias /opt/shaarli/images/favicon.ico;
          - location: ~ /\.
            custom: |
              access_log off;
              log_not_found off;
              deny all;
          - location: ~ ~$
            custom: |
              access_log off;
              log_not_found off;
              deny all;
          - location: ~* \.(?:ico|css|js|gif|jpe?g|png)$
            custom: |
              expires    max;
              add_header Pragma public;
              add_header Cache-Control "public, must-revalidate, proxy-revalidate";
          - location: ~ (index)\.php$
            custom: |
              # Slim - split URL path into (script_filename, path_info)
              try_files $uri =404;
              fastcgi_split_path_info ^(.+\.php)(/.+)$;

              # filter and proxy PHP requests to PHP-FPM
              fastcgi_pass   unix:{{ php_pools['shaarli']['socket'] }};
              fastcgi_index  index.php;
              include        fastcgi.conf;
          - location: ~ \.php$
            custom: deny all;
```

License
-------

MIT
