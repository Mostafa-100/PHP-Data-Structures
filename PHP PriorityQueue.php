<?php
class PnQueue
{
    protected $queue = array();

    /* push item with a priority or without */
    public function push($item, $priority = 0)
    {
        if (!is_numeric($priority)) {
            throw new Exception('Numeric priority value expected');
        }
        
        // isset() will return false if $this->queue[$priority] is set to null
        isset($this->queue[$priority]) || $this->queue[$priority] = array();

        array_push($this->queue[$priority], $item);

        ksort($this->queue);

    }
    


    /* delete items as whole principale array or delete item in subarray */
    public function pop($priority = null)
    {
        if ($priority === null) {
            reset($this->queue);
            $priority = key($this->queue);
        }
        
        if (is_numeric($priority) && isset($this->queue[$priority])) {

            $item = array_pop(array_reverse($this->queue[$priority]));
            unset($this->queue[$priority][key($this->queue[$priority])]);
   
            // empty() return true if variable hasn't value or equel 0 and false
            if (empty($this->queue[$priority])) {
                unset($this->queue[$priority]);
            }
            
            return $item;
        }
        return null;
    }
    


    /* delete all items in principal array or subarray */
    public function purge($priority = null)
    {
        if ($priority === null) {
            $this->queue = array();
        } elseif (is_numeric($priority) && isset($this->queue[$priority])) {
            $this->queue[$priority] = array();
        }
    }
    


    /* Count the items exist in principal array or subarray */
    public function count($priority = null)
    {
        switch ($priority) {
            case null:
                $count = 0;
                foreach ($this->queue as $priorityQueue) {
                    $count += count($priorityQueue);
                }
                return $count;
            case (is_numeric($priority) && isset($this->queue[$priority])):
                return count($this->queue[$priority]);
            default:
                return 0;
        }
    }
    


    // Show the principal array or subarray to access to it
    public function dump($priority = null)
    {
        if ($priority === null) {
            return $this->queue;
        } elseif (is_numeric($priority) && isset($this->queue[$priority])) {
            return $this->queue[$priority];
        }
        return null;
    }

}