<?php
namespace Rizhou\Anchors;

use Illuminate\Support\Arr;
use Rizhou\Anchors\Traits\SetAnchorTraits;

class AnchorHandle
{
    use SetAnchorTraits;

    /**
     * 本实例
     * @var
     */
    private static $instantiate;


    /**
     * 创建实例
     * AnchorHandle constructor.
     * @param $content
     * @param array $anchors
     */
    public function __construct($content = null,$anchors = [])
    {
        $this->setAnchors($anchors);

        $this->setContent($content);
    }

    /**
     * 单列方式创建实例
     * @param $content
     * @param array $anchors
     * @return AnchorHandle
     */
    public static function make($content = null,$anchors = []){
        if(!self::$instantiate || !self::$instantiate instanceof self){
            self::$instantiate = new self($content,$anchors);
        }
        return self::$instantiate;
    }

    /**
     * 处理锚文本
     *
     * @return string|string[]|null
     */
    public function handle(){

        if(!$this->anchors){
            return $this->content;
        }

        $rule = "/<img.*?>/i";
        //先把img排除掉,并且将其存为一个数组
        preg_match_all($rule, $this->content, $matches);

        $str = preg_replace($rule, 'Its_Just_A_Mark', $this->content);

        //锚处理
        foreach ($this->anchors as $anchor) {
            $href = Arr::get($anchor,'url');
            $work = Arr::get($anchor,'work');
            $class = Arr::get($anchor,'class');
            $target = Arr::get($anchor,'target','_blank');
            $number = Arr::get($anchor,'number',1);
            if(!$href || !$work){
                continue;
            }

            $rule = "/".$anchor['af_font']."(?!((?!<(".config('anchor.filter').")\b)[\s\S])*<\/(".config('anchor.filter').")>)/";

            $href = '<a target="'.$target.'" href="'.$href.'" class="rz-anchor '.$class.'">'.$work.'</a>';

            $temp_str = preg_replace($rule, $href, $str,$number);
            //不存在时会返回为空
            if($temp_str){
                $str = $temp_str;
            }

        }

        //将img加上去
        foreach ($matches[0] as $alt_content) {

            $str = preg_replace('/Its_Just_A_Mark/',$alt_content,$str,1);

        }

        return $str;
    }



}
