# commonApiServer Framework For PHP

-------------------------------------

```
phalcon框架封装公用服务接口，如生成二维码、ID生成器等
目前提供ID生成器功能。
```

## 环境要求
- Linux，FreeBSD，MacOS
- PHP-7.0及以上版本
- beanstalkd(队列)
- phalcon(PHP框架)
- donkeyid(ID生成器扩展)

## 安装篇
```
扩展安装参考我的doc项目安装步骤
```

## 代码下载
```
git clone https://github.com/hormoneGroup/commonApiServer
```

## 虚拟域名配置
```
server {
    listen      80;
    server_name dev.commonApiServer.com;
    set         $root_path '/data/web/logApiServer';
    root        $root_path;

    index index.php index.html index.htm;

    try_files $uri $uri/ @rewrite;

    location @rewrite {
        rewrite ^/(.*)$ /index.php?_url=/$1;
    }

    location ~ \.php {
        # try_files    $uri =404;

        fastcgi_index  /index.php;
        fastcgi_pass   127.0.0.1:9000;

        include fastcgi_params;
        fastcgi_split_path_info       ^(.+\.php)(/.+)$;
        fastcgi_param PATH_INFO       $fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~* ^/(css|img|js|flv|swf|download)/(.+)$ {
        root $root_path;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

#### 1. 接口描述

>生成单个ID

#### 1.1.1. 请求说明

URL  |请求方式
:---:|:---:
http://dev.commonApiServer.com/id/nextId | POST

#### 1.1.2. 参数说明

参数名称 | 是否必填 | 描述
:---: | --- | ---
  
#### 1.1.3. 请求示例

```
POST /id/nextId HTTP/1.1
Host: dev.commonApiServer.com
...
Content-Length: 83

```

#### 1.1.5. 返回参数说明

>正确的json返回结果示例：

```
{
    "code": 0,
    "msg": "ok",
    "body": {
        "objId": "6346652663358160897"
    }
}

```

>错误的json返回结果示例：

```
{
    "code": "1000",
    "msg": "error",
    "body": {
    }
}
```

>字段说明：

```
{
  "code": 返回码，取值0成功，其它表示失败,
  "msg": 描述信息,
  "body": {
  }
}
```

>生成多个ID

#### 1.2.1. 请求说明

URL  |请求方式
:---:|:---:
http://dev.commonApiServer.com/id/nextId | POST

#### 1.1.2. 参数说明

参数名称 | 是否必填 | 描述
:---: | --- | ---
num | <mark>是</mark> | 生成ID数量 范围1~10000(可自行调整)
#### 1.1.3. 请求示例

```
POST /id/nextIds HTTP/1.1
Host: dev.commonApiServer.com
...
Content-Length: 83

num=3
```

#### 1.1.5. 返回参数说明

>正确的json返回结果示例：

```
{
    "code": 0,
    "msg": "ok",
    "body": {
          "6346653136962191360",
          "6346653136962191361",
          "6346653136962191362"
    }
}

```

>错误的json返回结果示例：

```
{
    "code": "1000",
    "msg": "error",
    "body": {
    }
}
```

>字段说明：

```
{
  "code": 返回码，取值0成功，其它表示失败,
  "msg": 描述信息,
  "body": {
  }
}
```