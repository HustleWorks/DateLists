<?php namespace HustleWorks\DateLists;

/**
 * DateLists class.
 *
 * Small date helper library
 */
class DateLists
{
    /**
     * months function.
     *
     * Returns an array of months and their names
     *
     * @access public
     * @return array
     */
    public function months()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
    }

    /**
     * days function.
     *
     * Returns an array of the days in a month.
     *
     * @access public
     * @param  mixed $month (default: null)
     * @param  mixed $year (default: null)
     * @return array
     */
    public function days($month=null, $year=null)
    {
        $count = 31;
        
        if (!is_null($month) || !is_null($year)) {
            $timestamp = mktime(0, 0, 0, (int)$month, 1, (int)$year);
            $days = date('t', $timestamp);
        } elseif (!is_null($month)) {
            $month = (int) $month;
            
            $thirty = [4,6,9,11];
            
            if ($month==2) {
                // Play it safe with Feb because we don't have the year
                $days = 28;
            } elseif (in_array($month, $thirty)) {
                $days = 30;
            }
        }
        
        $days = [];
        for ($i=1;$i<=31;$i++) {
            $days[$i] = $i;
        }
        
        return $days;
    }
    
    /**
     * years function.
     *
     * Returns an array of years in descending order.
     *
     * @access public
     * @param  int $offset (default: 0)
     * @param  int $count (default: 100)
     * @return array
     */
    public function years($offset=0, $count=100)
    {
        $years = [];
    
        $max = date('Y')-$offset;
        $min = date('Y')-$count;
        for ($i=$max;$i>=$min;$i--) {
            $years[$i] = $i;
        }

        return $years;
    }
}
