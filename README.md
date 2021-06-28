# packages-anchors

### 介绍
自动锚文本，给指定文字自动加上跳转链接

#### 安裝教程

    composer require rizhou/laravel-anchors

#### 使用方法

    use Rizhou\Anchors\AnchorHandle;
    
    AnchorHandle::make($content,$anchors)->handle();
    
    $content string 待锚内容
    
    $anchors array work=锚内容(必须) url=跳转地址(必须) number=匹配次数(默认1,0=无限) target=_blank(默认新标签) class=添加class
    例：
    $anchors = [
        [
            'work' => '百度',
            'url' => 'https://www.baidu.com',
        ],
        [
            'work' => '谷歌',
            'url' => 'https://www.google.com',
            'number' => 3,
            'target' => '_blank',
            'class' => 'anchor-google',
        ],
    ];
    


