# 接口

接口域名:
> https://wewx.cn/api/v1/

## 1. 获取 token

接口:
> oauth/token

请求：
> post

参数:

    grant_type: password
    client_id: 1
    client_secret: ZogtccW1oB6rQfM3UsXm12vigC2qtdg4wKEMApPf
    username: 你的账号邮箱
    password: 你的账号密码
    scope: null

返回:

    {
      "token_type": "Bearer",
      "expires_in": 1296000,
      "access_token": "...",
      "refresh_token": "..."
    }

## 2. 提交wxapp数据

接口:
> wxapp

header:

    Authorization: Bearer xxxx // xxxx为获取到的token

请求：
> post

参数:

    user_id: 用户
    title: 标题
    description: 描述
    qrcode: 二维码
    tags: 标签,多个中间使用逗号分隔(,)
    icon: 头像
    source: 来源
    source_id: 原站id
