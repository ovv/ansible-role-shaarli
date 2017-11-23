<?php /*
{
    "resource": {
        "data_dir": "data",
        "config": "data\/config.php",
        "datastore": "data\/datastore.php",
        "ban_file": "data\/ipbans.php",
        "updates": "data\/updates.txt",
        "log": "data\/log.txt",
        "update_check": "data\/lastupdatecheck.txt",
        "history": "data\/history.php",
        "raintpl_tpl": "tpl\/",
        "theme": "default",
        "raintpl_tmp": "tmp\/",
        "thumbnails_cache": "cache",
        "page_cache": "pagecache"
    },
    "security": {
        "ban_after": 4,
        "ban_duration": 1800,
        "session_protection_disabled": false,
        "open_shaarli": false,
        "markdown_escape": true
    },
    "general": {
        "header_link": "?",
        "links_per_page": 20,
        "enabled_plugins": [
            "qrcode",
            "markdown",
            "playvideos",
            "save",
            "token"
        ],
        "timezone": "{{ shaarli_tz }}",
        "title": "{{ shaarli_title }}"
    },
    "updates": {
        "check_updates": true,
        "check_updates_branch": "{{ shaarli_version }}",
        "check_updates_interval": 86400
    },
    "feed": {
        "rss_permalinks": true,
        "show_atom": true
    },
    "privacy": {
        "default_private_links": false,
        "hide_public_links": false,
        "hide_timestamps": false
    },
    "thumbnail": {
        "enable_thumbnails": true,
        "enable_localcache": true
    },
    "redirector": {
        "url": "",
        "encode_url": true
    },
    "plugins": [],
    "credentials": {
        "login": "{{ shaarli_login }}",
        "salt": "{{ shaarli_salt }}",
        "hash": "{{ (shaarli_password + shaarli_login + shaarli_salt) | hash('sha1') }}"
    },
    "api": {
{% if shaarli_api %}

        "enabled": true,
{% else %}

        "enabled": false,
{% endif %}
        "secret": "{{ shaarli_api_secret }}"
    }
}
*/ ?>