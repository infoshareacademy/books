<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 06.11.15
 * Time: 14:17
 */
namespace Books\Model;
class Book
{
    protected $itemId;
    protected $itemTitle;
    protected $priceValue;
    protected $timeToEnd;
    protected $category;
    protected $format;
    public function getItemId()
    {
        return $this->itemId;
    }
    public function getItemTitle()
    {
        return $this->itemTitle;
    }
    public function getPriceValue()
    {
        return $this->priceValue;
    }
    public function getTimeToEnd()
    {
        return $this->timeToEnd;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getFormat()
    {
        return $this->format;
    }
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }
    public function setItemTitle($itemTitle)
    {
        $this->itemTitle = $itemTitle;
    }
    public function setPriceValue($priceValue)
    {
        $this->priceValue = $priceValue;
    }
    public function setTimeToEnd($timeToEnd)
    {
        $this->timeToEnd = $timeToEnd;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setFormat($format)
    {
        $this->format = $format;
    }
}