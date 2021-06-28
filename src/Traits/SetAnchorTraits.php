<?php
namespace Rizhou\Anchors\Traits;

trait SetAnchorTraits
{
    /**
     * 内容
     * @var
     */
    private $content;

    /**
     * 待锚文本数据
     * @var array 二维数组 work=锚内容(必须) url=跳转地址(必须) number=匹配次数(默认1) target=_blank(默认新标签) class=添加class
     */
    private $anchors = [];

    /**
     * Set Content!
     * @param $content
     * @return $this
     */
    public function setContent($content){
        $this->content = $content;
        return $this;
    }

    /**
     * Set Anchors Data
     *
     * @param $anchors
     * @return $this
     */
    public function setAnchors($anchors){
        $this->anchors = $anchors;
        return $this;
    }
}
